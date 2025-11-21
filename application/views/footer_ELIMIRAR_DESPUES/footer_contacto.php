<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/contacto.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-contacto text-center text-white">
            <h2 class="animated-title">Contacto</h2>
            <p class="animated-text">
                Puedes escribirnos a <strong>contacto@unla.edu.ar</strong> o llamarnos al <strong>(011) 1234-5678</strong>.
            </p>
            
            <a href="<?= base_url('principio'); ?>" class="btn btn-warning mt-3 animated-btn">
                Volver al Inicio
            </a>
        </div>
    </main>

</body>
</html>
