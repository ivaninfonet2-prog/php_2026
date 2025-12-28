<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Espectaculo_modelo');
    }

    // -------------------------------------------------------
    // Genera aviso según fecha/hora y disponibilidad
    // -------------------------------------------------------
    private function generar_aviso($e)
    {
        $ahora = new DateTime();
        $evento = new DateTime("{$e['fecha']} {$e['hora']}");

        if ($evento < $ahora) {
            return 'Este espectáculo ya ha pasado.';
        }

        $diff = $ahora->diff($evento);
        $horas = $diff->days * 24 + $diff->h;

        if ($horas <= 48 && $e['disponibles'] > 0) {
            return '¡Queda poco tiempo!';
        } else {
            return 'Todavía falta tiempo.';
        }
    }

    // -------------------------------------------------------
    // Listado principal
    // -------------------------------------------------------
    public function index()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) {
            $e['detalles_habilitados'] = ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0);
            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = [
            'titulo' => "Cartelera de Espectáculos",
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('principal/footer_principal', $data);
    }

    // -------------------------------------------------------
    // Listado de espectáculos para usuarios
    // -------------------------------------------------------
    public function usuario_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) {
            $e['detalles_habilitados'] = ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0);
            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = [
            'titulo' => "Cartelera de Espectáculos",
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('usuario_espectaculos/header_usuario_espectaculos', $data);
        $this->load->view('usuario_espectaculos/body_usuario_espectaculos', $data);
        $this->load->view('usuario_espectaculos/footer_usuario_espectaculos', $data);
    }

    // -------------------------------------------------------
    // Listado administrador
    // -------------------------------------------------------
    public function administrador_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e) {
            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = [
            'titulo' => 'Cartelera de Espectáculos',
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('administrador_espectaculos/header_administrador_espectaculos', $data);
        $this->load->view('administrador_espectaculos/body_administrador_espectaculos', $data);
        $this->load->view('administrador_espectaculos/footer_administrador_espectaculos', $data);
    }

    // -------------------------------------------------------
    // Ver espectáculo sin loguear
    // -------------------------------------------------------
    public function espectaculo_sin_loguear($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) show_404();

        $data = [
            'titulo' => 'Ver espectáculo',
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('espectaculo_sin_loguear/header_espectaculo_sin_loguear', $data);
        $this->load->view('espectaculo_sin_loguear/body_espectaculo_sin_loguear', $data);
        $this->load->view('espectaculo_sin_loguear/footer_espectaculo_sin_loguear', $data);
    }

    // -------------------------------------------------------
    // Ver espectáculo logueado
    // -------------------------------------------------------
    public function espectaculo_logueado($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) show_404();

        $data = [
            'titulo' => 'Ver espectáculo',
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('espectaculo_logueado/header_espectaculo_logueado', $data);
        $this->load->view('espectaculo_logueado/body_espectaculo_logueado', $data);
        $this->load->view('espectaculo_logueado/footer_espectaculo_logueado', $data);
    }

     // -------------------------------------------------------
    // Reglas de validación
    // -------------------------------------------------------
    private function reglas_formulario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|integer');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
    }

    // -------------------------------------------------------
    // Subir imagen (ARREGLADO)
    // -------------------------------------------------------
    private function subir_imagen()
    {
        if (empty($_FILES['imagen']['name'])) {
            return null;
        }

        // Ruta absoluta REAL
        $ruta = FCPATH . 'activos/imagenes/espectaculos/';

        if (!is_dir($ruta)) {
            mkdir($ruta, 0777, true);
        }

        if (!is_writable($ruta)) {
            $this->session->set_flashdata(
                'error_imagen',
                'La carpeta activos/imagenes/espectaculos no tiene permisos de escritura.'
            );
            return null;
        }

        // Configuración CORRECTA
        $config = [
            'upload_path'      => $ruta,
            'allowed_types'    => 'jpg|jpeg|png|webp|gif|bmp|jfif',
            'max_size'         => 5120, // 5MB
            'encrypt_name'     => true,
            'file_ext_tolower' => true,
            'detect_mime'      => true
        ];

        // Cargar / reinicializar upload
        $this->load->library('upload');
        $this->upload->initialize($config, true);

        if (!$this->upload->do_upload('imagen')) {
            $this->session->set_flashdata(
                'error_imagen',
                strip_tags($this->upload->display_errors())
            );
            return null;
        }

        $data = $this->upload->data();

        // Verificación REAL de imagen
        if (!$data['is_image']) {
            unlink($data['full_path']);
            $this->session->set_flashdata(
                'error_imagen',
                'El archivo subido no es una imagen válida.'
            );
            return null;
        }

        // Normalizar jfif → jpg
        if ($data['file_ext'] === '.jfif') {
            $nuevo_nombre = str_replace('.jfif', '.jpg', $data['file_name']);
            rename($data['full_path'], $data['file_path'] . $nuevo_nombre);
            return 'activos/imagenes/espectaculos/' . $nuevo_nombre;
        }

        return 'activos/imagenes/espectaculos/' . $data['file_name'];
    }

    // -------------------------------------------------------
    // Crear espectáculo
    // -------------------------------------------------------
    public function crear_espectaculo()
    {
        $data = [
            'titulo' => 'Crear espectáculo',
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        if ($this->input->method() === 'post') {
            $this->reglas_formulario();

            if ($this->form_validation->run()) {

                $imagen = $this->subir_imagen();
                if (!$imagen) {
                    $imagen = 'activos/imagenes/espectaculos/default.jpg';
                }

                $nuevo = [
                    'nombre'       => $this->input->post('nombre', true),
                    'descripcion'  => $this->input->post('descripcion', true),
                    'fecha'        => $this->input->post('fecha', true),
                    'hora'         => $this->input->post('hora', true),
                    'precio'       => $this->input->post('precio', true),
                    'disponibles'  => $this->input->post('disponibles', true),
                    'direccion'    => $this->input->post('direccion', true),
                    'imagen'       => $imagen
                ];

                $this->Espectaculo_modelo->agregar_espectaculo($nuevo);
                $this->session->set_flashdata('success', 'El espectáculo fue creado exitosamente.');
                redirect('administrador');
            }
        }

        $this->load->view('crear_espectaculo/header_crear_espectaculo', $data);
        $this->load->view('crear_espectaculo/body_crear_espectaculo', $data);
        $this->load->view('crear_espectaculo/footer_crear_espectaculo', $data);
    }

    // -------------------------------------------------------
    // Editar espectáculo
    // -------------------------------------------------------
    public function editar_espectaculo($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        if (!$espectaculo) show_404();

        $data = [
            'titulo'      => 'Editar espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        if ($this->input->method() === 'post') {
            $this->reglas_formulario();

            if ($this->form_validation->run()) {

                $actualizado = [
                    'nombre'      => $this->input->post('nombre', true),
                    'descripcion' => $this->input->post('descripcion', true),
                    'fecha'       => $this->input->post('fecha', true),
                    'hora'        => $this->input->post('hora', true),
                    'precio'      => $this->input->post('precio', true),
                    'disponibles' => $this->input->post('disponibles', true),
                    'direccion'   => $this->input->post('direccion', true)
                ];

                if (!empty($_FILES['imagen']['name'])) {
                    $imagen = $this->subir_imagen();

                    if ($imagen) {
                        if (!empty($espectaculo['imagen']) &&
                            $espectaculo['imagen'] !== 'activos/imagenes/espectaculos/default.jpg') {

                            $ruta_anterior = FCPATH . $espectaculo['imagen'];
                            if (file_exists($ruta_anterior)) {
                                unlink($ruta_anterior);
                            }
                        }
                        $actualizado['imagen'] = $imagen;
                    }
                }

                $this->Espectaculo_modelo->actualizar_espectaculo($id, $actualizado);
                $this->session->set_flashdata('success', 'El espectáculo fue editado exitosamente.');
                redirect('administrador/administrador_espectaculos');
            }
        }

        $this->load->view('editar_espectaculo/header_editar', $data);
        $this->load->view('editar_espectaculo/body_editar', $data);
        $this->load->view('editar_espectaculo/footer_editar', $data);
    }

    // -------------------------------------------------------
    // Eliminar espectáculo
    // -------------------------------------------------------
    public function eliminar_espectaculo($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        if (!$espectaculo) show_404();

        if (!empty($espectaculo['imagen']) &&
            $espectaculo['imagen'] !== 'activos/imagenes/espectaculos/default.jpg') {

            $ruta_imagen = FCPATH . $espectaculo['imagen'];
            if (file_exists($ruta_imagen)) {
                unlink($ruta_imagen);
            }
        }

        $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);
        $this->session->set_flashdata('success', 'El espectáculo fue eliminado correctamente.');
        redirect('administrador/administrador_espectaculos');
    }
}

?>
