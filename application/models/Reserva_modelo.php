<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    // Crear reserva y devolver el ID recién creado
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
        $reserva_id = $this->db->insert_id(); // <-- OBTENEMOS EL ID

        // Descontar entradas
        $this->db->set('disponibles', 'disponibles - ' . (int)$cantidad, FALSE);
        $this->db->where('id_espectaculo', $id_espectaculo);
        $this->db->update('espectaculos');

        $this->db->trans_complete();

        if ($this->db->trans_status())
        {
            return $reserva_id; // DEVOLVEMOS EL ID
        }
        else
        {
            return FALSE;
        }
    }

    // Obtener reservas por usuario
    public function obtener_reservas($usuario_id)
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
                        ->row_array();
    }

     public function obtener_reserva_detalle($id_reserva, $id_usuario)
    {
        $this->db->select('r.id_reserva, r.cantidad, r.fecha_reserva, r.monto_total,
                       e.nombre as nombre_espectaculo, e.fecha as fecha_espectaculo,
                       e.precio, e.disponibles');
        $this->db->from('reservas r');
        $this->db->join('espectaculos e', 'r.espectaculo_id = e.id_espectaculo');
        $this->db->where('r.id_reserva', $id_reserva);
        $this->db->where('r.usuario_id', $id_usuario);

        return $this->db->get()->row_array();
    }
}
?>
