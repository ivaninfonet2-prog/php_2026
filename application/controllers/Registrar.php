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
<<<<<<< HEAD
        // Datos que necesitan las vistas
        $data = 
        [
            'titulo' => "Registrarme como Usuario",
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
        ];

        $this->load->view('registrar_usuario/header_registrar_usuario', $data);
        $this->load->view('registrar_usuario/body_registrar_usuario', $data);
        $this->load->view('registrar_usuario/footer_registrar_usuario');
    }

    public function registro_exitoso()
    {
        // Datos que necesitan las vistas
        $data = [
            'titulo' => "Cartelera de Espectáculos",
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
        ];

        $this->load->view('registro_exitoso/header_registro_exitoso', $data);
        $this->load->view('registro_exitoso/body_registro_exitoso', $data);
        $this->load->view('registro_exitoso/footer_registro_exitoso');
=======
        $data['fondo_registro'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Registro de Usuario';

        $this->load->view('registrar/header_registrar', $data);
        $this->load->view('registrar/body_registrar', $data);
        $this->load->view('registrar/footer_registrar');
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
    }

    public function registrar_usuario()
    {
        if ($this->validar_usuario()) 
        {
            $email = $this->input->post('nombre_usuario');
<<<<<<< HEAD
            $dni   = $this->input->post('dni');

            if ($this->Usuario_modelo->verificar_usuario_existente($email, $dni))
            {
                // Usuario ya existe
                $data['error']  = 'El usuario con este email o DNI ya está registrado.';
                $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
                $data['titulo'] = 'Registro de Usuario';

                // Cargar directamente la vista de registro con el error
                $this->load->view('registrar_usuario/header_registrar_usuario', $data);
                $this->load->view('registrar_usuario/body_registrar_usuario', $data);
                $this->load->view('registrar_usuario/footer_registrar_usuario');
            }
            else
            {
                // Registrar nuevo usuario
                $data = [
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
=======
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
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
            } 
        }
        else
        {
<<<<<<< HEAD
            // Validación fallida
            $data['error']  = 'Por favor completa todos los campos correctamente.';
            $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
            $data['titulo'] = 'Registro de Usuario';

            // Cargar directamente la vista de registro con el error
            $this->load->view('registrar_usuario/header_registrar_usuario', $data);
            $this->load->view('registrar_usuario/body_registrar_usuario', $data);
            $this->load->view('registrar_usuario/footer_registrar_usuario');
=======
            $data['fondo_registro'] = base_url('activos/imagenes/mi_fondo.jpg');
            $data['titulo'] = 'Registro de Usuario';

            $this->load->view('templates/header_2', $data);
            $this->load->view('templates/body_registro', $data);
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
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
<<<<<<< HEAD
?>
=======
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
