<!-- CSS exclusivo del body/cartelera -->
<link rel="stylesheet" href="<?= base_url('activos/css/principal/body_principal.css?v=' . time()) ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<body style="background-image: url('<?= $fondo; ?>');">

<main class="inicio-container">

    <!-- BIENVENIDA -->
    <section class="bienvenida">
        <div class="texto-limitado animate__animated animate__zoomIn">
            <h1 class="mensaje-bienvenida"><?= isset($titulo) ? $titulo : 'Cartelera' ?></h1>
            <p class="mensaje-sub">
                Descubrí nuestra selección de eventos destacados: conciertos,
                obras de teatro y experiencias culturales únicas.
            </p>
        </div>
    </section>

    <!-- CARTELERA -->
    <section class="cartelera animate__animated animate__fadeInUp">
        <div class="tarjetas-container">
            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $e): ?>
                    <article class="tarjeta">
                        <img src="<?= base_url('activos/imagenes/' . $e['imagen']) ?>" alt="<?= $e['nombre'] ?>" class="imagen">

                        <div class="contenido">
                            <h3><?= $e['nombre'] ?></h3>
                            <p class="descripcion"><?= $e['descripcion'] ?></p>
                            <p class="precio">$<?= number_format($e['precio'], 2, ',', '.') ?></p>

                            <a href="<?= site_url('principal/espectaculo_principal/' . $e['id_espectaculo']) ?>" class="boton-ver">
                                Ver espectáculo
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="texto-general">No hay espectáculos disponibles en este momento.</p>
            <?php endif; ?>
        </div>

        <div class="texto-general texto-limitado">
            ¡No te pierdas ninguno de nuestros eventos destacados!
        </div>
    </section>
</main>
