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
            'contenido' => $this->load->view('espectaculos_sin_loguear/index_sin_loguear',
                ['espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()],TRUE // devuelve el HTML como string
            )
        ];

        // Renderizo el layout maestro
        $this->load->view('principal/header_principal',$data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal');
    }

}
