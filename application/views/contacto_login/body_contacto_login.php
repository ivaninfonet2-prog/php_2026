<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
<<<<<<< HEAD
    <link rel="stylesheet" href="<?= base_url('activos/css/contacto_principal/body_contacto_principal.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Texto fuera de la tarjeta -->
    <section class="intro-text">
        <h1>¿Necesitas ayuda o información?</h1>
        <p>Estamos aquí para asistirte en todo lo relacionado con nuestros servicios universitarios.</p>
    </section>

    <main class="main-content">
        <div class="cuadro-contacto text-center text-white">
            
            <h2 class="animated-title">Contacto</h2>

            <p class="animated-text">
                Escríbenos a <strong>contacto@unla.edu.ar</strong> o llámanos al <strong>(011) 1234-5678</strong> para recibir atención personalizada.
            </p>

            <p class="extra-info">
                Nuestro equipo responde de lunes a viernes, de 9:00 a 18:00.
            </p>
            
=======
    <link rel="stylesheet" href="<?= base_url('activos/css/contacto_principal/body_contacto_login.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-contacto text-center text-white">
            <h2 class="animated-title">Contacto</h2>
            <p class="animated-text">
                Puedes escribirnos a <strong>contacto@unla.edu.ar</strong> o llamarnos al <strong>(011) 1234-5678</strong>.
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
