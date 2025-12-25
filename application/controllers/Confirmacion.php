<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller 
{
    /** Confirmar cerrar sesión */
    public function cerrar_sesion_usuario()
    {
        //  Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            return;
        }

        // Evitar cache
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Pragma: no-cache");

        $data =
        [
            'titulo'     => 'Confirmar cierre de sesión',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('confirmacion/cerrar_sesion_usuario', $data);
        $this->load->view('usuario/footer_usuario');
    }

    /** Confirmar cerrar sesión */
    public function cerrar_sesion_administrador()
    {
        $this->load->view('confirmacion/cerrar_sesion');
    }

    /** Confirmar cancelar reserva */
    public function cancelar_reserva()
    {
        $this->load->view('confirmacion/cancelar_reserva');
    }

    /** Confirmar eliminar usuario */
    public function eliminar_usuario()
    {
        $this->load->view('confirmacion/eliminar_usuario');
    }

    /** Confirmar eliminar espectáculo */
    public function eliminar_espectaculo()
    {
        $this->load->view('confirmacion/eliminar_espectaculo');
    }
}
