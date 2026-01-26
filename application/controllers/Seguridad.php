<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguridad extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
             ->set_header("Cache-Control: post-check=0, pre-check=0", false)
             ->set_header("Pragma: no-cache");
    }

    // Puedes agregar métodos de seguridad aquí si quieres
    public function index()
    {
        echo "Controlador Seguridad funcionando.";
    }
}
?>
