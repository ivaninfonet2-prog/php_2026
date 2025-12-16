<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Crea una reserva y descuenta entradas usando transacción
     */
    public function crear_reserva($id_espectaculo, $cantidad, $fecha_reserva, $usuario_id, $monto_total)
    {
        $this->db->trans_start();

        // Verificar entradas disponibles
        $espectaculo = $this->db->select('disponibles')
                                 ->where('id_espectaculo', $id_espectaculo)
                                 ->get('espectaculos')
                                 ->row();

        if (!$espectaculo || $espectaculo->disponibles < $cantidad)
        {
            return FALSE;
        }

        // Insertar reserva
        $reserva = [
            'espectaculo_id' => $id_espectaculo,
            'cantidad'       => $cantidad,
            'fecha_reserva'  => $fecha_reserva,
            'usuario_id'     => $usuario_id,
            'monto_total'    => $monto_total
        ];
        $this->db->insert('reservas', $reserva);

        // Descontar entradas
        $this->db->set('disponibles', 'disponibles - ' . (int)$cantidad, FALSE);
        $this->db->where('id_espectaculo', $id_espectaculo);
        $this->db->update('espectaculos');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * Nueva versión: Obtiene reservas por usuario (más limpia y normalizada)
     */
    public function obtener_reservas_usuario($usuario_id)
    {
        return $this->db->select('r.id_reserva, r.cantidad, r.fecha_reserva, r.monto_total,
                                  e.nombre AS nombre_espectaculo, e.fecha AS fecha_espectaculo, e.precio')
                        ->from('reservas r')
                        ->join('espectaculos e', 'r.espectaculo_id = e.id_espectaculo')
                        ->where('r.usuario_id', $usuario_id)
                        ->order_by('r.fecha_reserva', 'DESC')
                        ->get()
                        ->result_array();
    }

    /**
     * Compatibilidad con el controlador actual.
     * Llama internamente a la nueva función para evitar duplicar código.
     */
    public function obtener_reservas($usuario_id)
    {
        return $this->obtener_reservas_usuario($usuario_id);
    }

     public function eliminar_reserva($id_reserva)
    {
        $this->db->where('id_reserva', $id_reserva);
        return $this->db->delete('reservas');
    }

public function obtener_reserva_por_id($id_reserva)
{
    return $this->db->select('r.id_reserva, r.cantidad, r.fecha_reserva, r.monto_total, r.usuario_id,
                              e.nombre AS nombre_espectaculo, e.fecha AS fecha_espectaculo, e.precio, e.disponibles')
                    ->from('reservas r')
                    ->join('espectaculos e', 'r.espectaculo_id = e.id_espectaculo')
                    ->where('r.id_reserva', $id_reserva)
                    ->get()
                    ->row_array(); // devuelve un array asociativo
}

public function obtener_reserva_detalle($id_reserva, $id_usuario)
{
    $this->db->select('reservas.id_reserva, reservas.cantidad, reservas.fecha_reserva, reservas.monto_total,
                       espectaculos.nombre as nombre_espectaculo, espectaculos.fecha as fecha_espectaculo,
                       espectaculos.precio, espectaculos.disponibles');
    $this->db->from('reservas');
    $this->db->join('espectaculos', 'reservas.espectaculo_id = espectaculos.id_espectaculo');
    $this->db->where('reservas.id_reserva', $id_reserva);
    $this->db->where('reservas.usuario_id', $id_usuario);

    return $this->db->get()->row_array();
}


}
?>
