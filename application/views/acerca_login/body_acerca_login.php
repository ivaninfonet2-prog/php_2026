<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<<<<<<< HEAD
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
=======
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/acerca_login/body_acerca_login.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Main envuelve el contenido debajo del header -->
    <main class="main-content">
        <div class="cuadro-acerca text-center text-white">
            <h2 class="animated-title"><?= $titulo; ?></h2>
            <p class="animated-text">
                Somos una tienda universitaria que ofrece productos y espectáculos para toda la comunidad.
            </p>
            
            <a href="<?= base_url('principio'); ?>" class="btn btn-warning mt-3 animated-btn">
                Volver al principio
            </a>
             <a href="<?= base_url('login'); ?>" class="btn btn-warning mt-3 animated-btn">
                Volver al login
            </a>
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f

        </div>
    </main>

</body>
</html>
