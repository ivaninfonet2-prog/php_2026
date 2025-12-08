<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>

    <!-- CSS general -->
    <link rel="stylesheet" href="<?= base_url('activos/css/principal/body_principal.css'); ?>">
</head>
<body>

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
    
    <!-- Bloque superior con título y descripción -->
    <section class="bienvenida row mt-5">
        <div class="col-12 text-center animate__animated animate__zoomIn">
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
                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>" 
                                 alt="<?= $espectaculo['nombre']; ?>" 
                                 class="imagen">

                            <div class="contenido">
                                <h3><?= $espectaculo['nombre']; ?></h3>
                                <h2><?= $espectaculo['descripcion']; ?></h2>
                                <p class="precio">
                                    $<?= number_format($espectaculo['precio'], 2, ',', '.'); ?>
                                </p>
                                <a href="<?= site_url('espectaculos/ver_espectaculo_sin_loguear/' . $espectaculo['id_espectaculo']); ?>" 
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
=======

<div class="container-fluid inicio-container full-width"
     style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url('<?= $fondo ?>') no-repeat center center fixed;
            background-size: cover;">

    <!-- Sección dinámica -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-10 animate__animated animate__fadeInUp">
            <?= $contenido ?>
        </div>
    </div>

    <!-- Sección extra decorativa -->
    <div class="row mt-5">
        <div class="col-12 text-center animate__animated animate__zoomIn">
            <h3 class="mensaje-bienvenida">¡Disfrutá de nuestros espectáculos!</h3>
            <p class="mensaje-sub">Explorá la cartelera y viví experiencias únicas.</p>
        </div>
    </div>
</div>

>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
