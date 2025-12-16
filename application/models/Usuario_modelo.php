<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function registrar_usuario($data) 
    {
        return $this->db->insert('usuarios', $data);
    }

    public function verificar_usuario_existente($email, $dni) 
    {
        $this->db->where('nombre_usuario', $email);
        $this->db->or_where('dni', $dni);
        return $this->db->get('usuarios')->num_rows() > 0;
    }

    public function obtener_usuario($nombre_usuario, $palabra_clave = null) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        if ($palabra_clave !== null) {
            $this->db->where('palabra_clave', $palabra_clave);
        }
        return $this->db->get('usuarios')->row();
    }

    public function obtener_usuarios()
    {
        return $this->db->get('usuarios')->result();
    }

    public function eliminar_usuario($id_usuario)
    {
        return $this->db->delete('usuarios', ['id_usuario' => $id_usuario]);
    }
}
