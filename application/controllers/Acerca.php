<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header_footer/header_footer_principal', $data);

        // Vista principal
        $this->load->view('body_footer/body_footer_acerca', $data);

        // Footer común
        $this->load->view('footer_footer/footer_footer_principal');
    }

    public function acerca_usuario() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header_footer/header_footer_usuario', $data);

        // Vista principal
        $this->load->view('body_footer/body_footer_acerca', $data);

        // Footer común
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    public function acerca_administrador() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header_footer/header_footer_administrador', $data);

        // Vista principal
        $this->load->view('body_footer/body_footer_acerca', $data);

        // Footer común
        $this->load->view('footer_footer/footer_footer_administrador');
    }
}


