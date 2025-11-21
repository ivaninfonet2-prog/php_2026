
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicas extends CI_Controller 
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('templates/header', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('body_footer/politicas', $data);

        // Cargar footer común
        $this->load->view('templates/footer');
    }

    public function index_2() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('templates/header', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('body_footer_2/politicas', $data);

        // Cargar footer común
        $this->load->view('templates/footer_2');
    }

}
