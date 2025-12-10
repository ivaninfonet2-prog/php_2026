
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
        $data['fondo']  = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Acerca de UNLa Tienda';

        // Header común
        $this->load->view('header/header_login', $data);

       // Vista principal
        $this->load->view('politicas_principal/body_politicas_principal', $data);

        // Footer común
        $this->load->view('footer/footer_login');
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

}
?>
