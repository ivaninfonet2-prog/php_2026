<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/contacto_principal/header_contacto_principal.css'); ?>">
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
                    <li class="nav-item">
                        <a class="btn btn-home" href="<?= base_url(); ?>">Volver al inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
