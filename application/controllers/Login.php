<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
   private function datos_base()
    {
        return 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Inicio - UNLa Tienda'
        ];
    }

    private function datos_con_formulario()
    {
        $data = $this->datos_base();
        $data['contenido'] = $this->load->view('login/formulario_login', $data, TRUE);
        return $data;
    }

    // Página completa con header + body + footer
    public function index()
    {
        $data = $this->datos_con_formulario();

        $this->load->view('login/header_login', $data);
        $this->load->view('login/body_login', $data);
        $this->load->view('login/footer_login');
    }

    public function autenticar()
    {
        $nombre_usuario = $this->input->post('nombre_usuario');
        $palabra_clave  = $this->input->post('palabra_clave');

        // Consultar usuario en el modelo
        $usuario    = $this->Usuario_modelo->obtener_usuario($nombre_usuario, $palabra_clave);
        $id_usuario = $this->Usuario_modelo->obtener_id_usuario($nombre_usuario);

        // Guardar id en sesión
        $this->session->set_userdata('id_usuario', $id_usuario);

        if ($usuario) 
        {
            // Guardar datos de sesión
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('rol_id', $usuario->rol_id);

            if ($usuario->rol_id === '2') 
            {
                // Vista para administrador
                $this->load->view('templates/header_2');
                $this->load->view('vista_administrador');
                $this->load->view('templates/footer_2');
            } 
            else
            {
                // Redirigir a index_3 de Principio
                 redirect('login/index_2');
            }
        } 
        else 
        {
            // Usuario inválido: mensaje de error y volver al login
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            redirect('login'); // vuelve al formulario de login
        }
    }

    public function logout() 
    {
        // Destruye la sesión activa
        $this->session->sess_destroy();

        // Redirige al inicio de sesión
        $this->load->view('templates/header');
        $this->load->view('cerrar_sesion');
        $this->load->view('templates/footer');
    }
}
