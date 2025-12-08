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

    public function acerca_registrar() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_registrar/header_acerca_registrar', $data);

        // Vista principal
        $this->load->view('acerca_registrar/body_acerca_registrar', $data);

        // Footer común
        $this->load->view('acerca_registrar/footer_acerca_registrar');
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

    public function acerca_usuario_espectaculos() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('acerca_usuario_espectaculos/header_acerca_usuario_espectaculos', $data);

        // Vista principal
        $this->load->view('acerca_usuario_espectaculos/body_acerca_usuario_espectaculos', $data);

        // Footer común
        $this->load->view('acerca_usuario_espectaculos/footer_acerca_usuario_espectaculos');
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