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

    public function acerca_login() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_login/header_acerca_login', $data);

        // Vista principal
        $this->load->view('acerca_login/body_acerca_login', $data);

        // Footer común
        $this->load->view('acerca_login/footer_acerca_login');
    }
}
?>
