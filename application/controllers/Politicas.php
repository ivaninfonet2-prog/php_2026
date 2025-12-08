
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicas extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politica de UNLa Tienda';

        // Header común
        $this->load->view('politicas_principal/header_politicas_principal', $data);

        // Vista principal
        $this->load->view('politicas_principal/body_politicas_principal', $data);

        // Footer común
        $this->load->view('politicas_principal/footer_politicas_principal');
    }
    
    public function politicas_login() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politica de UNLa Tienda';

        // Cargar header común
        $this->load->view('politicas_login/header_politicas_login', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('politicas_login/body_politicas_login', $data);

        // Cargar footer común
        $this->load->view('politicas_login/footer_politicas_login');
    }

    public function politicas_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politica de UNLa Tienda';

        // Cargar header común
        $this->load->view('politicas_usuario/header_politicas_usuario', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('politicas_usuario/body_politicas_usuario', $data);

        // Cargar footer común
        $this->load->view('politicas_usuario/footer_politicas_usuario');
    }

    public function politicas_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politica de UNLa Tienda';

        // Cargar header común
        $this->load->view('politicas_administrador/header_politicas_administrador', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('politicas_administrador/body_politicas_administrador', $data);

        // Cargar footer común
        $this->load->view('politicas_administrador/footer_politicas_administrador');
    }

    public function politicas_usuario_espectaculos() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politica de UNLa Tienda';

        // Cargar header común
        $this->load->view('politicas_usuario_espectaculos/header_politicas_usuario_espectaculos', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('politicas_usuario_espectaculos/body_politicas_usuario_espectaculos', $data);

        // Cargar footer común
       $this->load->view('politicas_usuario_espectaculos/footer_politicas_usuario_espectaculos');
    }

}
?>