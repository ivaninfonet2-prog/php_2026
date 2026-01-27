<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // =========================
    // REGISTRAR USUARIO
    // =========================
    public function registrar_usuario($data)
    {
        $data['rol_id'] = 1; // usuario por defecto
        return $this->db->insert('usuarios', $data);
    }

    // =========================
    // VERIFICAR USUARIO EXISTENTE
    // =========================
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

    // =========================
    // OBTENER USUARIOS
    // =========================
    public function obtener_usuario_por_email($email)
    {
        return $this->db
            ->where('nombre_usuario', $email)
            ->get('usuarios')
            ->row();
    }

    public function obtener_usuario_por_id($id_usuario)
    {
        return $this->db
            ->where('id_usuario', $id_usuario)
            ->get('usuarios')
            ->row();
    }

    public function obtener_usuarios()
    {
        return $this->db->get('usuarios')->result();
    }

    public function obtener_usuarios_estandar()
    {
        return $this->db
            ->where('rol_id', 1)
            ->get('usuarios')
            ->result();
    }

    // =========================
    // ACTUALIZAR USUARIO
    // =========================
    public function actualizar_usuario($id_usuario, $data)
    {
        // No permitir cambiar el rol
        unset($data['rol_id']);

        // Si no envían contraseña, no se actualiza
        if (empty($data['palabra_clave'])) {
            unset($data['palabra_clave']);
        }

        return $this->db
            ->where('id_usuario', $id_usuario)
            ->update('usuarios', $data);
    }

    // =========================
    // VALIDACIONES
    // =========================
    public function usuario_tiene_clientes($id_usuario)
    {
        return $this->db
            ->where('usuario_id', $id_usuario) // ✔ correcto según tu BD
            ->get('clientes')
            ->num_rows() > 0;
    }

    // (opcional, por si luego lo necesitas)
    public function usuario_tiene_reservas($id_usuario)
    {
        return $this->db
            ->where('usuario_id', $id_usuario)
            ->get('reservas')
            ->num_rows() > 0;
    }

    // =========================
    // ELIMINAR USUARIO
    // =========================
    public function eliminar_usuario($id_usuario)
    {
        return $this->db
            ->where('id_usuario', $id_usuario) // ✔ PK correcta
            ->delete('usuarios');
    }
}
