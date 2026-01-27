<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Crear venta
    public function crear_venta($usuario_id, $espectaculo_id, $reserva_id, $monto_total, $fecha)
    {
        $data = [
            'usuario_id'     => $usuario_id,
            'espectaculo_id' => $espectaculo_id,
            'reserva_id'     => $reserva_id,
            'monto_total'    => $monto_total,
            'fecha_venta'    => $fecha
        ];

        return $this->db->insert('ventas', $data);
    }

    // Obtener todas las ventas
    public function obtener_ventas()
    {
        $this->db->select('v.id_venta, v.usuario_id, v.espectaculo_id, v.reserva_id, v.monto_total, v.fecha_venta,
                           u.nombre AS nombre_usuario, e.nombre AS nombre_espectaculo, r.cantidad AS cantidad_reservada');
        $this->db->from('ventas v');
        $this->db->join('usuarios u', 'v.usuario_id = u.id_usuario', 'left');
        $this->db->join('espectaculos e', 'v.espectaculo_id = e.id_espectaculo', 'left');
        $this->db->join('reservas r', 'v.reserva_id = r.id_reserva', 'left');
        $this->db->order_by('v.fecha_venta', 'DESC');

        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result_array() : false;
    }

    public function obtener_venta_por_id($id_venta)
    {
        $this->db->select('v.id_venta, v.usuario_id, v.espectaculo_id, v.reserva_id, v.monto_total, v.fecha_venta,
                           u.nombre AS nombre_usuario, e.nombre AS nombre_espectaculo, r.cantidad AS cantidad_reservada');
        $this->db->from('ventas v');
        $this->db->join('usuarios u', 'v.usuario_id = u.id_usuario', 'left');
        $this->db->join('espectaculos e', 'v.espectaculo_id = e.id_espectaculo', 'left');
        $this->db->join('reservas r', 'v.reserva_id = r.id_reserva', 'left');
        $this->db->where('v.id_venta', $id_venta);

        return $this->db->get()->row_array();
    }
}
?>
