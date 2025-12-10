<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/header/header_registrar.css'); ?>">
</head>

<body>

<header class="main-header">

    <div class="header-container">

        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" class="logo-img" alt="Logo">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Botones a la derecha -->
        <nav class="nav-menu">
            <a href="<?= base_url('registrar'); ?>" class="btn btn-login">Registrar</a>
            <a href="<?= base_url(''); ?>" class="btn btn-register">Volver al Inicio</a>
        </nav>

    </div>

</header>
