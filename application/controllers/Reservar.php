<<<<<<< HEAD

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
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Cargar el autoloader de DOMPDF
require_once APPPATH . 'third_party/dompdf/autoload.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use Dompdf\Dompdf;
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f

class Reservar extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();

<<<<<<< HEAD
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
       
=======
        $this->load->model('Reserva_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Usuario_modelo');
        $this->load->model('Venta_modelo');
        $this->load->library('session');
    }

    public function procesar($id_espectaculo)
    {
        $cantidad_entradas = $this->input->post('cantidad_entradas'); 
        $usuario = $this->session->userdata('id_usuario');
        
        if ($usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $fecha_reserva = date('Y-m-d');

        // Guardar los datos en la sesión
        $datos_reserva = 
        [
            'id_espectaculo' => $id_espectaculo,
            'cantidad_entradas' => $cantidad_entradas,
            'fecha_reserva' => $fecha_reserva,
            'usuario' => $usuario
        ];
    
        $this->session->set_userdata('datos_reserva', $datos_reserva);

        // Redirigir a la reserva final
        redirect('reservar/reservar/' . $id_espectaculo);
    }

    public function reservar($id_espectaculo) 
    {
        $datos_reserva = $this->session->userdata('datos_reserva');

        if ( ! $datos_reserva) 
        {
            echo "No hay datos de reserva en la sesión.";
            return;
        }

        // Obtener el precio del espectáculo desde el modelo
        $precio_espectaculo = $this->Espectaculo_modelo->obtener_precio($id_espectaculo);

        if ( ! $precio_espectaculo) 
        {
            echo "Error: El precio del espectáculo no se pudo obtener.";
            return;
        }

        $monto_total = $datos_reserva['cantidad_entradas'] * $precio_espectaculo;

        // Crear la reserva en la base de datos
        $resultado_reserva = $this->Reserva_modelo->crear_reserva
        (
            $datos_reserva['id_espectaculo'], 
            $datos_reserva['cantidad_entradas'],
            $datos_reserva['fecha_reserva'],
            $datos_reserva['usuario'],
            $monto_total
        );

        if ($resultado_reserva) 
        {
            // Crear cliente en la tabla 'clientes'
            $this->load->model('Cliente_modelo');
            $this->Cliente_modelo->crear_cliente($datos_reserva['usuario']);

            // Redirigir al controlador de ventas para crear la venta
            redirect('ventas/crear_venta/' . $id_espectaculo . '/' . $datos_reserva['cantidad_entradas']);
        } 
        else 
        {
            $this->session->set_flashdata('mensaje', 'Error: No hay suficientes entradas disponibles.');
            redirect('espectaculos/ver/' . $id_espectaculo);
        }   
    }

    public function listar()
    {
        $this->load->view('vista_comienzo_2');

        $id_usuario = $this->session->userdata('id_usuario'); // Obtiene el ID del usuario desde la sesión.

        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $data['reservas'] = $this->Reserva_modelo->obtener_reservas($id_usuario);

        // Carga la vista y pasa la lista de reservas.
        $this->load->view('vista_reservas', $data);
    }

    public function generar_pdf($id_espectaculo)
    {
        $datos_reserva = $this->session->userdata('datos_reserva');

        if ( ! $datos_reserva)
         {
            echo "No hay datos de reserva en la sesión.";
            return;
        }

        // Contenido HTML dinámico para el PDF
        $html = "
        <html>
            <head>
                <title>Confirmacion de Reserva</title>
            </head>
            <body>
                <h1>Detalles de la Reserva</h1>
                <p><strong>Espectáculo ID:</strong> {$datos_reserva['id_espectaculo']}</p>
                <p><strong>Cantidad de entradas:</strong> {$datos_reserva['cantidad_entradas']}</p>
                <p><strong>Fecha de reserva:</strong> {$datos_reserva['fecha_reserva']}</p>
                <p><strong>Usuario ID:</strong> {$datos_reserva['usuario']}</p>
            </body>
        </html>
        ";

        // Instanciar Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Configuración del PDF
        $dompdf->render();

        // Ruta del archivo PDF
        $pdf_filename = 'reserva_' . time() . '.pdf';
        $file_path = FCPATH . "uploads/" . $pdf_filename;
        file_put_contents($file_path, $dompdf->output());

        // Guardar el nombre del PDF en sesión
        $this->session->set_userdata('pdf_filename', $pdf_filename);
   
        // Redirigir a la función de envío de correo
        redirect('reservar/enviar_email/' . $id_espectaculo);  
    }

    public function enviar_email($id_espectaculo)
    {
        // Cargar PHPMailer desde la carpeta third_party
        require APPPATH . 'third_party/PHPMailer/Exception.php';
        require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
        require APPPATH . 'third_party/PHPMailer/SMTP.php';

        $pdf_filename = $this->session->userdata('pdf_filename');
        $datos_reserva = $this->session->userdata('datos_reserva');

        if ( ! $pdf_filename || ! $datos_reserva) 
        {
            echo "No hay información de reserva válida para enviar.";
            return;
        }

        // Obtener el correo del usuario desde la base de datos
        $this->load->model('Usuario_modelo');

        $usuario_data = $this->Usuario_modelo->get_usuario_email($datos_reserva['usuario']);

        if ( ! $usuario_data || ! isset($usuario_data['nombre_usuario'])) 
        {
            echo "No se encontró el correo del usuario.";
            return;
        }

        $user_email = $usuario_data['nombre_usuario'];
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
        $mail = new PHPMailer(true);

        try 
        {
<<<<<<< HEAD
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
=======
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Cambia esto por tu servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'ivaninfonet@gmail.com'; // Tu correo
            $mail->Password = 'vjaa ndtf pjou fypa'; // Usa una contraseña segura o App Password
            $mail->SMTPSecure = 'tls'; // Encriptación TLS
            $mail->Port = 587; // Puerto para SMTP

            // Configuración del correo
            $mail->setFrom('ivaninfonet@gmail.com', 'Sistema de Reservas');
            $mail->addAddress($user_email, 'Usuario'); // Enviar al email obtenido de la base de datos
            
            $mail->Subject = 'Confirmacion de Reserva';
            $mail->Body = "<h1>Detalles de tu reserva</h1>
                    <p>Adjunto encontrarás el comprobante de tu reserva para el espectáculo.</p>";
        
            $mail->isHTML(true);

            // Adjuntar el PDF
            $pdf_path = FCPATH . "uploads/" . $pdf_filename;
            $mail->addAttachment($pdf_path, $pdf_filename);

            // Enviar el correo
            if ($mail->send()) 
            {
                $this->load->view('header');
                $this->load->view('post_reserva');
                $this->load->view('footer');
            } 
            else 
            {
                echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
            }
        } 
        catch (Exception $e)
        {
            echo 'Error al enviar el correo: ' . $e->getMessage();
        }
    }
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
}

?>
