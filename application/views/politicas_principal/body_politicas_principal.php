<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/politicas_principal/body_politicas_principal.css'); ?>">
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
        </div>
    </main>

</body>
</html>
