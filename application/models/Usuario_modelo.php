<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    /* ------------------ REGISTRAR ------------------ */
    public function registrar_usuario($data) 
    {
        return $this->db->insert('usuarios', $data);
    }

    /* ------------------ VERIFICAR EXISTENCIA ------------------ */
    public function verificar_usuario_existente($email, $dni) 
    {
        $this->db->where('nombre_usuario', $email);
        $this->db->or_where('dni', $dni);
        $query = $this->db->get('usuarios');
        return $query->num_rows() > 0;
    }

    /* ------------------ OBTENER USUARIO ------------------ */
    public function obtener_usuario($nombre_usuario, $palabra_clave = null) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        if ($palabra_clave !== null) {
            $this->db->where('palabra_clave', $palabra_clave);
        }
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    public function obtener_usuario_por_nombre($nombre_usuario)
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        $query = $this->db->get('usuarios');
        return $query->row_array();
    }

    public function obtener_por_id($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    public function obtener_id_usuario($email) 
    {
        $this->db->select('id_usuario');
        $this->db->where('nombre_usuario', $email);
        $query = $this->db->get('usuarios');
        return ($query->num_rows() > 0) ? $query->row()->id_usuario : null;
    }

    public function get_usuario_email($id_usuario)
    {
        $this->db->select('nombre_usuario');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return ($query->num_rows() > 0) ? $query->row_array() : null;
    }

    /* ------------------ LISTAR USUARIOS ------------------ */
    public function obtener_usuarios()
    {
        $query = $this->db->get('usuarios');
        return $query->result(); // devuelve array de objetos
    }

    public function obtener_usuarios_estandar()
    {
        // Solo usuarios comunes (rol_id = 1)
        $this->db->where('rol_id', 1);
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function obtener_administradores()
    {
        // Solo administradores (rol_id = 2)
        $this->db->where('rol_id', 2);
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    /* ------------------ ACTUALIZAR ------------------ */
    public function actualizar_usuario($id_usuario, $data)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('usuarios', $data);
    }

    /* ------------------ ELIMINAR ------------------ */
    public function eliminar_usuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->delete('usuarios');
    }
}
?>
