
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller 
{
    public function index() 
    {
        // Cargar la vista 'administrador'
        $this->load->view('vista_comienzo_2');
        $this->load->view('vista_administrador');
        $this->load->view('footer');
    }

       public function index_2() 
    {
        // Cargar la vista 'administrador'
        $this->load->view('vista_comienzo_2');
        $this->load->view('vista_administrador');
        $this->load->view('templates/footer_2');
    }


}
?>