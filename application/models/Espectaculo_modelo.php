<<<<<<< HEAD
=======

>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculo_modelo extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

<<<<<<< HEAD
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
=======
    // Obtener todos los espectáculos
    public function obtener_espectaculos() 
    {
        return $this->db->get('espectaculos')->result();
    }

    // Obtener espectáculo por ID
    public function obtener_espectaculo_por_id($id) 
    {
        return $this->db->get_where('espectaculos', ['id_espectaculo' => $id])->row_array();
    }

    // Obtener precio de un espectáculo
    public function obtener_precio($id_espectaculo)
    {
        $this->db->select('precio');
        $this->db->from('espectaculos');
        $this->db->where('id_espectaculo', $id_espectaculo);
        $query = $this->db->get();

        return $query->num_rows() > 0 ? $query->row()->precio : false;
    }

    // Verificar si el espectáculo está habilitado
    public function esta_habilitado($id_espectaculo) 
    {
        $this->db->where('id_espectaculo', $id_espectaculo);
        $espectaculo = $this->db->get('espectaculos')->row();

        return $espectaculo && $espectaculo->disponibles > 0 && $espectaculo->fecha >= date('Y-m-d');
    }

    // Obtener espectáculo habilitado (fecha futura y entradas disponibles)
    public function obtener_espectaculo_habilitado($id_espectaculo)
    {
        $this->db->where('id_espectaculo', $id_espectaculo);
        $this->db->where('fecha >=', date('Y-m-d'));
        $this->db->where('disponibles >', 0);
        return $this->db->get('espectaculos')->row();
    }

    // Restar entradas disponibles
    public function restar_entradas($id_espectaculo, $cantidad) 
    {
        $this->db->where('id_espectaculo', $id_espectaculo);
        $espectaculo = $this->db->get('espectaculos')->row();

        if ($espectaculo && $espectaculo->disponibles >= $cantidad) 
        {
            $nueva_cantidad = $espectaculo->disponibles - $cantidad;
            $this->db->where('id_espectaculo', $id_espectaculo);
            $this->db->update('espectaculos', ['disponibles' => $nueva_cantidad]);
            return true;
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
        }

        return false;
    }

<<<<<<< HEAD
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
=======
    // Obtener detalles del espectáculo
    public function obtener_detalles($id_espectaculo) 
    {
        $this->db->select('detalles');
        $this->db->where('id_espectaculo', $id_espectaculo);
        $query = $this->db->get('espectaculos');

        return $query->num_rows() > 0 ? $query->row()->detalles : '';
    }

>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
    public function agregar_espectaculo($data)
    {
        return $this->db->insert('espectaculos', $data);
    }

<<<<<<< HEAD
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
=======
    public function actualizar_espectaculo($id, $datos)
    {
        $this->db->where('id_espectaculo', $id);
        
        if ($this->db->update('espectaculos', $datos)) 
        {
            return true;
        } 
        else 
        {
            log_message('error', 'Error al actualizar espectáculo con ID: ' . $id);
            return false;
        }
    }

    public function eliminar_espectaculo_completo($id_espectaculo)
    {
        // Eliminar ventas
        $this->db->where('espectaculo_id', $id_espectaculo);
        $this->db->delete('ventas');

        // Eliminar reservas
        $this->db->where('espectaculo_id', $id_espectaculo);
        $this->db->delete('reservas');

        // Eliminar clientes sin otras reservas
        $clientes = $this->db->select('usuario_id')
                         ->from('reservas')
                         ->where('espectaculo_id', $id_espectaculo)
                         ->get()->result_array();

        foreach ($clientes as $cliente) 
        {
            $id = $cliente['usuario_id'];
            $otras = $this->db->where('usuario_id', $id)
                          ->where('espectaculo_id !=', $id_espectaculo)
                          ->count_all_results('reservas');

            if ($otras == 0) 
            {
                $this->db->where('id_usuario', $id);
                $this->db->delete('clientes');
            }
        }

        // Eliminar espectáculo
        $this->db->where('id_espectaculo', $id_espectaculo);
        return $this->db->delete('espectaculos');
    }
}

?>;
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
