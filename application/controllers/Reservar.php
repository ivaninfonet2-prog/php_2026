
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// DOMPDF
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

// PHPMailer (igual que en tu versión funcional)
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

    //  MÉTODOS PRIVADOS — UTILIDADES

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
        echo "<h3>Error:</h3> $msg";
        exit;
    }

    // PASO 1 → Recibir POST y guardar datos en sesión
    
    public function procesar($id_espectaculo)
    {
        $usuario = $this->session->userdata('id_usuario');
        
        if ( ! $usuario) 
        {   
            return $this->error("Debes iniciar sesión.");
        }   

        $cantidad = $this->input->post('cantidad_entradas');
        
        if ( ! $cantidad || $cantidad < 1) 
        {   
            return $this->error("Cantidad de entradas inválida.");
        }    

        $this->set_datos_reserva([
            'id_espectaculo'    => $id_espectaculo,
            'cantidad_entradas' => $cantidad,
            'fecha_reserva'     => date('Y-m-d'),
            'usuario'           => $usuario
        ]);

        redirect("reservar/confirmar/$id_espectaculo");
    }

    // PASO 2 → Confirmar y registrar reserva
    
    public function confirmar($id_espectaculo)
    {
        $datos = $this->get_datos_reserva();
        if ( ! $datos) 
        {    
            return $this->error("No hay datos de reserva.");
        }

        $precio = $this->espectaculo->obtener_precio($id_espectaculo);
        
        if ( ! $precio) 
        {
            return $this->error("No se pudo obtener el precio del espectáculo.");
        }    
            
        $monto_total = $datos['cantidad_entradas'] * $precio;

        // Crear reserva
        $ok = $this->reserva->crear_reserva(
            $datos['id_espectaculo'],
            $datos['cantidad_entradas'],
            $datos['fecha_reserva'],
            $datos['usuario'],
            $monto_total
        );

        if ( ! $ok)
        {
            $this->session->set_flashdata('mensaje', 'Error: No hay suficientes entradas.');
            
            redirect("espectaculos/ver_espectaculo_logueado/$id_espectaculo");
            return;
        }

        // Crear cliente si no existe
        $this->cliente->crear_cliente($datos['usuario']);

        // Continuar flujo hacia ventas (tal como funcionaba)
        redirect("ventas/crear_venta/$id_espectaculo/{$datos['cantidad_entradas']}");
    }

    // LISTA DE RESERVAS DEL USUARIO
   
    public function listar()
    {
        $usuario = $this->session->userdata('id_usuario');
        
        if (!$usuario)
        {    
            return $this->error("Debes iniciar sesión.");
        }

        $data['reservas'] = $this->reserva->obtener_reservas($usuario);

        $this->load->view('usuario_reservas/usuario_reservas_header');
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('usuarios_reservas/usuario_reservas_footer', $data);
    }

    //  GENERAR PDF
    
    public function generar_pdf($id_espectaculo)
    {
        $datos = $this->get_datos_reserva();

        if ( ! $datos) 
        {    
            return $this->error("No hay datos de reserva.");
        }

        $html = $this->load->view('plantilla_pdf', [
            'usuario'     => $this->usuario->obtener_por_id($datos['usuario']),
            'reserva'     => $datos,
            'espectaculo' => $this->espectaculo->obtener_espectaculo_por_id($id_espectaculo)
        ], true);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $filename = 'reserva_' . time() . '.pdf';

        $filepath = FCPATH . 'uploads/' . $filename;

        file_put_contents($filepath, $dompdf->output());

        $this->session->set_userdata('pdf_filename', $filename);

        redirect("reservar/enviar_email");
    }

    // ENVIAR EMAIL CON PDF
    
    public function enviar_email()
    {
        $filename = $this->session->userdata('pdf_filename');
        
        $datos = $this->get_datos_reserva();

        if ( ! $filename || ! $datos) 
        {    
            return $this->error("No hay información para enviar.");
        }

        $usuario_data = $this->usuario->get_usuario_email($datos['usuario']);

        if ( ! $usuario_data) 
        {    
            return $this->error("No se encontró email del usuario.");
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
            $mail->Subject = 'Confirmación de reserva';
            $mail->Body    = "<h1>Reserva confirmada</h1><p>Adjunto comprobante en PDF.</p>";

            $mail->addAttachment(FCPATH . "uploads/" . $filename);

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
            echo "Excepción: " . $e->getMessage();
        }
    }

    public function reserva_exitosa()
    {
        $data = 
        [
            'titulo'    => "Mis Reservas",
            'fondo'     => base_url('activos/imagenes/mi_fondo.jpg'),
        ];
     
        // Renderizo el layout maestro
        $this->load->view('reserva_exitosa/header_reserva_exitosa', $data);
        $this->load->view('reserva_exitosa/body_reserva_exitosa', $data);
        $this->load->view('reserva_exitosa/footer_reserva_exitosa');
    }
}

?>
