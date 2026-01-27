<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Venta_modelo');
        $this->load->library('session');
    }

    // Mostrar listado de ventas
    public function mostrar_ventas() 
    {
        $data = [
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg'),
            'titulo' => 'Listado de Ventas',
            'ventas' => $this->Venta_modelo->obtener_ventas()
        ];

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('ventas/body_ventas', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data); 
    }
}
?>
