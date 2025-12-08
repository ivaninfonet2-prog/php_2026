
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller 
{
    public function index() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Contacto de UNLa Tienda';

        // Cargar header común
        $this->load->view('contacto_principal/header_contacto_principal', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_principal/body_contacto_principal', $data);

        // Cargar footer común
        $this->load->view('contacto_principal/footer_contacto_principal');
    }

    public function contacto_login() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_login/header_contacto_login', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_login/body_contacto_login', $data);

        // Cargar footer común
        $this->load->view('contacto_login/footer_contacto_login');
    }

    public function contacto_registrar() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_registrar/header_contacto_registrar', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_registrar/body_contacto_registrar', $data);

        // Cargar footer común
        $this->load->view('contacto_registrar/footer_contacto_registrar');
    }

    public function contacto_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_usuario/header_contacto_usuario', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_usuario/body_contacto_usuario', $data);

        // Cargar footer común
        $this->load->view('contacto_usuario/footer_contacto_usuario');
    }

    public function contacto_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_administrador/header_contacto_administrador', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_administrador/body_contacto_administrador', $data);

        // Cargar footer común
        $this->load->view('contacto_administrador/footer_contacto_administrador');
    }

    public function contacto_usuario_espectaculos() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');

        // Cargar header común
        $this->load->view('contacto_usuario_espectaculos/header_contacto_usuario_espectaculos', $data);

        // Vista principal de la sección "Contacto"
        $this->load->view('contacto_usuario_espectaculos/body_contacto_usuario_espectaculos', $data);

        // Cargar footer común
        $this->load->view('contacto_usuario_espectaculos/footer_contacto_usuario_espectaculos');
    }


}
?>