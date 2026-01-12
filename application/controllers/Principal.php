<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('Espectaculo_modelo');
    }

    public function index()
    {
        $data = 
        [
            'titulo'       => 'Cartelera de Espectáculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $this->Espectaculo_modelo->obtener_espectaculos()
        ];

        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('footer_footer/footer_footer_principal', $data);
    }

    public function espectaculo_principal($id = null)
    {
        if (!$id)
        {
            show_404();
        }

        redirect('espectaculos/espectaculo_sin_loguear/' . (int)$id);
    }
}
