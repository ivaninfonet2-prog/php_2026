<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador_usuarios/header_administrador_usuarios.css'); ?>">
</head>

<body class="d-flex flex-column min-vh-100">

<header class="main-header">
    <nav class="navbar shadow-sm">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <!-- LOGO = LOGOUT FORZADO -->
            <a class="navbar-brand d-flex align-items-center"
               href="<?= site_url('login/logout'); ?>"
               title="Cerrar sesión">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                     alt="Logo UNLa"
                     class="logo-img me-2">
                <span class="site-title">UNLa Tienda</span>
            </a>

            <!-- Botón Cerrar Sesión -->
            <a class="btn btn-outline-dark"
               href="<?= site_url('administrador/cerrar_sesion_administrador'); ?>">
                Cerrar Sesión
            </a>

        </div>
    </nav>
</header>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
