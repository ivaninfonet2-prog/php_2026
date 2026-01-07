<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS para el Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario/header_usuario.css'); ?>">

    <!-- CSS para la confirmación de Cerrar Sesión -->
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/cerrar_sesion.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Header con Logo y Botones -->
<header class="main-header">
    <div class="header-container">

        <!-- Logo + título con evento para abrir el modal -->
        <a href="#" class="brand" title="Ir a inicio" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Menú de navegación -->
        <nav class="nav-menu">
            <!-- Botón para abrir el modal de confirmación -->
            <button type="button" class="btn btn-cerrar" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Cerrar Sesión
            </button>
        </nav>

    </div>
</header>

<!-- Modal de Confirmación de Cerrar Sesión -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">¿Cerrar sesión?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cerrar tu sesión actual?
            </div>
            <div class="modal-footer">
                <a href="<?= site_url('login/logout'); ?>" class="btn btn-danger">Sí, cerrar sesión</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Protección contra volver con la flecha -->
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    window.onpageshow = function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    };
</script>

</body>
</html>
