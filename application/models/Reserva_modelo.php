<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_modelo extends CI_Model 
{
    public function __construct() 
    {
<<<<<<< HEAD
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
}
=======
        $this->load->database();
        $this->load->library('session'); // Cargar la librería de sesión
    }

    public function crear_reserva($id_espectaculo,$cantidad_entradas,$fecha_reserva,$usuario,$monto_total) 
    {
        // Consultar las entradas disponibles
        $this->db->select('disponibles');
        $this->db->where('id_espectaculo', $id_espectaculo);

        $espectaculo = $this->db->get('espectaculos')->row();
    
        // Verificar si hay suficientes entradas disponibles
        if ($espectaculo && $espectaculo->disponibles >= $cantidad_entradas)
        {
            // Insertar la reserva en la tabla "reservas"
            $reserva_data = array
            (
                'espectaculo_id' => $id_espectaculo,
                'cantidad' => $cantidad_entradas,
                'fecha_reserva' => $fecha_reserva, // Guardar la fecha de reserva
                'usuario_id' => $usuario,
                'monto_total' => $monto_total
            );
                
            $this->db->insert('reservas', $reserva_data);
    
            // Restar las entradas disponibles
            $this->db->set('disponibles', 'disponibles -' . (int)$cantidad_entradas, FALSE);
            $this->db->where('id_espectaculo', $id_espectaculo);

            return $this->db->update('espectaculos');
        }
    
        return FALSE; // No hay suficientes entradas
    }

    public function obtener_espectaculo_por_id($id_espectaculo) 
    {
        // Obtener un espectáculo por su ID

        $this->db->where('id_espectaculo', $id_espectaculo);
        return $this->db->get('espectaculos')->row_array();
    }

    public function obtener_reservas($id_usuario) 
    {
        $this->db->select('*'); // Selecciona todas las columnas relevantes.
        $this->db->from('reservas'); // Cambia 'reservas' por el nombre de tu tabla.
        $this->db->where('usuario_id', $id_usuario); // Filtra por el ID del usuario.
        $query = $this->db->get();

        return $query->result_array(); // Devuelve las reservas como un array.
    }
}    

>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
?>
