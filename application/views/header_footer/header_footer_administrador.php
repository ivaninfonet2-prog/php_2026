<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/header_footer/header_footer_usuario.css'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS para el Modal de Cerrar Sesión -->
    <link rel="stylesheet" href="<?= base_url('activos/css/cerrar_sesion/aviso_cerrar_sesion.css'); ?>">
</head>

<body>

<header class="main-header">
    <div class="header-container">
        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Menú de navegación -->
        <nav class="nav-menu">
            <a href="<?= base_url('administrador'); ?>" class="btn btn-login">Volver al Administrador</a>
            <!-- Botón que abrirá el modal -->
            <button type="button" class="btn btn-cerrar" data-bs-toggle="modal" data-bs-target="#confirmModal">
                Cerrar Sesión
            </button>
        </nav>
    </div>
</header>

<!-- Modal de Confirmación de Cierre de Sesión -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar Cierre de Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cerrar sesión? Esta acción te desconectará de la plataforma.
            </div>
            <div class="modal-footer">
                <!-- Botón para cancelar -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Botón para cerrar sesión -->
                <a href="<?= base_url('login/logout'); ?>" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
