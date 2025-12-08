<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cartelera de espectáculos</title>
    <!-- Enlace al CSS externo principal -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/usuario_espectaculos/usuario_espectaculos_body.css'); ?>">
</head>
<body>

<main class="inicio-container" style="background-image: url('<?php echo isset($fondo) ? $fondo : ''; ?>');">
    
    <!-- Bloque superior con título y descripción -->
    <section class="bienvenida row">
        <div class="col-12 text-center animate__animated animate__zoomIn">
            <h3 class="mensaje-bienvenida">Lista de los mejores Espectáculos</h3>
            <p class="mensaje-sub">
                Descubrí nuestra selección de eventos destacados: conciertos, obras de teatro y experiencias culturales únicas.<br>
                Aquí encontrarás toda la información necesaria para elegir y disfrutar tu próximo espectáculo.
            </p>
        </div>
    </section>

    <!-- Cartelera de espectáculos -->
    <section class="cartelera row justify-content-center animate__animated animate__fadeInUp">
        <div class="col-md-10">
            <div class="tarjetas-container">
                <?php if (!empty($espectaculos)): ?>
                    <?php foreach ($espectaculos as $espectaculo): ?>
                        <div class="tarjeta">
                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>" 
                                 alt="<?= $espectaculo['nombre']; ?>" 
                                 class="imagen">

                            <div class="contenido">
                                <h3><?= $espectaculo['nombre']; ?></h3>
                                <h2><?= $espectaculo['descripcion']; ?></h2>
                                <p class="precio">
                                    $<?= number_format($espectaculo['precio'], 2, ',', '.'); ?>
                                </p>
                                <a href="<?= site_url('espectaculos/ver_espectaculo_logueado/' . $espectaculo['id_espectaculo']); ?>" 
                                   class="boton-ver">Ver espectáculo</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay espectáculos disponibles en este momento.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

</body>
</html>
