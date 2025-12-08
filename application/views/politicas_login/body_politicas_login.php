<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
<<<<<<< HEAD
    <link rel="stylesheet" href="<?= base_url('activos/css/politicas_principal/body_politicas_principal.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Texto fuera de la tarjeta -->
    <section class="intro-text">
        <h1>Nuestras Políticas</h1>
        <p>Conoce las normas y condiciones para el uso seguro y responsable de nuestra plataforma.</p>
    </section>

    <main class="main-content">
        <div class="cuadro-politicas text-center text-white">
            
            <h2 class="animated-title">Políticas</h2>

            <p class="animated-text">
                Aquí encontrarás nuestras políticas de privacidad, uso y condiciones de servicio.
            </p>

            <p class="extra-info">
                Nuestro objetivo es garantizar transparencia y seguridad para todos los usuarios.
            </p>

=======
    <link rel="stylesheet" href="<?= base_url('activos/css/politicas_login/body_politicas_login.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-politicas text-center text-white">
            <h2 class="animated-title">Políticas</h2>
            <p class="animated-text">
                En esta sección encontrarás nuestras políticas de uso, privacidad y condiciones de servicio.
            </p>
            
            <a href="<?= base_url('principio'); ?>" class="btn btn-warning mt-3 animated-btn">
                Volver al Principio
            </a>

               <!-- Botón volver colocado más arriba -->
            <div class="volver-inicio text-center mt-4">
                <a href="<?php echo site_url('login'); ?>" class="btn btn-secondary">Volver al Login</a>
            </div>
 
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
        </div>
    </main>

</body>
</html>
