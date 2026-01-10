<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller
{
    public function index() 
    {
        // Ruta de la imagen de fondo

        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Ayuda de UNLa Tienda';

        // Cargar header común
        
        $this->load->view('header_footer/header_footer_principal', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('body_footer/body_footer_ayuda', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function ayuda_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('header_footer/header_footer_usuario', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('body_footer/body_footer_ayuda', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    public function ayuda_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('header_footer/header_footer_administrador', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('body_footer/body_footer_ayuda', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_administrador');
    }
}


