
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_modelo');
        $this->load->model('Usuario_modelo');
    }

    public function crear_cliente($usuario_id)
    {
        $resultado = $this->Cliente_modelo->crear_cliente($usuario_id);
        echo $resultado ? "Cliente creado con éxito." : "Error al crear el cliente.";
    }

    public function mostrar_clientes()
    {
<<<<<<< HEAD
        // Preparar datos generales para la vista
        $data = 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Administrador de UNLa Tienda',
        ];

        // Obtener clientes relacionados al usuario actual
        $clientes = $this->Cliente_modelo->obtener_clientes_por_usuario();

        // Asignar clientes si existen, de lo contrario mensaje
        if ( ! empty($clientes)) 
        {
            $data['clientes'] = $clientes;
        }
        else 
        {
            $data['clientes'] = [];
            $data['mensaje'] = "No hay clientes registrados con clave foránea usuario_id.";
        }

        // Cargar vistas con los datos preparados
        $this->load->view('clientes/header_clientes', $data);
        $this->load->view('clientes/body_clientes', $data);
        $this->load->view('clientes/footer_clientes', $data);
=======
        $this->load->view('vista_comienzo_2');

        $clientes = $this->Cliente_modelo->obtener_clientes_por_usuario();
        $data['clientes'] = !empty($clientes) ? $clientes : [];
        if (empty($clientes)) {
            $data['mensaje'] = "No hay clientes registrados con clave foránea usuario_id.";
        }

        $this->load->view('vista_clientes', $data);
        $this->load->view('footer');
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
    }
}
