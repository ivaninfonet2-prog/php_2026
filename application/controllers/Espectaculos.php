<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    private $ruta_imagenes;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Espectaculo_modelo');
        $this->load->library(['form_validation', 'upload', 'session']);
        $this->load->helper(['url', 'form']);

        // Ruta física real
        $this->ruta_imagenes = FCPATH . 'activos/imagenes/';
    }

    /* =========================
       AVISOS
    ========================= */

    private function generar_aviso($e)
    {
        $ahora  = new DateTime();
        
        $evento = new DateTime($e['fecha'] . ' ' . $e['hora']);

        if ($evento < $ahora)
        {
            return 'Este espectáculo ya ha pasado.';
        }

        $horas_restantes = ($evento->getTimestamp() - $ahora->getTimestamp()) / 3600;

        if ($horas_restantes <= 48 && $e['disponibles'] > 0)
        {
            return '¡Queda poco tiempo!';
        }

        return 'Todavía falta tiempo.';
    }

    /* =========================
       LISTADO PRINCIPAL
    ========================= */

    public function index()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e)
        {
            $evento = new DateTime($e['fecha'].' '.$e['hora']);

            $ahora  = new DateTime();

            $e['detalles_habilitados'] = ($evento > $ahora && $e['disponibles'] > 0);

            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo'       => 'Cartelera de Espectaculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('footer_footer/footer_footer_principal', $data);
    }

    /* =========================
       LISTADO USUARIO
    ========================= */

    public function usuario_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e)
        {
            $evento = new DateTime($e['fecha'].' '.$e['hora']);

            $ahora  = new DateTime();

            $e['detalles_habilitados'] = ($evento > $ahora && $e['disponibles'] > 0);

            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo'       => 'Cartelera de Espectaculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_espectaculos/body_usuario_espectaculos', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    /* =========================
       LISTADO ADMIN
    ========================= */

    public function administrador_espectaculos()
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        foreach ($espectaculos as &$e)
        {
            $e['aviso'] = $this->generar_aviso($e);
        }

        $data = 
        [
            'titulo'       => 'Cartelera de Espectaculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('administrador_espectaculos/body_administrador_espectaculos', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    /* =========================
       VER ESPECTÁCULO
    ========================= */

    public function espectaculo_sin_loguear($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( !$espectaculo) show_404();

        $data = 
        [
            'titulo'      => 'Espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('header_footer/header_footer_principal', $data);
        $this->load->view('espectaculo_sin_loguear/body_espectaculo_sin_loguear', $data);
        $this->load->view('footer_footer/footer_footer_principal', $data);
    }

    public function espectaculo_logueado($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( !$espectaculo) show_404();

        $data = 
        [
            'titulo'      => 'Espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('espectaculo_logueado/body_espectaculo_logueado', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    /* =========================
       FORMULARIOS
    ========================= */

    private function reglas_formulario()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required|trim');
        $this->form_validation->set_rules('fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('hora', 'Hora', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('disponibles', 'Disponibles', 'required|is_natural');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required|trim');
    }

    private function datos_formulario()
    {
        return 
        [
            'nombre'      => $this->input->post('nombre', true),
            'descripcion' => $this->input->post('descripcion', true),
            'fecha'       => $this->input->post('fecha', true),
            'hora'        => $this->input->post('hora', true),
            'precio'      => $this->input->post('precio', true),
            'disponibles' => $this->input->post('disponibles', true),
            'direccion'   => $this->input->post('direccion', true)
        ];
    }

    /* =========================
       SUBIR IMAGEN
    ========================= */

    private function subir_imagen()
    {
        if (empty($_FILES['imagen']['name']))
        {
            return null;
        }    
            
        if ( !is_dir($this->ruta_imagenes))
        {
            mkdir($this->ruta_imagenes, 0755, true);
        }

        $config = 
        [
            'upload_path'      => $this->ruta_imagenes,
            'allowed_types'    => 'jpg|jpeg|png|gif|webp|jfif',
            'max_size'         => 5120,
            'encrypt_name'     => true,
            'file_ext_tolower' => true
        ];

        $this->upload->initialize($config);

        if ( !$this->upload->do_upload('imagen'))
        {
            $this->session->set_flashdata(
                'error_imagen',
                strip_tags($this->upload->display_errors())
            );

            return null;
        }

        $data = $this->upload->data();

        if (!@getimagesize($data['full_path']))
        {
            unlink($data['full_path']);

            return null;
        }

        if ($data['file_ext'] === '.jfif')
        {
            $nuevo = $data['raw_name'] . '.jpg';

            rename($data['full_path'], $this->ruta_imagenes . $nuevo);

            return $nuevo;
        }

        return $data['file_name'];
    }

    /* =========================
       CRUD
    ========================= */

    public function crear_espectaculo()
    {
        $data = 
        [
            'titulo' => 'Crear espectáculo',
            'fondo'  => base_url('activos/imagenes/mi_fondo.jpg')
        ];

        if ($this->input->method() === 'post')
        {
            $this->reglas_formulario();

            if ($this->form_validation->run())
            {
                $nuevo = $this->datos_formulario();

                $imagen = $this->subir_imagen();
               
                $nuevo['imagen'] = $imagen ?: 'default.jpg';

                $this->Espectaculo_modelo->agregar_espectaculo($nuevo);

                $this->session->set_flashdata('success', 'Espectáculo creado.');

                redirect('espectaculos/administrador_espectaculos');
            }
        }

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('crear_espectaculo/body_crear_espectaculo', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    public function editar_espectaculo($id)
    {
        $e = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( !$e) 
        {
            show_404();
        }    
            
        $data = 
        [
            'titulo'      => 'Editar espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $e
        ];

        if ($this->input->method() === 'post')
        {
            $this->reglas_formulario();

            if ($this->form_validation->run())
            {
                $actualizado = $this->datos_formulario();

                if ( !empty($_FILES['imagen']['name']))
                {
                    $img = $this->subir_imagen();

                    if ($img)
                    {
                        if ($e['imagen'] !== 'default.jpg')
                        {
                            @unlink($this->ruta_imagenes . $e['imagen']);
                        }
                        $actualizado['imagen'] = $img;
                    }
                }

                $this->Espectaculo_modelo->actualizar_espectaculo($id, $actualizado);

                $this->session->set_flashdata('success', 'Espectáculo actualizado.');

                redirect('espectaculos/administrador_espectaculos');
            }
        }

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('editar_espectaculo/body_editar_espectaculo', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    public function eliminar_espectaculo($id)
    {
        $e = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( !$e)
        {
             show_404();
        }    
           

        if ($e['imagen'] !== 'default.jpg')
        {
            @unlink($this->ruta_imagenes . $e['imagen']);
        }

        $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);

        $this->session->set_flashdata('success', 'Espectáculo eliminado.');

        redirect('espectaculos/administrador_espectaculos');
    }
}
