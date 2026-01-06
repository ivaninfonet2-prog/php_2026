<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/body_footer_contacto.css'); ?>">
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
        </div>
    </main>

    <!-- Texto mínimo fuera de la tarjeta -->
    <div class="small-info-container">
        <p class="small-info">
            © 2026 Plataforma Universitaria. Todos los derechos reservados.
        </p>
    </div>

    <!-- Texto adicional fuera de la tarjeta -->
    <div class="texto-adicional">
        <p>Si tienes alguna consulta o inquietud adicional, no dudes en ponerte en contacto con nosotros. ¡Estamos aquí para ayudarte!</p>
    </div>
</body>
</html>
