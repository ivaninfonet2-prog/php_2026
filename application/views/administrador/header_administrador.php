<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS Header -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador/header_administrador.css'); ?>">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- LOGO = LOGOUT FORZADO -->
        <a href="<?= site_url('login/logout'); ?>"
           class="brand"
           title="Cerrar sesión">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo UNLa">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Confirmación -->
        <nav class="nav-menu">
            <a href="<?= site_url('confirmacion/cerrar_sesion_administrador'); ?>"
               class="btn btn-cerrar">
                Cerrar Sesión
            </a>
        </nav>

    </div>
</header>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
