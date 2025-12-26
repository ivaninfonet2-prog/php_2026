<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmacion extends CI_Controller 
{
    /** Confirmar cerrar sesión (pantalla intermedia) */
    public function cerrar_sesion_usuario()
    {
        // Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            exit;
        }

        // Evitar cache del navegador
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
             ->set_header("Pragma: no-cache")
             ->set_header("Expires: 0");

        $data = [
            'titulo'     => 'Confirmar cierre de sesión',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('confirmacion/cerrar_sesion_usuario', $data);
        $this->load->view('usuario/footer_usuario');
    }

    /** LOGOUT FORZADO (USADO POR EL LOGO) */
    public function logout_forzado()
    {
        // Destruir sesión completamente
        $this->session->sess_destroy();

        // Bloquear cache del navegador (CRÍTICO)
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
             ->set_header("Cache-Control: post-check=0, pre-check=0", false)
             ->set_header("Pragma: no-cache")
             ->set_header("Expires: 0");

        redirect('login');
        exit;
    }

    /** Confirmar cerrar sesión (ADMIN) */
    public function cerrar_sesion_administrador()
    {
        // Si no está logueado, afuera
        if (!$this->session->userdata('logged_in'))
        {
            redirect('login');
            exit;
        }

        // Evitar cache del navegador (CRÍTICO)
        $this->output
             ->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0")
            ->set_header("Pragma: no-cache")
            ->set_header("Expires: 0");

        $data =
        [
            'titulo'     => 'Confirmar cierre de sesión',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('administrador/header_administrador', $data);
        $this->load->view('confirmacion/cerrar_sesion_administrador', $data);
        $this->load->view('administrador/footer_administrador');
    }

     /** Confirmar cancelar reserva */
    public function cancelar_reserva($id_reserva)
    {
        // Si no está logueado, afuera
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
            'titulo'     => 'Confirmar cancelación de reserva',
            'fondo'      => base_url('activos/imagenes/mi_fondo.jpg'),
            'id_reserva' => $id_reserva, //  CLAVE
            'id_usuario' => $this->session->userdata('id_usuario'),
            'logged_in'  => true,
        ];

        $this->load->view('usuario/header_usuario', $data);
        $this->load->view('confirmacion/cancelar_reserva', $data);
        $this->load->view('usuario/footer_usuario');
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
