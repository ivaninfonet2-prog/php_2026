<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmaciones extends CI_Controller {

    /** Confirmar cerrar sesión */
    public function cerrar_sesion()
    {
        $data['mensaje'] = '¿Estás seguro que deseas cerrar sesión?';
        $data['url_confirmar'] = base_url('cerrar_sesion');
        $this->load->view('confirmacion_modal', $data);
    }

    /** Confirmar cancelar reserva */
    public function cancelar_reserva($id)
    {
        $data['mensaje'] = '¿Estás seguro que deseas cancelar esta reserva?';
        $data['url_confirmar'] = base_url("reserva/cancelar/$id");
        $this->load->view('confirmacion_modal', $data);
    }

    /** Confirmar eliminar usuario */
    public function eliminar_usuario($id)
    {
        $data['mensaje'] = '¿Deseas eliminar este usuario?';
        $data['url_confirmar'] = base_url("usuario/eliminar/$id");
        $this->load->view('confirmacion_modal', $data);
    }

    /** Confirmar eliminar espectáculo */
    public function eliminar_espectaculo($id)
    {
        $data['mensaje'] = '¿Deseas eliminar este espectáculo?';
        $data['url_confirmar'] = base_url("espectaculo/eliminar/$id");
        $this->load->view('confirmacion_modal', $data);
    }

    /** Confirmar editar usuario */
    public function editar_usuario($id)
    {
        $data['mensaje'] = '¿Deseas editar este usuario?';
        $data['url_confirmar'] = base_url("usuario/editar/$id");
        $this->load->view('confirmacion_modal', $data);
    }

    /** Confirmar editar espectáculo */
    public function editar_espectaculo($id)
    {
        $data['mensaje'] = '¿Deseas editar este espectáculo?';
        $data['url_confirmar'] = base_url("espectaculo/editar/$id");
        $this->load->view('confirmacion_modal', $data);
    }
}
