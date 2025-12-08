<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/ayuda_principal/body_ayuda_principal.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Texto fuera de la tarjeta -->
    <section class="intro-text">
        <h1>¿Necesitas asistencia?</h1>
        <p>Estamos aquí para ayudarte a utilizar nuestra plataforma de manera sencilla y efectiva.</p>
    </section>

    <main class="main-content">
        <div class="cuadro-ayuda text-center text-white">
            
            <h2 class="animated-title">Ayuda</h2>

            <p class="animated-text">
                En esta sección encontrarás información y soporte para aprovechar al máximo UNLa Tienda.
            </p>

            <p class="extra-info">
                Guías rápidas, preguntas frecuentes y contacto con nuestro equipo de soporte.
            </p>

        </div>
    </main>

</body>
</html>
