<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Usuario_modelo');
        $this->load->model('Espectaculo_modelo');
    }

    public function index()
    {
        // Limpia cualquier salida previa (espacios, ;, saltos de línea)
        ob_clean();

        $data['titulo'] = 'Cartelera de Espectáculos';
        $data['fondo'] = base_url('activos/imagenes/mi_fondo.jpg');
        $data['espectaculos'] = $this->Espectaculo_modelo->obtener_espectaculos();

        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal');
    }

    public function espectaculo_principal($id = null)
    {
        if ($id === null) {
            show_404();
        }
        redirect('espectaculos/espectaculo_sin_loguear/' . $id);
    }
}
