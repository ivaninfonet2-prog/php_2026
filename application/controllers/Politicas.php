
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Politicas extends CI_Controller 
{
    public function index() 
    {
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politicas de UNLa Tienda';

        // Header común
        $this->load->view('header_footer/header_footer_principal', $data);

        // Vista principal
        $this->load->view('body_footer/body_footer_politicas', $data);

        // Footer común
        $this->load->view('footer_footer/footer_footer_principal');
    }
    
    public function politicas_usuario() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politicas de UNLa Tienda';

        // Cargar header común
        $this->load->view('header_footer/header_footer_usuario', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('body_footer/body_footer_politicas', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_usuario');
    }

    public function politicas_administrador() 
    {
        // Ruta de la imagen de fondo
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Politicas de UNLa Tienda';

        // Cargar header común
        $this->load->view('header_footer/header_footer_administrador', $data);

        // Vista principal de la sección "Políticas"
        $this->load->view('body_footer/body_footer_politicas', $data);

        // Cargar footer común
        $this->load->view('footer_footer/footer_footer_administrador');
    }
}

?>
