
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espectáculos</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/index_espectaculos_logueado.css') ?>">
</head>
<body>

    <main class="main-content">
        <h2 class="titulo">Espectáculos</h2>

        <?php if (!empty($espectaculos)) : ?>
            <div class="contenedor-tarjetas">
                <?php foreach ($espectaculos as $espectaculo) : ?>
                    <div class="tarjeta">
                        <img src="<?= base_url('./activos/imagenes/' . $espectaculo->imagen); ?>" alt="<?= $espectaculo->nombre; ?>" class="imagen">
                        <div class="contenido">
                            <h3><?= $espectaculo->nombre; ?></h3>
                            <p><strong>Fecha:</strong> <?= $espectaculo->fecha; ?></p>
                            <p><strong>Hora:</strong> <?= $espectaculo->hora; ?></p>
                            <p><strong>Entradas:</strong> <?= $espectaculo->disponibles; ?></p>
                            <p><strong>Aviso:</strong> <?= $espectaculo->aviso; ?></p>

                            <?php if ($espectaculo->detalles_habilitados) : ?>
                                <a href="<?= site_url('espectaculos/ver_espectaculo/' . $espectaculo->id_espectaculo); ?>" class="boton">Ver Detalle</a>
                            <?php else : ?>
                                <span class="no-disponible">No disponible</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="mensaje-vacio">No hay espectáculos disponibles en este momento.</p>
        <?php endif; ?>

        <div class="acciones">
            <a href="<?= base_url('usuario'); ?>" class="boton">Ir a la Vista Usario</a>
            <a href="<?= site_url('login/logout'); ?>" class="boton">Cerrar Sesión</a>
        </div>
    </main>

</body>
</html>
