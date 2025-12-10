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
        redirect('espectaculos');
    }

    public function espectaculo_principal($id = null)
    {
        // Evita llamadas sin ID
        if ($id === null)
        {
            show_404();
        }

        // Redirige al controlador de espectáculos (responsabilidad correcta)
        redirect('espectaculos/espectaculo_sin_loguear/' . $id);
    }

}
?>

