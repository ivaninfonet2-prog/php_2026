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

    // Genera aviso según fecha/hora y disponibilidad
    private function generar_aviso($e)
    {
        $ahora = new DateTime();
       
        $evento = new DateTime("{$e['fecha']} {$e['hora']}");

        if ($evento < $ahora) 
        {
            return 'Este espectáculo ya ha pasado.';
        }

        $diff = $ahora->diff($evento);
      
        $horas = $diff->days * 24 + $diff->h;

        if ($horas <= 48 && $e['disponibles'] > 0)
        {
            return '¡Queda poco tiempo!';
        } 
        else
        {
            return 'Todavía falta tiempo.';
        }
    }

    // Mostrar lista de espectáculos según tipo de vista
    private function mostrar_lista_espectaculos($tipo)
    {
        $espectaculos = $this->Espectaculo_modelo->obtener_espectaculos();

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

        $data = 
        [
            'titulo' => "Cartelera de Espectáculos",
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculos' => $espectaculos
        ];

        $vistas = 
        [
            'usuario' => 
            [
                'header' => 'usuario_espectaculos/usuario_espectaculos_header',
                'body'   => 'usuario_espectaculos/usuario_espectaculos_body',
                'footer' => 'usuario_espectaculos/usuario_espectaculos_footer'
            ],
            'administrador' =>
             [
                'header' => 'administrador_espectaculos/header_administrador_espectaculos',
                'body'   => 'administrador_espectaculos/body_administrador_espectaculos',
                'footer' => 'administrador_espectaculos/footer_administrador_espectaculos'
            ],
            'principal' => 
            [
                'header' => 'principal/header_principal',
                'body'   => 'principal/body_principal',
                'footer' => 'principal/footer_principal'
            ]
        ];

        if (!isset($vistas[$tipo])) 
        {
            show_error("Tipo de vista no válido: $tipo");
        }

        $this->load->view($vistas[$tipo]['header'], $data);
        $this->load->view($vistas[$tipo]['body'], $data);
        $this->load->view($vistas[$tipo]['footer'], $data);
    }

    // FUNCIONES PÚBLICAS PARA MOSTRAR LISTAS
    public function index()
    {
        $this->mostrar_lista_espectaculos('principal');
    }

    public function mostrar_lista_espectaculos_usuario()
    {
        $this->mostrar_lista_espectaculos('usuario');
    }

    public function mostrar_lista_espectaculos_administrador()
    {
        $this->mostrar_lista_espectaculos('administrador');
    }

    // FUNCIONES PARA VER ESPECTÁCULO
    private function cargar_vista_espectaculo($id, $tipo)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        
        if ( ! $espectaculo) 
        {
            show_404();
        }

        $data = 
        [
            'titulo' => 'Ver espectáculo',
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        $vistas = 
        [
            'sin_loguear' => 
            [
                'header' => 'ver_espectaculo_sin_loguear/header_ver_espectaculo_sin_loguear',
                'body'   => 'ver_espectaculo_sin_loguear/body_ver_espectaculo_sin_loguear',
                'footer' => 'ver_espectaculo_sin_loguear/footer_ver_espectaculo_sin_loguear'
            ],
            'logueado' => 
            [
                'header' => 'ver_espectaculo_logueado/header_ver_espectaculo_logueado',
                'body'   => 'ver_espectaculo_logueado/body_ver_espectaculo_logueado',
                'footer' => 'ver_espectaculo_logueado/footer_ver_espectaculo_logueado'
            ]
        ];

        if ( ! isset($vistas[$tipo])) 
        {
            show_error("Tipo de vista no válido: $tipo");
        }

        $this->load->view($vistas[$tipo]['header'], $data);
        $this->load->view($vistas[$tipo]['body'], $data);
        $this->load->view($vistas[$tipo]['footer'], $data);
    }

    public function ver_espectaculo_sin_loguear($id)
    {
        $this->cargar_vista_espectaculo($id, 'sin_loguear');
    }

    public function ver_espectaculo_logueado($id)
    {
        $this->cargar_vista_espectaculo($id, 'logueado');
    }

    // REGLAS DE VALIDACIÓN
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

    // SUBIR IMAGEN
    private function subir_imagen()
    {
        $config = 
        [
            'upload_path'   => './activos/imagenes/',
            'allowed_types' => '*',
            'encrypt_name'  => TRUE
        ];

        $this->upload->initialize($config);

        if ($this->upload->do_upload('imagen')) 
        {
            return $this->upload->data('file_name');
        }
         else 
        {
            return null;
        }
    }

    // CARGAR VISTA GENERAL
    private function cargar_vista($carpeta, $data)
    {
        if ($carpeta === 'editar_espectaculo') 
        {
            $this->load->view("$carpeta/header_editar", $data);
            $this->load->view("$carpeta/body_editar", $data);
            $this->load->view("$carpeta/footer_editar", $data);
        }
        else 
        {
            $this->load->view("$carpeta/header_$carpeta", $data);
            $this->load->view("$carpeta/body_$carpeta", $data);
            $this->load->view("$carpeta/footer_$carpeta", $data);
        }
    }

    // CREAR ESPECTÁCULO
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
                $imagen = $this->subir_imagen();

                $nuevo = 
                [
                    'nombre'      => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha'       => $this->input->post('fecha'),
                    'hora'        => $this->input->post('hora'),
                    'precio'      => $this->input->post('precio'),
                    'disponibles' => $this->input->post('disponibles'),
                    'direccion'   => $this->input->post('direccion'),
                    'imagen'      => $imagen
                ];

                $this->Espectaculo_modelo->agregar_espectaculo($nuevo);
                
                $this->session->set_flashdata('success', 'El espectáculo fue creado exitosamente.');
                
                redirect('administrador');
            }
        }

        $this->cargar_vista('crear_espectaculo', $data);
    }

    // EDITAR ESPECTÁCULO
    public function editar_espectaculo($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);
        if ( ! $espectaculo) 
        {
            show_404();
        }

        $data = 
        [
            'titulo' => 'Editar espectáculo',
            'fondo' => base_url('activos/imagenes/mi_fondo.jpg'),
            'espectaculo' => $espectaculo
        ];

        if ($this->input->method() === 'post')
        {
            $this->reglas_formulario();

            if ($this->form_validation->run()) 
            {
                $nueva_imagen = $this->subir_imagen();
            
                $imagen_final = $nueva_imagen ?? $espectaculo['imagen'];

                if ($nueva_imagen && $espectaculo['imagen'] && file_exists('./activos/imagenes/' . $espectaculo['imagen'])) 
                {
                    unlink('./activos/imagenes/' . $espectaculo['imagen']);
                }

                $actualizado = 
                [
                    'nombre'      => $this->input->post('nombre'),
                    'descripcion' => $this->input->post('descripcion'),
                    'fecha'       => $this->input->post('fecha'),
                    'hora'        => $this->input->post('hora'),
                    'precio'      => $this->input->post('precio'),
                    'disponibles' => $this->input->post('disponibles'),
                    'direccion'   => $this->input->post('direccion'),
                    'imagen'      => $imagen_final
                ];

                $this->Espectaculo_modelo->actualizar_espectaculo($id, $actualizado);
                
                $this->session->set_flashdata('success', 'El espectáculo fue editado exitosamente.');
                
                redirect('administrador/administrador_espectaculos');
            }
        }

        $this->cargar_vista('editar_espectaculo', $data);
    }

    // ELIMINAR ESPECTÁCULO
    public function eliminar_espectaculo($id)
    {
        $espectaculo = $this->Espectaculo_modelo->obtener_espectaculo_por_id($id);

        if (!$espectaculo) 
        {
            redirect('administrador');
        }

        if ($espectaculo['imagen'] && file_exists('./activos/imagenes/' . $espectaculo['imagen']))
        {
            unlink('./activos/imagenes/' . $espectaculo['imagen']);
        }

        $this->Espectaculo_modelo->eliminar_espectaculo_completo($id);
        
        $this->session->set_flashdata('success', 'El espectáculo fue eliminado exitosamente.');
        
        redirect('administrador');
    }
}
?>
