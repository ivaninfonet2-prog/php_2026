<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculo_sin_loguear/body_espectaculo_sin_loguear.css?v=' . time()) ?>">
</head>

<body>

    <div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

    <section class="intro-text">
        <h1>Detalle del Espectáculo</h1>
        <p>Explorá la información completa del evento y preparate para disfrutar.</p>
    </section>

    <main class="registro-container">
        <div class="tarjeta-espectaculo">

            <section class="descripcion">
                <h2><?= $espectaculo['nombre'] ?></h2>
                <p><?= $espectaculo['descripcion'] ?></p>
            </section>

            <section class="imagen">
                <img 
                    src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                    alt="<?= $espectaculo['nombre'] ?>" 
                    class="imagen-espectaculo">
            </section>

            <section class="detalles">
                <h3>Detalles del evento</h3>
                <ul>
                    <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                    <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                    <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                </ul>
            </section>

            <section class="informacion">
                <h3>Entradas</h3>
                <p class="entradas">
                    Disponibles: <strong><?= $espectaculo['disponibles'] ?></strong>
                </p>

                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado">Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <section class="reserva-login">
                <p class="texto-login">
                    Para reservar entradas, primero debés iniciar sesión.
                </p>
                <a href="<?= site_url('login') ?>" class="boton-login">
                    Loguearse
                </a>
            </section>

        </div>
    </main>

</body>
</html>
