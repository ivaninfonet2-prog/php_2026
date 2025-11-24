
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicas extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('politicas_principal/header_politicas', $data);

        // Vista principal
        $this->load->view('politicas_principal/body_politicas', $data);

        // Footer común
        $this->load->view('politicas_principal/footer_politicas');
    }
    
    public function index_2() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('politicas_2/header_politicas', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('politicas_2/body_politicas', $data);

        // Cargar footer común
        $this->load->view('politica_2/footer_politicas');
    }

}
