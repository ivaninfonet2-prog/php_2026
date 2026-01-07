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
        // Datos que necesitan las vistas

        $data = 
        [
            'titulo' => "Registrarme como Usuario",
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
        ];

        $this->load->view('header_footer/header_footer_principal', $data);
        $this->load->view('registrar_usuario/body_registrar_usuario', $data);
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function registro_exitoso()
    {
        // Datos que necesitan las vistas

        $data = 
        [
            'titulo' => "Cartelera de Espectáculos",
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
        ];

        $this->load->view('header_footer/header_footer_principal', $data);
        $this->load->view('registro_exitoso/body_registro_exitoso', $data);
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function registrar_usuario()
    {
        if ($this->validar_usuario()) 
        {
            $email = $this->input->post('nombre_usuario');
            $dni   = $this->input->post('dni');

            if ($this->Usuario_modelo->verificar_usuario_existente($email, $dni))
            {
                // Usuario ya existe

                $data['error']  = 'El usuario con este email o DNI ya está registrado.';
                $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
                $data['titulo'] = 'Registro de Usuario';

                // Cargar directamente la vista de registro con el error

                $this->load->view('header_footer/header_footer_principal', $data);
                $this->load->view('registrar_usuario/body_registrar_usuario', $data);
                $this->load->view('footer_footer/footer_footer_principal');
            }
            else
            {
                // Registrar nuevo usuario
                $data = 
                [
                    'nombre'         => $this->input->post('nombre'),
                    'apellido'       => $this->input->post('apellido'),
                    'dni'            => $dni,
                    'telefono'       => $this->input->post('telefono'),
                    'nombre_usuario' => $email,
                    'palabra_clave'  => $this->input->post('palabra_clave'),
                    'rol_id'         => 1,
                ];

                $this->Usuario_modelo->registrar_usuario($data);

                // Redirigir a vista de registro exitoso

                redirect('registrar/registro_exitoso');
            } 
        }
        else
        {
            // Validación fallida
            
            $data['error']  = 'Por favor completa todos los campos correctamente.';
            $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
            $data['titulo'] = 'Registro de Usuario';

            // Cargar directamente la vista de registro con el error

            $this->load->view('header_footer/header_footer_principal', $data);
            $this->load->view('registrar_usuario/body_registrar_usuario', $data);
            $this->load->view('footer_footer/footer_footer_principal');
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

?>
