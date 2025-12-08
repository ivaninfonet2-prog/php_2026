<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
<<<<<<< HEAD
    <link rel="stylesheet" href="<?= base_url('activos/css/acerca_login/header_acerca_login.css'); ?>">
=======
    <link rel="stylesheet" href="<?= base_url('activos/css/acerca_principal/header_acerca.css'); ?>">
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
</head>
<body class="d-flex flex-column min-vh-100">
<header class="main-header">
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="<?= base_url(); ?>">
                <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" class="logo-img me-2">
                <span class="site-title">UNLa Tienda</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto nav-menu">
<<<<<<< HEAD
                    <li class="nav-item me-3">
                        <a class="btn btn-home" href="<?= base_url(); ?>">Volver al inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-home" href="<?= base_url('login'); ?>">Volver al Login</a>
=======
                    <li class="nav-item">
                        <a class="btn btn-home" href="<?= base_url(); ?>">Volver al inicio</a>
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<<<<<<< HEAD
</body>
</html>
=======
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
