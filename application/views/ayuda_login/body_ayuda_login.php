<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/ayuda_login/body_ayuda_login.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

    <main class="main-content">
        <div class="cuadro-ayuda text-center text-white">
            <h2 class="animated-title">Ayuda</h2>
            <p class="animated-text">
                En esta sección encontrarás información y soporte para utilizar UNLa Tienda.
            </p>
            
            <a href="<?= base_url('principio'); ?>" class="btn btn-warning mt-3 animated-btn">
                Volver al Principio
            </a>

                    <!-- Botón volver colocado más arriba -->
            <div class="volver-inicio text-center mt-4">
                <a href="<?php echo site_url('login'); ?>" class="btn btn-secondary">Volver al Login</a>
            </div>
 
        </div>
    </main>

</body>
</html>
