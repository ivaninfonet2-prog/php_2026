<?php
// ================================================================
// INDEX.PHP LIMPIO PARA CODEIGNITER
// ================================================================

// Define el entorno de la aplicación
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

// Configuración de errores según el entorno
switch (ENVIRONMENT)
{
    case 'development':
        // Muestra todos los errores (ideal para desarrollo)
        error_reporting(E_ALL);  // Muestra todos los errores
        ini_set('display_errors', 1);  // Activa la visualización de errores
        break;

    case 'testing':
    case 'production':
        // No muestra errores (ideal para producción)
        ini_set('display_errors', 0);  // Desactiva la visualización de errores
        if (version_compare(PHP_VERSION, '5.3', '>='))
        {
            // Solo muestra errores importantes en producción/testing
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        }
        else
        {
            // Para PHP 5.2 o inferior, solo se muestran errores importantes
            error_reporting(E_ALL & ~E_NOTICE);
        }
        break;

    default:
        // Si el entorno no es válido, muestra un error 503
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

// ---------------------------------------------------------------
// Rutas principales
// ---------------------------------------------------------------
$system_path = 'system';
$application_folder = 'application';
$view_folder = '';

// Ajuste de directorio actual para CLI
if (defined('STDIN'))
{
    chdir(dirname(__FILE__));
}

// Resolución de ruta del sistema
if (($_temp = realpath($system_path)) !== FALSE)
{
    $system_path = $_temp . DIRECTORY_SEPARATOR;
}
else
{
    $system_path = strtr(
        rtrim($system_path, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    ) . DIRECTORY_SEPARATOR;
}

// Verificar que el sistema existe
if (!is_dir($system_path))
{
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: ' . pathinfo(__FILE__, PATHINFO_BASENAME);
    exit(3); // EXIT_CONFIG
}

// Definiciones de constantes
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

// Ruta de la aplicación
if (is_dir($application_folder))
{
    if (($_temp = realpath($application_folder)) !== FALSE)
    {
        $application_folder = $_temp;
    }
    else
    {
        $application_folder = strtr(
            rtrim($application_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
}
elseif (is_dir(BASEPATH . $application_folder . DIRECTORY_SEPARATOR))
{
    $application_folder = BASEPATH . strtr(
        trim($application_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
}
else
{
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);

// Ruta de las vistas
if (!isset($view_folder[0]) && is_dir(APPPATH . 'views' . DIRECTORY_SEPARATOR))
{
    $view_folder = APPPATH . 'views';
}
elseif (is_dir($view_folder))
{
    if (($_temp = realpath($view_folder)) !== FALSE)
    {
        $view_folder = $_temp;
    }
    else
    {
        $view_folder = strtr(
            rtrim($view_folder, '/\\'),
            '/\\',
            DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
        );
    }
}
elseif (is_dir(APPPATH . $view_folder . DIRECTORY_SEPARATOR))
{
    $view_folder = APPPATH . strtr(
        trim($view_folder, '/\\'),
        '/\\',
        DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR
    );
}
else
{
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: ' . SELF;
    exit(3); // EXIT_CONFIG
}

define('VIEWPATH', $view_folder . DIRECTORY_SEPARATOR);

// ---------------------------------------------------------------
// Carga del núcleo de CodeIgniter
// ---------------------------------------------------------------
require_once BASEPATH . 'core/CodeIgniter.php';
