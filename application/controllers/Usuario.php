<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'Usuario_modelo',
            'Espectaculo_modelo',
            'Reserva_modelo'
        ]);

        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // =============================
        // PROTECCIÓN GLOBAL
        // =============================
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            exit;
        }

        // =============================
        // EVITAR CACHE
        // =============================
        $this->output
            ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Pragma: no-cache");
    }

    // =============================
    // HOME USUARIO
    // =============================
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

    // =============================
    // ESPECTÁCULOS
    // =============================
    public function usuario_espectaculos()
    {
        $data = [
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

    // =============================
    // MIS RESERVAS
    // =============================
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

    // =============================
    // DETALLE DE RESERVA
    // =============================
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

    // =============================
    // VALIDACIONES
    // =============================
    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|trim');

        if ($es_nuevo)
        {
            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|valid_email|is_unique[usuarios.nombre_usuario]'
            );
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[4]');
            $this->form_validation->set_rules(
                'password_confirm',
                'Confirmar Contraseña',
                'required|matches[password]'
            );
        }
        else
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        }
    }

    // =============================
    // CREAR USUARIO (ADMIN)
    // =============================
    public function crear_usuario()
    {
        $this->validar_usuario(true);

        if ($this->form_validation->run() === FALSE)
        {
            $data = [
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

        $usuario_data = [
            'nombre'         => $this->input->post('nombre', true),
            'apellido'       => $this->input->post('apellido', true),
            'nombre_usuario' => $this->input->post('email', true),
            'palabra_clave'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'rol_id'         => 2 // 👈 USUARIO NORMAL
        ];

        $this->Usuario_modelo->registrar_usuario($usuario_data);

        $this->session->set_flashdata('mensaje_exito', 'Usuario creado exitosamente.');
        redirect('usuario/crear_usuario');
    }

    // =============================
    // EDITAR USUARIO
    // =============================
    public function editar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        if (!$usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

        $this->validar_usuario(false);

        if ($this->form_validation->run() === FALSE)
        {
            $data = [
                'titulo'     => 'Editar Usuario',
                'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
                'id_usuario' => $this->session->userdata('id_usuario'),
                'logged_in'  => true,
                'usuario'    => $usuario
            ];

            $this->load->view('header_footer/header_footer_administrador', $data);
            $this->load->view('editar_usuario/body_editar_usuario', $data);
            $this->load->view('footer_footer/footer_footer_administrador', $data);
            return;
        }

        $usuario_data = [
            'nombre'         => $this->input->post('nombre', true),
            'apellido'       => $this->input->post('apellido', true),
            'nombre_usuario' => $this->input->post('email', true)
        ];

        if ($this->input->post('password'))
        {
            $usuario_data['palabra_clave'] =
                password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $this->Usuario_modelo->actualizar_usuario($id_usuario, $usuario_data);

        $this->session->set_flashdata('mensaje_exito', 'Usuario actualizado correctamente.');
        redirect('usuario/editar_usuario/' . $id_usuario);
    }

    // =============================
    // ELIMINAR USUARIO
    // =============================
    public function eliminar_usuario($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_usuario_por_id($id_usuario);

        if (!$usuario)
        {
            show_error('Usuario no encontrado.', 404);
        }

        $tiene_clientes = $this->db
            ->where('usuario_id', $id_usuario)
            ->get('clientes')
            ->num_rows() > 0;

        if ($tiene_clientes)
        {
            $this->session->set_flashdata(
                'mensaje_error',
                'No se puede eliminar el usuario: tiene clientes asociados.'
            );
        }
        else
        {
            $this->Usuario_modelo->eliminar_usuario($id_usuario);
            $this->session->set_flashdata('mensaje_exito', 'Usuario eliminado correctamente.');
        }

        redirect('administrador');
    }
}
