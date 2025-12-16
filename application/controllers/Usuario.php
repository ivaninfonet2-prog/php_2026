<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Models
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
        $this->load->model('Reserva_modelo');

        // Libraries & helpers
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    /* =========================================================
       DATOS BASE (SOLUCIONA EL ERROR)
       ========================================================= */
    private function datos_base($titulo = '')
    {
        return [
            'titulo'     => $titulo,
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => $this->session->userdata('logged_in')
        ];
    }

    /* =========================================================
       PANEL PRINCIPAL USUARIO
       ========================================================= */
    public function index()
    {
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            return;
        }

        // Evitar caché
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        $data = $this->datos_base('Bienvenido Usuario');
        $data['nombre']   = '';
        $data['apellido'] = '';

        $id_usuario = $this->session->userdata('id_usuario');
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        if ($usuario)
        {
            $data['nombre']   = $usuario->nombre;
            $data['apellido'] = $usuario->apellido;
        }

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('usuario/footer_usuario', $data);
    }

    /* =========================================================
       ESPECTÁCULOS
       ========================================================= */
    public function usuario_espectaculos()
    {
        $data = $this->datos_base('Cartelera de Espectáculos');
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('usuario_espectaculos/usuario_espectaculos_header', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_body', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_footer');
    }

    /* =========================================================
       RESERVAS
       ========================================================= */
    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');

        if (!$id_usuario)
        {
            redirect('login');
            return;
        }

        $data = $this->datos_base('Mis Reservas');
        $data['reservas'] = $this->Reserva_modelo->obtener_reservas($id_usuario);

        $this->load->view('usuario_reservas/usuario_reservas_header', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('usuario_reservas/usuario_reservas_footer');
    }

    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');

        if (!$id_usuario)
        {
            redirect('login');
            return;
        }

        $reserva = $this->Reserva_modelo->obtener_reserva_detalle($id_reserva, $id_usuario);

        if (!$reserva)
        {
            show_error('Reserva no encontrada.', 404);
        }

        $data = $this->datos_base('Detalle de Reserva');
        $data['reserva'] = $reserva;

        $this->load->view('usuario_reservas_detalle/header_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/footer_usuario_reservas_detalle', $data);
    }

    /* =========================================================
       VALIDACIÓN
       ========================================================= */
    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email' . ($es_nuevo ? '|is_unique[usuarios.nombre_usuario]' : '')
        );

        if ($es_nuevo)
        {
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'Confirmar Contraseña', 'required|matches[password]');
        }
    }

    /* =========================================================
       CREAR USUARIO
       ========================================================= */
    public function crear_usuario()
    {
        $this->validar_usuario(true);

        if ($this->form_validation->run() === FALSE)
        {
            $data = $this->datos_base('Crear Usuario');

            $this->load->view('crear_usuario/header_crear_usuario', $data);
            $this->load->view('crear_usuario/body_crear_usuario', $data);
            $this->load->view('crear_usuario/footer_crear_usuario', $data);
        }
        else
        {
            $usuario_data = [
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

    /* =========================================================
       EDITAR USUARIO
       ========================================================= */
    public function editar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        if (!$usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

        $this->validar_usuario(false);

        if ($this->form_validation->run() === FALSE)
        {
            $data = $this->datos_base('Editar Usuario');
            $data['usuario'] = $usuario;

            $this->load->view('editar_usuario/header_editar_usuario', $data);
            $this->load->view('editar_usuario/body_editar_usuario', $data);
            $this->load->view('editar_usuario/footer_editar_usuario', $data);
        }
        else
        {
            $usuario_data = [
                'nombre'         => $this->input->post('nombre'),
                'apellido'       => $this->input->post('apellido'),
                'nombre_usuario' => $this->input->post('email')
            ];

            if ($this->input->post('password'))
            {
                $usuario_data['palabra_clave'] = password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                );
            }

            $this->Usuario_modelo->actualizar_usuario($id_usuario, $usuario_data);
            $this->session->set_flashdata('mensaje_exito', 'Usuario actualizado correctamente.');

            redirect('usuario/editar_usuario/' . $id_usuario);
        }
    }

    /* =========================================================
       ELIMINAR USUARIO
       ========================================================= */
    public function eliminar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        if (!$usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

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
