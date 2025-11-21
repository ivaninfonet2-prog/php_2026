
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espectáculos</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/index_sin_loguear.css') ?>">
</head>
<body>

    <h2 class="titulo"> Lista de los mejores Espectáculos</h2>

    <div class="tarjetas-container">
        <?php foreach ($espectaculos as $espectaculo) : ?>
            <div class="tarjeta">
                <img src="<?= base_url('./activos/imagenes/' . $espectaculo->imagen); ?>" alt="<?= $espectaculo->nombre; ?>" class="imagen">
                <div class="contenido">
                    <h3><?= $espectaculo->nombre; ?></h3>
                     <h2><?= $espectaculo->descripcion; ?></h2>
                    <p class="precio">$<?= number_format($espectaculo->precio, 2, ',', '.'); ?></p>
                    <a href="<?= site_url('espectaculos/espectaculo_sin_loguear/' . $espectaculo->id_espectaculo); ?>" class="boton-ver">Ver espectáculo</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>
