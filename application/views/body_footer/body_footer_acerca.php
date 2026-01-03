<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/body_footer_acerca.css'); ?>">
</head>

<body class="background-image" style="background-image: url('<?= $fondo; ?>');">
    
    <!-- Sección de introducción -->
    <section class="intro-text">
        <h1>Bienvenido a nuestra plataforma</h1>
        <p>Un espacio pensado para estudiantes</p>
    </section>

    <!-- Sección principal de contenido -->
    <main class="main-content">
        <div class="cuadro-acerca">
            <h2 class="animated-title"><?= $titulo; ?></h2>

            <p class="animated-text">
                Te ofrecemos productos y actividades diseñadas para acompañarte en tu vida universitaria.
            </p>

            <p class="extra-info">
                Explora nuestras secciones y descubre beneficios, eventos y contenido exclusivo para nuestra comunidad.
            </p>
        </div>
    </main>

    <!-- Texto mínimo fuera de la tarjeta -->
    <div class="small-info-container">
        <p class="small-info">
            © 2026 Plataforma Universitaria. Todos los derechos reservados.
        </p>
    </div>

</body>
</html>
