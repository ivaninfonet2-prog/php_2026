
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

    public function registrar_usuario($data) 
    {
        return $this->db->insert('usuarios', $data);
    }

    public function verificar_usuario_existente($email, $dni) 
    {
        $this->db->where('nombre_usuario', $email);
        $this->db->or_where('dni', $dni);
        $query = $this->db->get('usuarios');
        return $query->num_rows() > 0;
    }

    public function obtener_usuario_por_nombre($nombre_usuario)
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        $query = $this->db->get('usuarios');
        return $query->row_array();
    }    

    public function obtener_usuario($nombre_usuario, $palabra_clave) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        $this->db->where('palabra_clave', $palabra_clave);
        $query = $this->db->get('usuarios');
        return $query->row();
    }

    public function obtener_id_usuario($email) 
    {
        $this->db->select('id_usuario');
        $this->db->from('usuarios');
        $this->db->where('nombre_usuario', $email);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row()->id_usuario : null;
    }

    public function get_usuario_email($id_usuario)
    {
        $this->db->select('nombre_usuario');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row_array() : null;
    }

     //  Nuevo método: obtener usuario completo por ID
    public function obtener_por_id($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
        return $query->row(); // devuelve objeto con nombre, apellido, etc.
    }
}
