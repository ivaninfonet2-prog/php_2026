<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // ==================================================
    // REGISTRAR USUARIO (SIEMPRE ROL USUARIO = 2)
    // ==================================================
    public function registrar_usuario($data)
    {
        // Blindaje total contra duplicación de rol
        unset($data['rol_id']);
        $data['rol_id'] = 2;

        return $this->db->insert('usuarios', $data);
    }

    // ==================================================
    // VERIFICAR SI EXISTE USUARIO (EMAIL O DNI)
    // ==================================================
    public function verificar_usuario_existente($email, $dni)
    {
        return $this->db
            ->group_start()
                ->where('nombre_usuario', $email)
                ->or_where('dni', $dni)
            ->group_end()
            ->get('usuarios')
            ->num_rows() > 0;
    }

    // ==================================================
    // OBTENER USUARIO POR EMAIL (LOGIN)
    // ==================================================
    public function obtener_usuario_por_email($email)
    {
        return $this->db
            ->where('nombre_usuario', $email)
            ->get('usuarios')
            ->row();
    }

    // ==================================================
    // OBTENER USUARIO POR ID
    // ==================================================
    public function obtener_usuario_por_id($id_usuario)
    {
        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('usuarios')
            ->row();
    }

    // ==================================================
    // LISTAR TODOS LOS USUARIOS
    // ==================================================
    public function obtener_usuarios()
    {
        return $this->db->get('usuarios')->result();
    }

    // ==================================================
    // LISTAR SOLO USUARIOS ESTÁNDAR
    // ==================================================
    public function obtener_usuarios_estandar()
    {
        return $this->db
            ->where('rol_id', 2)
            ->get('usuarios')
            ->result();
    }

    // ==================================================
    // ACTUALIZAR USUARIO (SIN CAMBIAR ROL)
    // ==================================================
    public function actualizar_usuario($id_usuario, $data)
    {
        unset($data['rol_id']);

        return $this->db
            ->where('id_usuario', $id_usuario)
            ->update('usuarios', $data);
    }

    // ==================================================
    // ELIMINAR USUARIO
    // ==================================================
    public function eliminar_usuario($id_usuario)
    {
        return $this->db->delete('usuarios', ['id_usuario' => $id_usuario]);
    }

    // ==================================================
    // OBTENER EMAIL POR ID
    // ==================================================
    public function get_usuario_email($id_usuario)
    {
        return $this->db
            ->select('nombre_usuario')
            ->where('id_usuario', $id_usuario)
            ->get('usuarios')
            ->row_array();
    }

    // ==================================================
    // OBTENER USUARIO POR EMAIL (COMPATIBILIDAD LOGIN)
    // ==================================================
    public function obtener_usuario($nombre_usuario)
    {
        return $this->db
            ->where('nombre_usuario', $nombre_usuario)
            ->get('usuarios')
            ->row();
    }

}
