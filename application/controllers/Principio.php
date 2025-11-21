<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // 
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    public function index()
    {
        // Datos que se pasan al layout
        $data = 
        [
            'titulo'    => 'Inicio - UNLa Tienda',
            'fondo'     => base_url('activos/imagenes/mi_fondo.jpg'),
            'contenido' => $this->load->view('espectaculos/index_sin_loguear',
                ['espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()],TRUE // devuelve el HTML como string
            )
        ];

        // Renderizo el layout maestro
        $this->load->view('principal/header_principal',$data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal');
    }

    public function index_login() 
    {
        $data['fondo_login'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'Inicio - UNLa Tienda';

        $this->load->view('footer/header_footer', $data); 
        $this->load->view('footer/body_footer', $data); 
        $this->load->view('footer/footer');
    }

    public function index_3()
    {
        $data['fondo_login'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['titulo'] = 'UNLa Tienda';

        $this->load->view('templates/header_2', $data); 
        $this->load->view('templates/body_3', $data); 
        $this->load->view('templates/footer_2');
    }

    public function index_4()
    {
        // Defino los datos que se van a pasar a las vistas
        $data = 
        [
            'titulo'       => 'Inicio - UNLa Tienda',
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos(),
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        // Renderizo las vistas con los datos
        $this->load->view('templates/header', $data);
        $this->load->view('inicio/index', $data);
        $this->load->view('templates/footer');
    }
}
