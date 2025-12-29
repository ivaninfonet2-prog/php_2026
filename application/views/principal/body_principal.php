<!-- CSS base -->
<link rel="stylesheet" href="<?= base_url('activos/css/principal/body_principal.css'); ?>">

<main
    class="inicio-container"
    style="background-image: url('<?= $fondo ?>');"
>

    <!-- =======================
         BIENVENIDA
    ======================== -->

    <section class="bienvenida">
        <div class="texto-limitado animate__animated animate__zoomIn">

            <h3 class="mensaje-bienvenida">
                <?= $titulo ?>
            </h3>

            <p class="mensaje-sub">
                Descubrí nuestra selección de eventos destacados: conciertos,
                obras de teatro y experiencias culturales únicas.<br>
                Elegí tu próximo espectáculo y disfrutá de una experiencia inolvidable.
            </p>

        </div>
    </section>

    <!-- =======================
         CARTELERA
    ======================== -->

    <section class="cartelera animate__animated animate__fadeInUp">

        <div class="tarjetas-container">

            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $espectaculo): ?>

                    <article class="tarjeta">

                        <img
                            src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>"
                            alt="<?= $espectaculo['nombre']; ?>"
                            class="imagen"
                        >

                        <div class="contenido">

                            <h3>
                                <?= $espectaculo['nombre']; ?>
                            </h3>

                            <p class="descripcion">
                                <?= $espectaculo['descripcion']; ?>
                            </p>

                            <p class="precio">
                                $<?= number_format(
                                    $espectaculo['precio'],
                                    2,
                                    ',',
                                    '.'
                                ); ?>
                            </p>

                            <a
                                href="<?= site_url(
                                    'principal/espectaculo_principal/' .
                                    $espectaculo['id_espectaculo']
                                ); ?>"
                                class="boton-ver"
                            >
                                Ver espectáculo
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>
            <?php else: ?>

                <p class="texto-limitado">
                    No hay espectáculos disponibles en este momento.
                </p>

            <?php endif; ?>

        </div>

        <!-- Texto final -->
        <div class="texto-general texto-limitado">
            <p>
                ¡No te pierdas ninguno de nuestros eventos destacados!
                Explorá la cartelera y asegurá tu lugar en los mejores espectáculos.
            </p>
        </div>

    </section>

</main>
