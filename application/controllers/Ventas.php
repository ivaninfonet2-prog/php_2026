<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Espectaculo_modelo');
        $this->load->model('Venta_modelo');
        $this->load->model('Reserva_modelo');
        $this->load->model('Usuario_modelo');
        $this->load->library('session');
    }

    public function crear_venta($id_espectaculo, $cantidad_entradas)
    {
        // Obtener el precio del espectaculo desde el modelo

        $precio_espectaculo = $this->Espectaculo_modelo->obtener_precio($id_espectaculo);

        if ( ! $precio_espectaculo) 
        {
            $this->session->set_flashdata('mensaje', 'Error: El precio del espectáculo no se pudo obtener.');
            
            redirect('espectaculos/ver_espectaculo/' . $id_espectaculo);

            return;
        }

        $monto_total = $cantidad_entradas * $precio_espectaculo;

        // Crear la venta en la base de datos

        $usuario_id = $this->session->userdata('id_usuario');

        $resultado_venta = $this->Venta_modelo->crear_venta(
            $usuario_id,
            $id_espectaculo,
            $monto_total,
            date('Y-m-d') // Fecha actual
        );

        if ($resultado_venta) 
        {
            // Redirigir tras exito
           
            $this->session->set_flashdata('mensaje', 'Venta registrada exitosamente y cliente creado.');
          
            redirect('reservar/generar_pdf/' . $id_espectaculo);
        } 
        else 
        {
            $this->session->set_flashdata('mensaje', 'Error: La venta no se pudo registrar.');
            
            redirect('espectaculos/ver_espectaculo/' . $id_espectaculo);
        }
    }

    public function mostrar_ventas() 
    {
        // Preparar datos para la vista
        $data = 
        [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Ventas de UNLa Tienda',
            'ventas' => $this->Venta_modelo->obtener_ventas()
        ];

        // Cargar vistas
        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('ventas/body_ventas', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data); 
    }
}

?>