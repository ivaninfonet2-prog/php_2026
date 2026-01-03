<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo); ?></title>

    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculo_sin_loguear/body_espectaculo_sin_loguear.css?v=' . time()) ?>">
</head>

<body>

    <!-- Fondo general -->
    <div class="fondo-body" style="background-image: url('<?= htmlspecialchars($fondo) ?>');" aria-hidden="true"></div>

    <!-- Título y descripción principales -->
    <header class="intro-text">
        <h1><?= htmlspecialchars($espectaculo['nombre']) ?></h1>
        <p><?= htmlspecialchars($espectaculo['descripcion']) ?></p>
    </header>

    <!-- Tarjeta espectáculo -->
    <main class="registro-container">
        <article class="tarjeta-espectaculo">

            <!-- Imagen del espectáculo -->
            <figure class="imagen">
                <img 
                    src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                    alt="Imagen del espectáculo: <?= htmlspecialchars($espectaculo['nombre']) ?>" 
                    class="imagen-espectaculo">
            </figure>

            <!-- Detalles -->
            <section class="detalles" aria-label="Detalles del espectáculo">
                <ul>
                    <li><strong>Fecha:</strong> <?= htmlspecialchars($espectaculo['fecha']) ?></li>
                    <li><strong>Hora:</strong> <?= htmlspecialchars($espectaculo['hora']) ?></li>
                    <li><strong>Dirección:</strong> <?= htmlspecialchars($espectaculo['direccion']) ?></li>
                    <li><strong>Precio:</strong> $<?= number_format($espectaculo['precio'], 2, ',', '.') ?></li>
                    <li><strong>Entradas disponibles:</strong> <?= htmlspecialchars($espectaculo['disponibles']) ?></li>
                </ul>
            </section>

            <!-- Estado -->
            <section class="informacion" aria-live="polite">
                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado">Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <!-- Login -->
            <section class="reserva-login">
                <p class="texto-login">
                    Para reservar entradas, primero debés iniciar sesión.
                </p>
                <a href="<?= site_url('login') ?>" class="boton-login" role="button" aria-label="Iniciar sesión para reservar entradas">
                    Iniciar sesión
                </a>
            </section>

        </article>
    </main>

    <!-- Sección mapa con título y descripción -->
    <section class="mapa-section">
        <h2 class="mapa-titulo">Ubicación del espectáculo</h2>
        <p class="mapa-descripcion">Encontrá fácilmente el lugar del evento en el mapa para organizar tu llegada.</p>
        <div class="mapa-externa" aria-label="Mapa del lugar del espectáculo">
            <img src="<?= base_url('activos/imagenes/mapa.jfif') ?>" alt="Mapa del lugar del espectáculo">
        </div>
    </section>

</body>
</html>
