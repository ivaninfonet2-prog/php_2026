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

    public function ayuda_2() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_2/header_ayuda', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_2/body_ayuda', $data);

        // Cargar footer común
        $this->load->view('ayuda_2/footer_ayuda');
    }
}
