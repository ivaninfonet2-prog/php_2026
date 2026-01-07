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
        $this->load->model('Reserva_modelo');
        $this->load->model('Cliente_modelo');
        $this->load->library(['session', 'form_validation', 'Correo']);
        $this->load->helper('url');
    }

    // Dashboard del administrador

    public function index()
    {
        if ( !$this->session->userdata('logged_in')) 
        {
            redirect('login');
            return;
        }

        // Evitar cache del navegador

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        // Datos base para la vista

        $data = 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Administrador de UNLa Tienda'
        ];

        $this->load->view('administrador/header_administrador', $data);
        $this->load->view('administrador/body_administrador', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    // Lista de usuarios para el administrador

    public function lista_usuarios()
    {
        // Verifica que el admin esté logueado

        if ( !$this->session->userdata('logged_in') || $this->session->userdata('rol_id') != 2) 
        {
            redirect('login');
            return;
        }

        // Datos base para la vista

        $data = 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Listado de Usuarios'
        ];

        // Traer solo los usuarios estándar (rol_id = 1)

        $this->load->model('Usuario_modelo'); // asegurarse de cargar el modelo

        $data['usuarios'] = $this->Usuario_modelo->obtener_usuarios_estandar();

        // Cargar vistas

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('lista_usuarios/body_lista_usuarios', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    // Redirecciona a la creación de usuario

    public function crear_usuario()
    {
        redirect('usuario/crear_usuario');
    }
    
    // Lista de espectaculos del administrador
    
    public function administrador_espectaculos()
    {
        redirect('espectaculos/administrador_espectaculos');
    }

    // Crear nuevo espectáculo

    public function crear_espectaculo()
    {
        redirect('espectaculos/crear_espectaculo');
    }

    // Editar espectaculo

    public function administrador_editar_espectaculo()
    {
        // Datos base para la vista

        $data = 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Editar Espectáculos'
        ];

        // Obtener lista de espectáculos
        
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('editar_espectaculo/body_editar_espectaculo', $data);
        $this->load->view('footer/footer_footer_adnistrador', $data);
    }
}

?>
