<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_modelo');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['fondo_registro'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Registro de Usuario';

        $this->load->view('registrar/header_registrar', $data);
        $this->load->view('registrar/body_registrar', $data);
        $this->load->view('registrar/footer_registrar');
    }

    public function registrar_usuario()
    {
        if ($this->validar_usuario()) 
        {
            $email = $this->input->post('nombre_usuario');
            $dni = $this->input->post('dni');

            if ($this->Usuario_modelo->verificar_usuario_existente($email, $dni))
            {
                $data['error'] = 'El usuario con este email o DNI ya está registrado.';
                $data['fondo_registro'] = base_url('activos/imagenes/mi_fondo.jpg');
                $data['titulo'] = 'Registro de Usuario';

                $this->load->view('templates/header_2', $data);
                $this->load->view('templates/body_registro', $data);
            }
            else
            {
                $data = array(
                    'nombre' => $this->input->post('nombre'),
                    'apellido' => $this->input->post('apellido'),
                    'dni' => $dni,
                    'telefono' => $this->input->post('telefono'),
                    'nombre_usuario' => $email,
                    'palabra_clave' => $this->input->post('palabra_clave'),
                    'rol_id' => 1,
                );

                $this->Usuario_modelo->registrar_usuario($data);

                $this->load->view('templates/header_2');
                $this->load->view('post_registro');
            } 
        }
        else
        {
            $data['fondo_registro'] = base_url('activos/imagenes/mi_fondo.jpg');
            $data['titulo'] = 'Registro de Usuario';

            $this->load->view('templates/header_2', $data);
            $this->load->view('templates/body_registro', $data);
        }
    }
    
    public function validar_usuario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('dni', 'DNI', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');
        $this->form_validation->set_rules('nombre_usuario','Email','required|valid_email');
        $this->form_validation->set_rules('palabra_clave', 'Password', 'required');

        return $this->form_validation->run();
    }
}
