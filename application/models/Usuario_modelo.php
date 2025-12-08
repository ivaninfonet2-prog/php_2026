<<<<<<< HEAD
=======

>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
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

<<<<<<< HEAD
    // Método actualizado: $palabra_clave opcional
    public function obtener_usuario($nombre_usuario, $palabra_clave = null) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        if ($palabra_clave !== null) {
            $this->db->where('palabra_clave', $palabra_clave);
        }
=======
    public function obtener_usuario($nombre_usuario, $palabra_clave) 
    {
        $this->db->where('nombre_usuario', $nombre_usuario);
        $this->db->where('palabra_clave', $palabra_clave);
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
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

<<<<<<< HEAD
    // Nuevo método: obtener usuario completo por ID
=======
     //  Nuevo método: obtener usuario completo por ID
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
    public function obtener_por_id($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $query = $this->db->get('usuarios');
<<<<<<< HEAD
        return $query->row(); // devuelve objeto con nombre, apellido, email, etc.
    }

    public function actualizar_usuario($id_usuario, $data)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->update('usuarios', $data);
    }

    public function eliminar_usuario($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->delete('usuarios');
    }

    public function obtener_usuarios()
    {
        $query = $this->db->get('usuarios');
        return $query->result(); // devuelve array de objetos
    }
}
?>
=======
        return $query->row(); // devuelve objeto con nombre, apellido, etc.
    }
}
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
