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
        $this->load->view('ayuda_principal/header_ayuda_principal', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_principal/body_ayuda_principal', $data);

        // Cargar footer común
        $this->load->view('ayuda_principal/footer_ayuda_principal');
    }

    public function ayuda_login() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header/header_login', $data);

       // Vista principal
        $this->load->view('ayuda_principal/body_ayuda_principal', $data);

        // Footer común
        $this->load->view('footer/footer_login');
    }

    public function ayuda_registrar() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header/header_registrar', $data);

       // Vista principal
        $this->load->view('ayuda_principal/body_ayuda_principal', $data);

        // Footer común
        $this->load->view('footer/footer_registrar');
    }

    public function ayuda_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_usuario/header_ayuda_usuario', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_usuario/body_ayuda_usuario', $data);

        // Cargar footer común
        $this->load->view('ayuda_usuario/footer_ayuda_usuario');
    }

    public function ayuda_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_administrador/header_ayuda_administrador', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_administrador/body_ayuda_administrador', $data);

        // Cargar footer común
        $this->load->view('ayuda_administrador/footer_ayuda_administrador');
    }

}
?>
