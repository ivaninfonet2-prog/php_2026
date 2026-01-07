<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ---------------------- DOMPDF ----------------------
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// ---------------------- PHPMailer ----------------------
require APPPATH . 'third_party/PHPMailer/Exception.php';
require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Reservar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Reserva_modelo', 'reserva');
        $this->load->model('Espectaculo_modelo', 'espectaculo');
        $this->load->model('Usuario_modelo', 'usuario');
        $this->load->model('Cliente_modelo', 'cliente');

        $this->load->library('session');
    }

    // ---------------------- UTILIDADES PRIVADAS ----------------------

    private function set_datos_reserva($datos)
    {
        $this->session->set_userdata('datos_reserva', $datos);
    }

    private function get_datos_reserva()
    {
        return $this->session->userdata('datos_reserva');
    }

    private function error($msg)
    {
        echo "<h3>Error:</h3> {$msg}";
        exit;
    }

    // ---------------------- PASO 1: PROCESAR RESERVA ----------------------

    public function procesar_reserva($id_espectaculo)
    {
        $usuario = $this->session->userdata('id_usuario');

        if ( !$usuario)
        {
            return $this->error("Debes iniciar sesion.");
        }

        $cantidad = $this->input->post('cantidad_entradas');

        if ( !$cantidad || $cantidad < 1)
        {
            return $this->error("Cantidad de entradas invalida.");
        }

        $this->set_datos_reserva([
            'id_espectaculo'    => $id_espectaculo,
            'cantidad_entradas' => $cantidad,
            'fecha_reserva'     => date('Y-m-d'),
            'usuario'           => $usuario
        ]);

        redirect("reservar/confirmar_reserva/{$id_espectaculo}");
    }

    // ---------------------- PASO 2: CONFIRMAR RESERVA ----------------------

    public function confirmar_reserva($id_espectaculo)
    {
        $datos = $this->get_datos_reserva();

        if ( !$datos)
        {
            return $this->error("No hay datos de reserva.");
        }

        $precio = $this->espectaculo->obtener_precio($id_espectaculo);

        if ( !$precio)
        {
            return $this->error("No se pudo obtener el precio del espectáculo.");
        }

        $monto_total = $datos['cantidad_entradas'] * $precio;

        $ok = $this->reserva->crear_reserva(
            $datos['id_espectaculo'],
            $datos['cantidad_entradas'],
            $datos['fecha_reserva'],
            $datos['usuario'],
            $monto_total
        );

        if ( !$ok)
        {
            $this->session->set_flashdata(
                'mensaje',
                'Error: No hay suficientes entradas.'
            );

            redirect("espectaculos/espectaculo_logueado/{$id_espectaculo}");
            return;
        }

        $this->cliente->crear_cliente($datos['usuario']);

        redirect("ventas/crear_venta/{$id_espectaculo}/{$datos['cantidad_entradas']}");
    }

    // ---------------------- LISTAR RESERVAS ----------------------

    public function listar_reservas()
    {
        $usuario = $this->session->userdata('id_usuario');

        if ( !$usuario)
        {
            return $this->error("Debes iniciar sesión.");
        }

        $data['reservas'] = $this->reserva->obtener_reservas($usuario);
        
        $data['fondo']    = base_url('activos/imagenes/mi_fondo.jpg');

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

   // ---------------------- CANCELAR RESERVA ----------------------
   
   public function cancelar_reserva($id_reserva)
    {
        $usuario_id = $this->session->userdata('id_usuario');

        $reserva = $this->reserva->obtener_reserva_por_id($id_reserva);

        if ( !$reserva)
        {
            $this->session->set_flashdata(
                'mensaje',
                'Reserva no encontrada.'
            );
        }
        elseif ($reserva['usuario_id'] != $usuario_id)
        {
            $this->session->set_flashdata(
                'mensaje',
                'No tienes permiso para cancelar esta reserva.'
            );
        }
        else
        {
            $ok = $this->reserva->eliminar_reserva($id_reserva);

            if ($ok)
            {
                $this->session->set_flashdata(
                    'mensaje',
                    'La reserva Nº '.$id_reserva.' fue cancelada exitosamente.'
                );
            }
            else
            {
                $this->session->set_flashdata(
                    'mensaje',
                    'No se pudo cancelar la reserva. Intenta nuevamente.'
                );
            }
        }

        // vuelve a la lista de reservas
        redirect('reservar/listar_reservas');
    }

    // ---------------------- GENERAR PDF ----------------------

    public function generar_pdf($id_espectaculo)
    {
        $datos = $this->get_datos_reserva();

        if ( !$datos)
        {
            return $this->error("No hay datos de reserva.");
        }

        $html = $this->load->view(
            'plantilla_pdf',
            [
                'usuario'     => $this->usuario->obtener_usuario_por_id($datos['usuario']),
                'reserva'     => $datos,
                'espectaculo' => $this->espectaculo->obtener_espectaculo_por_id($id_espectaculo)
            ],
            true
        );

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'reserva_' . time() . '.pdf';
        $filepath = FCPATH . 'uploads/' . $filename;

        file_put_contents($filepath, $dompdf->output());

        $this->session->set_userdata('pdf_filename', $filename);

        redirect('reservar/enviar_email');
    }

    // ---------------------- ENVIAR EMAIL ----------------------

    public function enviar_email()
    {
        $filename = $this->session->userdata('pdf_filename');
        
        $datos    = $this->get_datos_reserva();

        if ( !$filename || !$datos)
        {
            return $this->error("No hay informacion para enviar.");
        }

        $usuario_data = $this->usuario->get_usuario_email($datos['usuario']);

        if ( !$usuario_data)
        {
            return $this->error("No se encontro email del usuario.");
        }

        $email = $usuario_data['nombre_usuario'];

        $mail = new PHPMailer(true);

        try
        {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ivaninfonet@gmail.com';
            $mail->Password   = 'vjaa ndtf pjou fypa';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('ivaninfonet@gmail.com', 'Sistema de Reservas');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Confirmacion de reserva';
            $mail->Body    = '<h1>Reserva confirmada</h1><p>Adjunto comprobante en PDF.</p>';

            $mail->addAttachment(FCPATH . 'uploads/' . $filename);

            if ($mail->send())
            {
                redirect('reservar/reserva_exitosa');
            }
            else
            {
                echo "Error al enviar: " . $mail->ErrorInfo;
            }
        }
        catch (Exception $e)
        {
            echo "Excepcion: " . $e->getMessage();
        }
    }

    // ---------------------- PÁGINA DE EXITO ----------------------

    public function reserva_exitosa()
    {
        $data = 
        [
            'titulo' => 'Mis Reservas',
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('reserva_exitosa/body_reserva_exitosa', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }
}

?>;