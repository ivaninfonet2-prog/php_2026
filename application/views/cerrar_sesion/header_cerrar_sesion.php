<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/cerrar_sesion/header_cerrar_sesion.css'); ?>">
</head>

<body>

<header class="main-header">
    <div class="header-container">

        <!-- Marca -->
        <a href="<?= base_url(); ?>" class="brand">
            <img src="<?= base_url('activos/imagenes/logo.jpg'); ?>" alt="Logo UNLa" class="logo-img">
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Acción -->
        <a href="<?= base_url(); ?>" class="btn-volver">
            Volver al inicio
        </a>

    </div>
</header>

</body>
</html>
