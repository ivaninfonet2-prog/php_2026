<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->library('session');
        $this->load->helper(['url','form']);
    }
    
    private function datos_base()
    {
        return
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Inicio - UNLa Tienda'
        ];
    }

    public function index()
    {
        $data = $this->datos_base();

        $this->load->view('login/header_login', $data);
        $this->load->view('login/body_login', $data); // aquí ya va el formulario dentro
        $this->load->view('login/footer_login');
    }

    public function autenticar()
    {
        $nombre_usuario = trim($this->input->post('nombre_usuario'));
        $palabra_clave  = trim($this->input->post('palabra_clave'));

        if (empty($nombre_usuario) || empty($palabra_clave)) 
        {
            $this->session->set_flashdata('error', 'Debe ingresar usuario y contraseña');
            redirect('login');
            return;
        }

        $usuario = $this->Usuario_modelo->obtener_usuario($nombre_usuario, $palabra_clave);

        if ($usuario) 
        {
            $this->session->set_userdata([
                'id_usuario' => $usuario->id_usuario,
                'logged_in'  => true,
                'rol_id'     => $usuario->rol_id
            ]);

            // Redirigir según rol
            if ($usuario->rol_id === '2')
            {
                redirect('administrador'); // controlador para admin
            } 
            else 
            {
                redirect('usuario'); // controlador para usuario común
            }
        } 
        else 
        {
            $this->session->set_flashdata('error', 'Usuario o contraseña incorrectos');
            redirect('login');
        }
    }

    public function logout()
    {
        // Destruir sesión
        $this->session->sess_destroy();

        // Evitar cache del navegador
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Cache-Control: post-check=0, pre-check=0", false)
            ->set_header("Pragma: no-cache");

        // Redirigir a login o principal
        redirect('login');
    }
}
?>
