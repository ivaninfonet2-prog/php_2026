
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Obtener el ID del usuario desde la sesión
        $id_usuario = $this->session->userdata('id_usuario');

        // Consultar datos del usuario en el modelo
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        // Preparar datos para la vista
        $data = [
            'titulo'   => 'UNLa Tienda',
            'nombre'   => $usuario ? $usuario->nombre : '',
            'apellido' => $usuario ? $usuario->apellido : ''
        ];

        // Cargar la vista principal del usuario
        $this->load->view('templates/header_2');
        $this->load->view('templates/body_3', $data);
        $this->load->view('templates/footer_2');
    }

     public function index()
    {
        // Obtener el ID del usuario desde la sesión
        $id_usuario = $this->session->userdata('id_usuario');

        // Consultar datos del usuario en el modelo
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        // Preparar datos para la vista
        $data = [
            'titulo'   => 'UNLa Tienda',
            'nombre'   => $usuario ? $usuario->nombre : '',
            'apellido' => $usuario ? $usuario->apellido : ''
        ];

        // Cargar la vista principal del usuario
        $this->load->view('templates/header_2');
        $this->load->view('templates/body_3', $data);
        $this->load->view('templates/footer_2');
    }

}
