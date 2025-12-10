<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_principal/header_acerca_principal', $data);

        // Vista principal
        $this->load->view('acerca_principal/body_acerca_principal', $data);

        // Footer común
        $this->load->view('acerca_principal/footer_acerca_principal');
    }

    public function acerca_usuario() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_usuario/header_acerca_usuario', $data);

        // Vista principal
        $this->load->view('acerca_usuario/body_acerca_usuario', $data);

        // Footer común
        $this->load->view('acerca_usuario/footer_acerca_usuario');
    }

     public function acerca_administrador() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_administrador/header_acerca_administrador', $data);

        // Vista principal
        $this->load->view('acerca_administrador/body_acerca_administrador', $data);

        // Footer común
        $this->load->view('acerca_administrador/footer_acerca_administrador');
    }
}

?>
