<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_principal/header_ayuda', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_principal/body_ayuda', $data);

        // Cargar footer común
        $this->load->view('ayuda_principal/footer_ayuda');
    }

    public function index_2() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('templates/header', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('body_footer_2/ayuda', $data);

        // Cargar footer común
        $this->load->view('templates/footer_2');
    }
}
