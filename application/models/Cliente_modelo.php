<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /* ======================================================
       OBTENER CLIENTE POR USUARIO
    ====================================================== */
    public function obtener_cliente_por_usuario($usuario_id)
    {
        return $this->db
            ->where('usuario_id', $usuario_id)
            ->get('clientes')
            ->row_array();
    }

    /* ======================================================
       CREAR CLIENTE
    ====================================================== */
    public function crear_cliente($usuario_id)
    {
        return $this->db->insert('clientes', [
            'usuario_id' => $usuario_id
        ]);
    }

    /* ======================================================
       LISTADO COMPLETO DE CLIENTES CON EMAIL
       👉 email = nombre_usuario
    ====================================================== */
    public function obtener_clientes()
    {
        return $this->db
            ->select('
                clientes.id_cliente,
                usuarios.nombre_usuario AS email,
                usuarios.nombre,
                usuarios.dni,
                usuarios.telefono
            ')
            ->from('clientes')
            ->join('usuarios', 'usuarios.id_usuario = clientes.usuario_id')
            ->order_by('clientes.id_cliente', 'ASC')
            ->get()
            ->result_array();
    }

    /* ======================================================
       MÉTODO ANTIGUO (COMPATIBILIDAD CON CONTROLADOR)
    ====================================================== */
    public function obtener_clientes_por_usuario()
    {
        return $this->obtener_clientes();
    }
}
