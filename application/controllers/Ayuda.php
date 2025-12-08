<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
<<<<<<< HEAD
        $data['titulo'] = 'Ayuda de UNLa Tienda';

        // Cargar header común
        $this->load->view('ayuda_principal/header_ayuda_principal', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_principal/body_ayuda_principal', $data);

        // Cargar footer común
        $this->load->view('ayuda_principal/footer_ayuda_principal');
    }

    public function ayuda_login() 
=======

        // Cargar header común
        $this->load->view('ayuda_principal/header_ayuda', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_principal/body_ayuda', $data);

        // Cargar footer común
        $this->load->view('ayuda_principal/footer_ayuda');
    }

    public function ayuda_2() 
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
<<<<<<< HEAD
        $this->load->view('ayuda_login/header_ayuda_login', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_login/body_ayuda_login', $data);

        // Cargar footer común
        $this->load->view('ayuda_login/footer_ayuda_login');
    }

    public function ayuda_registrar() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_registrar/header_ayuda_registrar', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_registrar/body_ayuda_registrar', $data);

        // Cargar footer común
        $this->load->view('ayuda_registrar/footer_ayuda_registrar');
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

     public function ayuda_usuario_espectaculos() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('ayuda_usuario_espectaculos/header_ayuda_usuario_espectaculos', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_usuario_espectaculos/body_ayuda_usuario_espectaculos', $data);

        // Cargar footer común
        $this->load->view('ayuda_usuario_espectaculos/footer_ayuda_usuario_espectaculos');
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
=======
        $this->load->view('ayuda_2/header_ayuda', $data);

        // Vista principal de la sección "Ayuda"
        $this->load->view('ayuda_2/body_ayuda', $data);

        // Cargar footer común
        $this->load->view('ayuda_2/footer_ayuda');
    }
}
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
