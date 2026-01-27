<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Incluir la clase Seguridad antes de usarla

require_once(APPPATH . 'controllers/Seguridad.php');

class Usuario extends Seguridad
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Usuario_modelo','Espectaculo_modelo','Reserva_modelo']);
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // PROTECCION GLOBAL
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            exit;
        }
    }

    // INDEX USUARIO
    public function index()
    {
        $id_usuario = $this->session->userdata('id_usuario');
        $usuario    = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        $data = [
            'titulo'     => 'Bienvenido Usuario',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $id_usuario,
            'logged_in'  => true,
            'nombre'     => $usuario->nombre   ?? '',
            'apellido'   => $usuario->apellido ?? ''
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    // CREAR NUEVO USUARIO
   
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
                'logged_in'  => true
            ];

            $this->load->view('header_footer/header_footer_administrador', $data);
            $this->load->view('crear_usuario/body_crear_usuario', $data);
            $this->load->view('footer_footer/footer_footer_administrador', $data);
            return;
        }

        $usuario_data = 
        [
            'nombre'         => $this->input->post('nombre', true),
            'apellido'       => $this->input->post('apellido', true),
            'nombre_usuario' => $this->input->post('email', true),
            'palabra_clave'  => password_hash($this->input->post('password', true),
            PASSWORD_DEFAULT
        ),
        
        'rol_id'         => 1 
        ];

        if ($this->Usuario_modelo->registrar_usuario($usuario_data))
        {
            $this->session->set_flashdata('success', 'Usuario creado correctamente.');
        }
        else
        {
            $this->session->set_flashdata('error', 'Ocurrió un error al crear el usuario.');
        }

        redirect('administrador');
    }

    // EDITAR USUARIO
    public function editar_usuario($id_usuario)
    {
        $this->validar_usuario(false); // false = edición

        if ($this->form_validation->run() === FALSE)
        {
            $data =
            [
                'titulo'     => 'Editar Usuario',
                'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'usuario'    => $this->Usuario_modelo->obtener_usuario_por_id($id_usuario),
                'logged_in'  => true
            ];

            $this->load->view('header_footer/header_footer_administrador', $data);
            $this->load->view('editar_usuario/body_editar_usuario', $data);
            $this->load->view('footer_footer/footer_footer_administrador', $data);
            return;
        }

        $data =
        [
            'nombre'         => $this->input->post('nombre', true),
            'apellido'       => $this->input->post('apellido', true),
            'nombre_usuario' => $this->input->post('email', true)
        ];

        // Si se envió una contraseña nueva
        
        $password = $this->input->post('password', true);
        if ( !empty($password))
        {
            $data['palabra_clave'] = password_hash($password,PASSWORD_DEFAULT) ;
        }

        if ($this->Usuario_modelo->actualizar_usuario($id_usuario, $data))
        {
            $this->session->set_flashdata('success', 'Usuario actualizado correctamente.');
        }
        else
        {
            $this->session->set_flashdata('error', 'Ocurrió un error al actualizar el usuario.');
        }

        redirect('administrador');
    }


    // ESPECTÁCULOS
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

    // MIS RESERVAS
    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');

        $data = [
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

    // DETALLE DE RESERVA
    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');
        $reserva    = $this->Reserva_modelo->obtener_reserva_detalle($id_reserva, $id_usuario);

        if (!$reserva)
        {
            show_error('Reserva no encontrada.', 404);
        }

        $data = [
            'titulo'     => 'Detalle de Reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $id_usuario,
            'logged_in'  => true,
            'reserva'    => $reserva
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    // VALIDACIONES
    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');

        if ($es_nuevo)
        {
            $this->form_validation->set_rules('email','Email',
                'required|valid_email|is_unique[usuarios.nombre_usuario]');

            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[4]');
            $this->form_validation->set_rules('password_confirm','Confirmar Contraseña',
                'required|matches[password]');
        }
        else
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        }
    }

    // ELIMINAR USUARIO
    public function eliminar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        if ( !$usuario)
        {
            show_error('Usuario no encontrado.', 404);
            return;
        }

        if ($this->Usuario_modelo->usuario_tiene_clientes($id_usuario))
        {
            $this->session->set_flashdata('error','No se puede eliminar el usuario: tiene clientes asociados.');
            redirect('administrador');
            return;
        }

        if ($this->Usuario_modelo->eliminar_usuario($id_usuario))
        {
            $this->session->set_flashdata('success','Usuario eliminado correctamente.');
        }
        else
        {
            $this->session->set_flashdata('error','Ocurrió un error al eliminar el usuario.');
        }

        redirect('administrador');
    }
}
?>
