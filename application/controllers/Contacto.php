
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller 
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_principal/header_contacto', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_principal/body_contacto', $data);

        // Cargar footer común
        $this->load->view('contacto_principal/footer_contacto');
    }

    public function contacto_2() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_2/header_contacto', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_2/header_contacto', $data);

        // Cargar footer común
        $this->load->view('contacto_2/footer_contacto');
    }
}
