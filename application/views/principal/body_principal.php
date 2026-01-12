<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($titulo) ? $titulo : 'Cartelera' ?></title>

    <link rel="stylesheet" href="<?= base_url('activos/css/principal/body_principal.css?v=' . time()) ?>">
</head>

<body style="background-image: url('<?= isset($fondo) ? $fondo : '' ?>');">

<main class="inicio-container">

    <!-- BIENVENIDA -->
    <section class="bienvenida">
        <div class="texto-limitado">
            <h1 class="mensaje-bienvenida">
                <?= isset($titulo) ? $titulo : 'Cartelera' ?>
            </h1>

            <p class="mensaje-sub">
                Descubrí nuestra selección de eventos destacados: conciertos,
                obras de teatro y experiencias culturales únicas.
            </p>
        </div>
    </section>

    <!-- CARTELERA -->
    <section class="cartelera">

        <div class="tarjetas-container">
            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $e): ?>

                    <article class="tarjeta">

                        <h3 class="nombre-artista"><?= $e['nombre'] ?></h3>

                        <img
                            src="<?= base_url('activos/imagenes/' . $e['imagen']) ?>"
                            alt="<?= $e['nombre'] ?>"
                            class="imagen"
                        >

                        <p class="descripcion"><?= $e['descripcion'] ?></p>

                        <p class="precio">
                            $<?= number_format($e['precio'], 2, ',', '.') ?>
                        </p>

                        <a
                            href="<?= site_url('principal/espectaculo_principal/' . $e['id_espectaculo']) ?>"
                            class="boton-ver"
                        >
                            Ver espectáculo
                        </a>

                    </article>

                <?php endforeach; ?>
            <?php else: ?>
                <p class="texto-general">
                    No hay espectáculos disponibles en este momento.
                </p>
            <?php endif; ?>
        </div>

        <div class="texto-general texto-limitado">
            ¡No te pierdas ninguno de nuestros eventos destacados!
        </div>

    </section>

</main>

</body>
</html>
