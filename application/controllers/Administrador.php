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

    /**
     * Método base para datos comunes de todas las vistas del administrador
     */
    private function datos_base($titulo = 'Administrador - UNLa Tienda')
    {
        return [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => $titulo
        ];
    }

    /**
     * Dashboard del administrador
     */
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
            return;
        }

        // Evitar cache del navegador
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        $data = $this->datos_base('Administrador de UNLa Tienda');

        $this->load->view('administrador/header_administrador', $data);
        $this->load->view('administrador/body_administrador', $data);
        $this->load->view('administrador/footer_administrador', $data);
    }

    /**
     * Lista de usuarios para el administrador
     */
   
     public function lista_usuarios()
    {
        // Verifica que el admin esté logueado
        if (!$this->session->userdata('logged_in') || $this->session->userdata('rol_id') != 2) 
        {
            redirect('login');
            return;
        }

        // Datos base
        $data = [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Listado de Usuarios'
        ];

        // Traer todos los usuarios (solo usuarios estándar)
        $data['usuarios'] = $this->Usuario_modelo->obtener_usuarios_estandar();

        // Cargar vistas
        $this->load->view('lista_usuarios/header_lista_usuarios', $data);
        $this->load->view('lista_usuarios/body_lista_usuarios', $data);
        $this->load->view('lista_usuarios/footer_lista_usuarios', $data);
    }

    /**
     * Redirecciona a la creación de usuario
     */
    public function crear_usuario()
    {
        redirect('usuario/crear_usuario');
    }

    /**
     * Lista de espectáculos del administrador
     */
    public function administrador_espectaculos()
    {
        redirect('espectaculos/administrador_espectaculos');
    }

    /**
     * Crear nuevo espectáculo
     */
    public function crear_espectaculo()
    {
        redirect('espectaculos/crear_espectaculo');
    }

    /**
     * Editar espectáculos
     */
    public function administrador_editar_espectaculo()
    {
        $data = $this->datos_base('Editar Espectáculos');
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('editar_espectaculo/header_editar', $data);
        $this->load->view('editar_espectaculo/body_editar', $data);
        $this->load->view('editar_espectaculo/footer_editar', $data);
    }


    
 
}
?>
