<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Espectaculos extends CI_Controller
{
    private $ruta_imagenes;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Espectaculo_modelo');
        $this->load->library(['form_validation', 'upload']);
        $this->load->helper(['url', 'form']);

        // RUTA FÍSICA REAL
        $this->ruta_imagenes = FCPATH . 'activos/imagenes/';
    }

    // AVISOS
    
    private function generar_aviso($e)
    {
        // Fecha y hora actuales
        $ahora = new DateTime();

        // Fecha y hora del espectáculo
        $evento = new DateTime($e['fecha'] . ' ' . $e['hora']);

        // 1) Si el evento ya pasó
        if ($evento < $ahora)
        {
            return 'Este espectáculo ya ha pasado.';
        }

        // 2) Calcular diferencia de tiempo
        $diferencia = $ahora->diff($evento);

        // Pasar todo a horas
        $horas_restantes = ($diferencia->days * 24) + $diferencia->h;

        // 3) Si queda poco tiempo y hay disponibles
        if ($horas_restantes <= 48 && $e['disponibles'] > 0)
        {
            return '¡Queda poco tiempo!';
        }
        else
        {
            return 'Todavía falta tiempo.';
        }
    }

    // LISTADO PRINCIPAL, espectaculos sin loguear
  
   public function index()
    {
        // 1) Obtener todos los espectáculos
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        // 2) Procesar cada espectáculo
        foreach ($espectaculos as &$e)
        {
            // Habilitar botón "ver detalles"
            $e['detalles_habilitados'] = ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0);

            // Generar aviso de estado
            $e['aviso'] = $this->generar_aviso($e);
        }

        // 3) Datos para la vista
        $data = [
            'titulo'       => 'Cartelera de Espectáculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        // 4) Cargar vistas SIN espacios ni líneas extra
        $this->load->view('principal/header_principal', $data);
        $this->load->view('principal/body_principal', $data);
        $this->load->view('footer_footer/footer_footer_principal', $data);
    }

    // LISTADO USUARIO
 
    public function usuario_espectaculos()
    {
        // 1) Obtener espectáculos
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

        // 2) Procesar cada uno
        foreach ($espectaculos as &$e)
        {
            if ($e['fecha'] >= date('Y-m-d') && $e['disponibles'] > 0)
            {
                $e['detalles_habilitados'] = true;
            }
            else
            {
                $e['detalles_habilitados'] = false;
            }

            $e['aviso'] = $this->generar_aviso($e);
        }

        // 3) Enviar datos a la vista
        $data = 
        [
            'titulo'       => 'Cartelera de Espectáculos',
            'fondo'        => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        // 4) Cargar vistas del usuario
        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('usuario_espectaculos/body_usuario_espectaculos', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    // LISTADO ADMINISTRADOR
    
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

    //   Espectaculo SIN LOGUEAR
    
    public function espectaculo_sin_loguear($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        
        if ( ! $espectaculo)
        {
            show_404();
        }

        $data = 
        [
            'titulo'      => 'Ver espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('header_footer/header_footer_principal', $data);
        $this->load->view('espectaculo_sin_loguear/body_espectaculo_sin_loguear', $data);
        $this->load->view('footer_footer/footer_footer_principal', $data);
    }

    // VER espectaculo LOGUEADO
  
    public function espectaculo_logueado($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
       
        if ( ! $espectaculo)
        {    
            show_404();
        }

        $data = 
        [
            'titulo'      => 'Ver espectáculo',
            'fondo'       => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $this->load->view('header_footer/header_footer_usuario', $data);
        $this->load->view('espectaculo_logueado/body_espectaculo_logueado', $data);
        $this->load->view('footer_footer/footer_footer_usuario', $data);
    }

    // funciones auxiliares privadas

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

    private function subir_imagen()
    {
        if (empty($_FILES['imagen']['name'])) 
        {
            return null;
        }

        if ( !is_dir($this->ruta_imagenes)) 
        {
            mkdir($this->ruta_imagenes, 0777, true);
        }

        if ( !is_writable($this->ruta_imagenes)) 
        {
            $this->session->set_flashdata(
                'error_imagen',
                'La carpeta activos/imagenes no tiene permisos de escritura.'
            );

            return null;
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
                'ERROR UPLOAD: ' . strip_tags($this->upload->display_errors())
            );
        
            return null;
        }

        $data = $this->upload->data();

        if ( !@getimagesize($data['full_path'])) 
        {
            unlink($data['full_path']);
            
            $this->session->set_flashdata(
                'error_imagen',
                'El archivo subido no es una imagen válida.'
            );

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

    // crear espectaculo
    
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

                // Subir imagen o usar default
                
                $imagen = $this->subir_imagen();

                if ($imagen !== null)
                {
                    $nuevo['imagen'] = $imagen;
                }
                else
                {
                    $nuevo['imagen'] = 'default.jpg';
                }

                $this->Espectaculo_modelo->agregar_espectaculo($nuevo);

                $this->session->set_flashdata('success', 'OK: espectáculo creado.');

                redirect('administrador');
            }
        }

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('crear_espectaculo/body_crear_espectaculo', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    // editar espectaculo

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
                            $vieja = $this->ruta_imagenes . $e['imagen'];
                        
                            if (file_exists($vieja)) 
                            {
                                unlink($vieja);
                            }
                        }

                        $actualizado['imagen'] = $img;
                    }
                }

                $this->Espectaculo_modelo->actualizar_espectaculo($id, $actualizado);

                $this->session->set_flashdata('success', 'OK: espectáculo actualizado.');
                
                redirect('administrador/administrador_espectaculos');
            }
        }

        $this->load->view('header_footer/header_footer_administrador', $data);
        $this->load->view('editar_espectaculo/body_editar_eespectaculo', $data);
        $this->load->view('footer_footer/footer_footer_administrador', $data);
    }

    public function eliminar_espectaculo($id)
    {
        $e = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if ( !$e) 
        {
            show_404();
        }

        if ( !empty($e['imagen']) && $e['imagen'] !== 'default.jpg') 
        {
            $ruta = $this->ruta_imagenes . $e['imagen'];
            
            if (file_exists($ruta)) 
            {
                unlink($ruta);
            }
        }

        $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);

        $this->session->set_flashdata('success', 'OK: espectáculo eliminado.');
        
        redirect('administrador/administrador_espectaculos');
    }
}


