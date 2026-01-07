<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Reserva_modelo');

        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // Protección global: si no está logueado, afuera

        if ( !$this->session->userdata('logged_in'))
        {
            redirect('login');

            exit;
        }

        // Evitar cache en todo el controlador

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
    }

    public function index()
    {
        if ( !$this->session->userdata('logged_in'))
        {
            redirect('login');

            return;
        }

        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Cache-Control: post-check=0, pre-check=0", false)
            ->set_header("Pragma: no-cache");

        $id_usuario = $this->session->userdata('id_usuario');
      
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        $nombre   = '';
        $apellido = '';

        if ($usuario)
        {
            $nombre   = $usuario->nombre;
            $apellido = $usuario->apellido;
        }

        $data =
        [
            'titulo'     => 'Bienvenido Usuario',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $id_usuario,
            'logged_in'  => true,
            'nombre'     => $nombre,
            'apellido'   => $apellido
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    // Espectáculos
   
    public function usuario_espectaculos()
    {
        $data = 
        [
            'titulo'       => 'Cartelera de Espectáculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario'   => $this->session->userdata('id_usuario'),
            'logged_in'    => true,
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_body', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    // Reservas del usuario
   
    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');

        $data = 
        [
            'titulo'     => 'Mis Reservas',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $id_usuario,
            'logged_in'  => true,
            'reservas'   => $this->Reserva_modelo->obtener_reservas($id_usuario)
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    // Detalle de reserva

    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');

        $reserva = $this->Reserva_modelo->obtener_reserva_detalle($id_reserva, $id_usuario);

        if ( !$reserva)
        {
            show_error('Reserva no encontrada.', 404);
        }

        $data = 
        [
            'titulo'     => 'Detalle de Reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $id_usuario,
            'logged_in'  => true,
            'reserva'    => $reserva
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    // validación de usuario  

    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
      
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');

        if ($es_nuevo)
        {
            // Si es un usuario nuevo, el email debe ser unico

            $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuarios.nombre_usuario]');
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[4]');
            $this->form_validation->set_rules('password_confirm', 'Confirmar Contraseña', 'required|matches[password]');
        }
        else
        {
            // Si es edicion, no se valida la unicidad del email

            $this->form_validation->set_rules('email','Email','required|valid_email');
        }
    }
    
    // --------------------------------------------------------------------------------
    // ----------------------- FUNCIONES DE ADMINISTRADOR ------------------------------
    //---------------------------------------------------------------------------------

    public function crear_usuario()
    {
        $this->validar_usuario(true);

        if ($this->form_validation->run() === FALSE)
        {
            $data = 
            [
                'titulo'     => 'Crear Usuario',
                'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'logged_in'  => $this->session->userdata('logged_in')
            ];

            $this->load->view('header_footer/header_footer_administrador', $data);
            $this->load->view('crear_usuario/body_crear_usuario', $data);
            $this->load->view('footer_footer/footer_footer_administrador', $data);
        }
        else
        {
            $usuario_data = 
            [
                'nombre'         => $this->input->post('nombre'),
                'apellido'       => $this->input->post('apellido'),
                'nombre_usuario' => $this->input->post('email'),
                'palabra_clave'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'rol_id'         => 1
            ];

            if ($this->Usuario_modelo->registrar_usuario($usuario_data))
            {
                $this->session->set_flashdata('mensaje_exito', 'Usuario creado exitosamente.');
            }
            else
            {
                $this->session->set_flashdata('mensaje_error', 'Error al crear el usuario.');
            }

            redirect('usuario/crear_usuario');
        }
    }

    // EDITAR USUARIO

    public function editar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        if (! $usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

        // Reglas de validacion (sin password obligatorio)

        $this->validar_usuario(false);

        if ($this->form_validation->run() === FALSE)
        {
            $data = 
            [
                'titulo'     => 'Editar Usuario',
                'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'logged_in'  => $this->session->userdata('logged_in'),
                'usuario'    => $usuario
            ];

            $this->load->view('header_footer/header_footer_administrador', $data);
            $this->load->view('editar_usuario/body_editar_usuario', $data);
            $this->load->view('footer_footer/footer_footer_administrador', $data);
        }
        else
        {
            $usuario_data = 
            [
                'nombre'         => $this->input->post('nombre'),
                'apellido'       => $this->input->post('apellido'),
                'nombre_usuario' => $this->input->post('email')
            ];

            // Solo actualiza password si se ingreso uno nuevo

            if ($this->input->post('password'))
            {
                $usuario_data['palabra_clave'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
            }

            $this->Usuario_modelo->actualizar_usuario($id_usuario, $usuario_data);

            $this->session->set_flashdata(
                'mensaje_exito',
                'Usuario actualizado correctamente.'
            );

            redirect('usuario/editar_usuario/' . $id_usuario);
        }
    }

    // ELIMINAR USUARIO

    public function eliminar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        if (! $usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

        // Verificar clientes asociados
        $this->db->where('usuario_id', $id_usuario);
        
        $clientes = $this->db->get('clientes');

        if ($clientes->num_rows() > 0)
        {
            $this->session->set_flashdata(
                'mensaje_error',
                'No se puede eliminar el usuario porque tiene clientes asociados.'
            );
        }
        else
        {
            $this->Usuario_modelo->eliminar_usuario($id_usuario);
        
            $this->session->set_flashdata(
                'mensaje_exito',
                'Usuario eliminado correctamente.'
                );
        }

        redirect('administrador');
    }
}
