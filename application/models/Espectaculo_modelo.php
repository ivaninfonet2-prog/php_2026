<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculo_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // -------------------------------------------------------
    // OBTENER LISTA COMPLETA (ARRAY)
    // -------------------------------------------------------
    public function obtener_espectaculos() 
    {
        return $this->db->get('espectaculos')->result_array();
    }

    // -------------------------------------------------------
    // OBTENER ESPECTÁCULO POR ID (ARRAY)
    // -------------------------------------------------------
    public function obtener_espectaculo_por_id($id) 
    {
        return $this->db
                    ->where('id_espectaculo', $id)
                    ->get('espectaculos')
                    ->row_array();
    }

    // -------------------------------------------------------
    // OBTENER PRECIO (DEVUELVE VALOR SIMPLE)
    // -------------------------------------------------------
    public function obtener_precio($id_espectaculo)
    {
        $query = $this->db
                      ->select('precio')
                      ->where('id_espectaculo', $id_espectaculo)
                      ->get('espectaculos');

        return ($query->num_rows() > 0)
            ? $query->row()->precio
            : false;
    }

    // -------------------------------------------------------
    // VERIFICAR SI ESPECTÁCULO ESTÁ HABILITADO (OBJETO)
    // -------------------------------------------------------
    public function esta_habilitado($id_espectaculo) 
    {
        $es = $this->db
                   ->where('id_espectaculo', $id_espectaculo)
                   ->get('espectaculos')
                   ->row();

        if (!$es) return false;

        return ($es->disponibles > 0 && $es->fecha >= date('Y-m-d'));
    }

    // -------------------------------------------------------
    // OBTENER ESPECTÁCULO HABILITADO (OBJETO)
    // -------------------------------------------------------
    public function obtener_espectaculo_habilitado($id_espectaculo)
    {
        return $this->db
                    ->where('id_espectaculo', $id_espectaculo)
                    ->where('fecha >=', date('Y-m-d'))
                    ->where('disponibles >', 0)
                    ->get('espectaculos')
                    ->row();
    }

    // -------------------------------------------------------
    // RESTAR ENTRADAS DISPONIBLES
    // -------------------------------------------------------
    public function restar_entradas($id_espectaculo, $cantidad) 
    {
        $es = $this->db
                   ->where('id_espectaculo', $id_espectaculo)
                   ->get('espectaculos')
                   ->row();

        if ($es && $es->disponibles >= $cantidad) 
        {
            $nuevo_valor = $es->disponibles - $cantidad;
            return $this->db
                        ->where('id_espectaculo', $id_espectaculo)
                        ->update('espectaculos', ['disponibles' => $nuevo_valor]);
        }

        return false;
    }

    // -------------------------------------------------------
    // OBTENER DETALLES (SI EL CAMPO EXISTE)
    // -------------------------------------------------------
    public function obtener_detalles($id_espectaculo) 
    {
        $q = $this->db
                 ->select('detalles')
                 ->where('id_espectaculo', $id_espectaculo)
                 ->get('espectaculos');

        return ($q->num_rows() > 0)
            ? $q->row()->detalles
            : '';
    }

    // -------------------------------------------------------
    // AGREGAR ESPECTÁCULO
    // -------------------------------------------------------
    public function agregar_espectaculo($data)
    {
        return $this->db->insert('espectaculos', $data);
    }

    // -------------------------------------------------------
    // ACTUALIZAR ESPECTÁCULO
    // -------------------------------------------------------
    public function actualizar_espectaculo($id, $datos)
    {
        return $this->db
                    ->where('id_espectaculo', $id)
                    ->update('espectaculos', $datos);
    }

    // -------------------------------------------------------
    // ELIMINAR TOTALMENTE UN ESPECTÁCULO + DATOS RELACIONADOS
    // -------------------------------------------------------
    public function eliminar_espectaculo_completo($id_espectaculo)
    {
        // Eliminar ventas
        $this->db->where('espectaculo_id', $id_espectaculo)->delete('ventas');

        // Eliminar reservas
        $this->db->where('espectaculo_id', $id_espectaculo)->delete('reservas');

        // Finalmente eliminar espectáculo
        return $this->db
                    ->where('id_espectaculo', $id_espectaculo)
                    ->delete('espectaculos');
    }

    // -------------------------------------------------------
    // OBTENER USUARIO (ARRAY)
    // -------------------------------------------------------
    public function obtener_usuario($id_usuario, $campo = null)
    {
        $usuario = $this->db
                        ->where('id_usuario', $id_usuario)
                        ->get('usuarios')
                        ->row_array();

        if (!$usuario) return false;

        return ($campo !== null && isset($usuario[$campo]))
            ? $usuario[$campo]
            : $usuario;
    }
}
?>
