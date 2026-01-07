<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($espectaculo['nombre']); ?></title>

    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculo_logueado/body_espectaculo_logueado.css?v=' . time()); ?>">
</head>

<body>

<!-- Fondo dinámico -->
<div class="fondo-body" style="background-image: url('<?= htmlspecialchars($fondo) ?>');"></div>

<main class="container">

    <!-- Intro -->
    <section class="intro">
        <h2>Detalle del espectáculo</h2>
        <p>
            Conocé toda la información del evento, disponibilidad de entradas
            y realizá tu reserva de forma rápida y segura.
        </p>
    </section>

    <!-- Tarjeta -->
    <section class="card">

        <!-- Título y descripción -->
        <h1><?= htmlspecialchars($espectaculo['nombre']); ?></h1>
        <p class="descripcion"><?= htmlspecialchars($espectaculo['descripcion']); ?></p>

        <!-- Imagen -->
        <div class="imagen-wrapper">
            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" alt="<?= htmlspecialchars($espectaculo['nombre']); ?>">
        </div>

        <!-- Detalles del evento -->
        <section class="detalles">
            <h3>Detalles del evento</h3>
            <ul>
                <li><strong>Fecha:</strong> <?= htmlspecialchars($espectaculo['fecha']); ?></li>
                <li><strong>Hora:</strong> <?= htmlspecialchars($espectaculo['hora']); ?></li>
                <li><strong>Dirección:</strong> <?= htmlspecialchars($espectaculo['direccion']); ?></li>
            </ul>
        </section>

        <!-- Bloque inferior centrado -->
        <div class="card-bottom">

            <p class="entradas">
                Entradas disponibles:
                <strong><?= htmlspecialchars($espectaculo['disponibles']); ?></strong>
            </p>

            <?php if (!empty($mensaje)): ?>
                <div class="alert success"><?= htmlspecialchars($mensaje); ?></div>
            <?php endif; ?>

            <?php if ($espectaculo['disponibles'] > 0): ?>
                <form method="post" action="<?= site_url('reservar/procesar/' . $espectaculo['id_espectaculo']); ?>" class="formulario">
                    <label for="cantidad_entradas">Cantidad de entradas</label>
                    <input type="number" name="cantidad_entradas" id="cantidad_entradas" min="1" max="<?= htmlspecialchars($espectaculo['disponibles']); ?>" required>

                    <div class="botones">
                        <button type="submit" class="btn reservar">Reservar</button>
                        <a href="<?= site_url('usuario/usuario_espectaculos') ?>" class="btn volver">Ir a Espectáculos</a>
                    </div>
                </form>
            <?php else: ?>
                <div class="alert error">Entradas agotadas.</div>
                <div class="botones">
                    <a href="<?= site_url('usuario/usuario_espectaculos') ?>" class="btn volver">Ir a Espectáculos</a>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <!-- Sección mapa -->
    <section class="mapa-section">
        <h2>Ubicación del espectáculo</h2>
        <p>
            Encontrá fácilmente el lugar del evento en el mapa para organizar tu llegada.
        </p>
        <div class="mapa-externa" aria-label="Mapa del lugar del espectáculo">
            <img src="<?= base_url('activos/imagenes/mapa.jfif') ?>" alt="Mapa del lugar del espectáculo">
        </div>
        <p class="mapa-texto">
            El evento se realizará en un espacio accesible y cómodo, con transporte público cercano y estacionamiento disponible. 
        </p>
    </section>

</main>

</body>
</html>
