<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'controllers/Seguridad.php');

class Login extends Seguridad
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
         $data = 
        [
            'titulo' => "Loguearme para entrar",
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
        ];
    
        $this->load->view('header_footer/header_footer_principal', $data);
        $this->load->view('login/body_login',$data);
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function autenticar()
    {
        $email = trim($this->input->post('nombre_usuario'));
        
        $password = trim($this->input->post('palabra_clave'));

        if ( !$email || !$password) 
        {
            $this->session->set_flashdata('error', 'Complete todos los campos');
            redirect('login');
            return;
        }

        $usuario = $this->Usuario_modelo->obtener_usuario_por_email($email);

        if ($usuario && $password === $usuario->palabra_clave) 
        {

            $this->session->set_userdata([
                'id_usuario' => $usuario->id_usuario,
                'rol_id'     => $usuario->rol_id,
                'logged_in'  => true
            ]);

            if ($usuario->rol_id == 2) 
            {
                redirect('administrador');
            } 
            else 
            {
                redirect('usuario');
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
        $this->session->sess_destroy();
        redirect('principal');
    }
}
