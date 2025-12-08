<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url('activos/css/acerca_login/body_acerca_login.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Texto fuera de la tarjeta -->
    <section class="intro-text">
        <h1>Bienvenido a nuestra plataforma universitaria</h1>
        <p>Un espacio pensado para estudiantes, docentes y toda la comunidad académica.</p>
    </section>

    <main class="main-content">
        <div class="cuadro-acerca text-center text-white">
            
            <h2 class="animated-title"><?= $titulo; ?></h2>

            <p class="animated-text">
                Te ofrecemos productos y actividades diseñadas para acompañarte en tu vida universitaria.
            </p>

            <p class="extra-info">
                Explora nuestras secciones y descubre beneficios, eventos y contenido exclusivo para nuestra comunidad.
            </p>

        </div>
    </main>

</body>
</html>
