<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>

    <!-- CSS general -->
    <link rel="stylesheet" href="<?= base_url('activos/css/principal/body_principal.css'); ?>">

    <!-- CSS específico de esta vista -->
    <link rel="stylesheet" href="<?= base_url('activos/css/principal/cartelera.css'); ?>">
</head>
<body>

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">

    <!-- Bloque superior con título y descripción -->
    <section class="bienvenida row mt-5">
        <div class="col-12 text-center animate__animated animate__zoomIn texto-limitado">
            <h3 class="mensaje-bienvenida"><?= $titulo ?></h3>
            <p class="mensaje-sub">
                Descubrí nuestra selección de eventos destacados: conciertos, obras de teatro y experiencias culturales únicas.<br>
                Aquí encontrarás toda la información necesaria para elegir y disfrutar tu próximo espectáculo.
            </p>
        </div>
    </section>

    <!-- Cartelera de espectáculos -->
    <section class="cartelera row mt-4 justify-content-center animate__animated animate__fadeInUp">
        <div class="col-md-10">

            <div class="tarjetas-container">
                <?php if (!empty($espectaculos)): ?>
                    <?php foreach ($espectaculos as $espectaculo): ?>
                        <div class="tarjeta">
                            
                            <!-- Imagen del espectáculo -->
                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>" 
                                 alt="<?= $espectaculo['nombre']; ?>" 
                                 class="imagen">

                            <!-- Contenido -->
                            <div class="contenido">
                                <h3><?= $espectaculo['nombre']; ?></h3>
                                <h4 class="descripcion"><?= $espectaculo['descripcion']; ?></h4>
                                <p class="precio">$<?= number_format($espectaculo['precio'], 2, ',', '.'); ?></p>
                                <a href="<?= site_url('principal/espectaculo_principal/' . $espectaculo['id_espectaculo']); ?>" 
                                   class="boton-ver">Ver espectáculo</a>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="texto-limitado">No hay espectáculos disponibles en este momento.</p>
                <?php endif; ?>
            </div>

            <!-- Texto inferior -->
            <div class="texto-general texto-limitado">
                <p>
                    ¡No te pierdas ninguno de nuestros eventos destacados! Explora la cartelera y asegura tu lugar en los mejores espectáculos de la ciudad.
                </p>
            </div>

        </div>
    </section>

</main>

</body>
</html>
