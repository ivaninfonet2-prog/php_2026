<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="<?= base_url('activos/css/ver_espectaculo_sin_loguear/body_ver_espectaculo_sin_loguear.css?v=' . time()) ?>">
</head>
<body>

    <!-- Fondo -->
    <div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

    <!-- Texto fuera de la tarjeta -->
    <section class="intro-text">
        <h1>Detalle del Espectáculo</h1>
        <p>Explora la información completa de nuestros eventos y prepárate para disfrutar.</p>
    </section>

    <!-- Contenedor de la tarjeta -->
    <main class="registro-container">
        <div class="tarjeta-espectaculo">

            <!-- Descripción -->
            <section class="descripcion">
                <h2><?= $espectaculo['nombre'] ?></h2>
                <p><?= $espectaculo['descripcion'] ?></p>
            </section>

            <!-- Imagen -->
            <section class="imagen">
                <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                     alt="<?= $espectaculo['nombre'] ?>" 
                     class="imagen-espectaculo">
            </section>

            <!-- Detalles del evento -->
            <section class="detalles">
                <h3>Detalles del Evento</h3>
                <ul>
                    <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                    <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                    <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                </ul>
            </section>

            <!-- Entradas -->
            <section class="informacion">
                <h3>Entradas</h3>
                <p class="entradas">Disponibles: <strong><?= $espectaculo['disponibles'] ?></strong></p>
                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado">Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <!-- Botón iniciar sesión -->
            <section class="reserva-login">
                <p>Para reservar entradas, primero debes iniciar sesión.</p>
                <a href="<?= site_url('login') ?>" class="boton-login">Iniciar sesión</a>
            </section>

        </div>
    </main>

</body>
</html>
