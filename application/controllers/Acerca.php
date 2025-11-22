<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acerca extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_principal/header_acerca', $data);

        // Vista principal
        $this->load->view('acerca_principal/body_acerca', $data);

        // Footer común
        $this->load->view('acerca_principal/footer_acerca');
    }

    public function index_2() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('templates/header_2', $data);

        // Vista principal
        $this->load->view('body_footer_2/acerca', $data);

        // Footer común
        $this->load->view('templates/footer_2');
    }
}
?>
