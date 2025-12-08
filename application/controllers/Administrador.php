<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'third_party/PHPMailer/Exception.php';
require APPPATH . 'third_party/PHPMailer/PHPMailer.php';
require APPPATH . 'third_party/PHPMailer/SMTP.php';

class Administrador extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Reserva_modelo');
        $this->load->model('Cliente_modelo');
        $this->load->library('Correo');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Verificar que el administrador esté logueado
        if (!$this->session->userdata('logged_in')) 
        {
            redirect('login');
            return;
        }

        // Evitar que el navegador muestre páginas cacheadas
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        // Preparar datos para la vista
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Administrador de UNLa Tienda';

        // Cargar la vista 'administrador'
        $this->load->view('administrador/header_administrador', $data);
        $this->load->view('administrador/body_administrador', $data);
        $this->load->view('administrador/footer_administrador', $data);
    }
    
    public function administrador_espectaculos()
    {
        redirect('espectaculos/mostrar_lista_espectaculos_administrador');
    }

    public function crear_espectaculo()
    {
        redirect('espectaculos/crear_espectaculo');
    }

     public function administrador_editar_espectaculo()
    {
        // Datos básicos
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Administrador de UNLa Tienda';

        // Obtener todos los espectáculos desde el modelo
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos(); // Devuelve un array con todos los espectáculos

        // Cargar las vistas del administrador
        $this->load->view('editar_espectaculo/header_editar', $data);
        $this->load->view('editar_espectaculo/body_editar', $data); // Aquí se listan con botones Editar/Eliminar
        $this->load->view('editar_espectaculo/footer_editar', $data);
    }

    public function administador_usuarios()
    {
        // Obtener todos los usuarios desde el modelo
        $usuarios = $this->Usuario_modelo->obtener_usuarios();

        // Datos base + datos específicos
        $data = $this->datos_base("Listado de Usuarios");
        $data['usuarios'] = $usuarios;

        // Cargar las vistas (siguiendo tu patrón de header/body/footer)
        $this->load->view('administrador_usuarios/header_administrador_usuarios', $data);
        $this->load->view('administrador_usuarios/body_administrador_usuarios', $data);
        $this->load->view('administrador_usuarios/footer_administrador_usuarios');
    }

    public function crear_usuario()
    {
        redirect('usuario/agregar_usuario');
    }

}  
?>


