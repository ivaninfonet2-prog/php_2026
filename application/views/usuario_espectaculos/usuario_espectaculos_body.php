<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cartelera de espectáculos</title>

    <!-- CSS externo -->
    <link rel="stylesheet"
          href="<?= base_url('activos/css/usuario_espectaculos/usuario_espectaculos_body.css'); ?>">
</head>
<body>

<?php
$estilo_fondo = '';

if (isset($fondo) && !empty($fondo)) {
    $estilo_fondo = 'style="background-image: url(' . $fondo . ');"';
}
?>

<main class="inicio-container" <?= $estilo_fondo; ?>>

    <!-- Bienvenida -->
    <section class="bienvenida">
        <h3 class="mensaje-bienvenida">Lista de los mejores espectáculos</h3>
        <p class="mensaje-sub">
            Descubrí nuestra selección de eventos destacados: conciertos,
            obras de teatro y experiencias culturales únicas.<br>
        </p>
    </section>

    <!-- Cartelera -->
    <section class="cartelera">
        <div class="tarjetas-container">

            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $espectaculo): ?>
                    <div class="tarjeta-wrapper">
                        <article class="tarjeta">

                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>"
                                 alt="<?= $espectaculo['nombre']; ?>"
                                 class="imagen">

                            <div class="contenido">
                                <h3 class="titulo"><?= $espectaculo['nombre']; ?></h3>
                                <p class="descripcion"><?= $espectaculo['descripcion']; ?></p>

                                <p class="precio">
                                    $<?= number_format($espectaculo['precio'], 2, ',', '.'); ?>
                                </p>

                                <a href="<?= site_url('espectaculos/espectaculo_logueado/' . $espectaculo['id_espectaculo']); ?>"
                                   class="boton-ver">
                                    Ver espectáculo
                                </a>
                            </div>
                        </article>

                        <!-- Texto debajo de la tarjeta -->
                        <p class="texto-extra">
                            ¡No te pierdas esta experiencia única!
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="sin-espectaculos">
                    No hay espectáculos disponibles en este momento.
                </p>
            <?php endif; ?>

        </div>
    </section>

</main>

</body>
</html>
