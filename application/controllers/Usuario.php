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
        $this->load->helper('url');
    }

    private function datos_base($titulo = 'Inicio - UNLa Tienda')
    {
        return 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => $titulo
        ];
    }

    private function validar_usuario($es_nuevo = true)
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email' . ($es_nuevo ? '|is_unique[usuarios.nombre_usuario]' : ''));

        if ($es_nuevo) 
        {
            $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        }
    }

    /* ------------------ MÉTODOS DE USUARIO ------------------ */

    public function index()
    {
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            return;
        }

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");

        $id_usuario = $this->session->userdata('id_usuario');
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);

        $data = $this->datos_base();
        $data['titulo']   = 'UNLa Tienda';
        $data['nombre']   = $usuario ? $usuario->nombre : '';
        $data['apellido'] = $usuario ? $usuario->apellido : '';

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('usuario/body_usuario', $data);
        $this->load->view('usuario/footer_usuario', $data);
    }

    public function usuario_espectaculos()
    {
        $data = 
        [
            'titulo'       => "Cartelera de Espectáculos",
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        $this->load->view('usuario_espectaculos/usuario_espectaculos_header', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_body', $data);
        $this->load->view('usuario_espectaculos/usuario_espectaculos_footer');
    }

    public function usuario_reservas()
    {
        $id_usuario = $this->session->userdata('id_usuario');
        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $data = 
        [
            'titulo'   => "Mis Reservas",
            'fondo'    => base_url('activos/imagenes/mi_fondo.jpg'),
            'reservas' => $this->Reserva_modelo->obtener_reservas($id_usuario)
        ];

        $this->load->view('usuario_reservas/usuario_reservas_header', $data);
        $this->load->view('usuario_reservas/usuario_reservas_body', $data);
        $this->load->view('usuario_reservas/usuario_reservas_footer');
    }

    public function usuario_reservas_detalle($id_reserva)
    {
        $id_usuario = $this->session->userdata('id_usuario');
        if ($id_usuario === null) 
        {
            echo "No hay un usuario en la sesión. Por favor, inicia sesión.";
            return;
        }

        $this->db->select('reservas.id_reserva, reservas.cantidad, reservas.fecha_reserva, reservas.monto_total,
                           espectaculos.nombre as nombre_espectaculo, espectaculos.fecha as fecha_espectaculo,
                           espectaculos.precio, espectaculos.disponibles');
        $this->db->from('reservas');
        $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');
        $this->db->where('reservas.id_reserva', $id_reserva);
        $this->db->where('reservas.usuario_id', $id_usuario);
        $reserva = $this->db->get()->row_array();

        if ( ! $reserva) 
        {
            echo "Reserva no encontrada o no pertenece al usuario.";
            return;
        }

        $data = 
        [
            'fondo'   => base_url('activos/imagenes/mi_fondo.jpg'),
            'reserva' => $reserva
        ];

        $this->load->view('usuario_reservas_detalle/header_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/body_usuario_reservas_detalle', $data);
        $this->load->view('usuario_reservas_detalle/footer_usuario_reservas_detalle', $data);
    }

    /* ------------------ MÉTODOS CRUD ADMIN ------------------ */

    public function agregar_usuario()
    {
        $this->validar_usuario(true);

        if ($this->form_validation->run() === FALSE) 
        {
            $data = $this->datos_base('Agregar Usuario');
            $this->load->view('usuario/form_header', $data);
            $this->load->view('usuario/form_body', $data);
            $this->load->view('usuario/form_footer', $data);
        } 
        else 
        {
            $this->Usuario_modelo->registrar_usuario([
                'nombre'    => $this->input->post('nombre'),
                'apellido'  => $this->input->post('apellido'),
                'nombre_usuario' => $this->input->post('email'),
                'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ]);
            redirect('usuario');
        }
    }

    public function editar($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);
       
        if (!$usuario) show_error('Usuario no encontrado.', 404);

        $this->validar_usuario(false);

        if ($this->form_validation->run() === FALSE) 
        {
            $data = $this->datos_base('Editar Usuario');
            $data['usuario'] = $usuario;
           
            $this->load->view('usuario/form_header', $data);
            $this->load->view('usuario/form_body', $data);
            $this->load->view('usuario/form_footer', $data);
        } 
        else 
        {
            $usuario_data = 
            [
                'nombre'    => $this->input->post('nombre'),
                'apellido'  => $this->input->post('apellido'),
                'nombre_usuario' => $this->input->post('email')
            ];

            if ($this->input->post('password')) 
            {
                $usuario_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->Usuario_modelo->actualizar_usuario($id_usuario, $usuario_data);
           
            redirect('usuario');
        }
    }

    public function eliminar($id_usuario)
    {
        $usuario = $this->Usuario_modelo->obtener_por_id($id_usuario);
        
        if ( ! $usuario) 
        {   
            show_error('Usuario no encontrado.', 404);
        }
        $this->Usuario_modelo->eliminar_usuario($id_usuario);
        
        redirect('usuario');
    }

}
