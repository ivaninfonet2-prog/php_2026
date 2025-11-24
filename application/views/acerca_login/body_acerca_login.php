<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        </div>
    </main>

</body>
</html>
