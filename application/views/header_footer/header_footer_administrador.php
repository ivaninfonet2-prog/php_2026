<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/header_footer/header_footer_administrador.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container d-flex justify-content-between align-items-center">
        <!-- Logo + título (LOGOUT FORZADO) -->
        <a href="<?= site_url('login/logout'); ?>" class="brand d-flex align-items-center text-decoration-none" title="Cerrar sesión">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img me-2" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Menú de navegación -->
        <nav class="nav-menu d-flex gap-2">
            <a href="<?= site_url('administrador'); ?>" class="btn btn-success">
                Ir al Administrador
            </a>
            <a href="<?= site_url('confirmacion/cerrar_sesion_administrador'); ?>" class="btn btn-danger">
                Cerrar Sesión
            </a>
        </nav>
    </div>
</header>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Prevención de retroceso y logout forzado -->
<script>
    // Reemplaza el historial para prevenir volver a páginas privadas
    if (window.history.replaceState) 
    {
        window.history.replaceState(null, null, window.location.href);
    }

    window.onpageshow = function(event) 
    {
        // Si se usa cache o no hay sesión activa, redirige al login
        if (event.persisted || !<?= json_encode($this->session->userdata('logged_in')); ?>) 
        {
            window.location.replace('<?= site_url("login"); ?>');
        }
    };
</script>

</body>
</html>
