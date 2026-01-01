<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <!-- Enlace al CSS optimizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculo_sin_loguear/body_espectaculo_sin_loguear.css?v=' . time()) ?>">
</head>

<body>

    <!-- Fondo general -->
    <div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

    <!-- Título y descripción principales arriba de la tarjeta -->
    <section class="intro-text">
        <h1><?= $espectaculo['nombre'] ?></h1>
        <p><?= $espectaculo['descripcion'] ?></p>
        <h2>Información completa del espectáculo</h2>
        <p>Revisá todos los detalles y asegurate de reservar tu lugar a tiempo.</p>
    </section>

    <!-- Contenedor principal -->
    <main class="registro-container">
        <div class="tarjeta-espectaculo">

            <!-- Imagen del espectáculo -->
            <section class="imagen">
                <img 
                    src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                    alt="<?= $espectaculo['nombre'] ?>" 
                    class="imagen-espectaculo">
            </section>

            <!-- Detalles básicos centrados -->
            <section class="detalles">
                <ul>
                    <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                    <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                    <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                    <li><strong>Precio:</strong> $<?= number_format($espectaculo['precio'], 2, ',', '.') ?></li>
                    <li><strong>Entradas disponibles:</strong> <?= $espectaculo['disponibles'] ?></li>
                </ul>
            </section>

            <!-- Estado de disponibilidad -->
            <section class="informacion">
                <?php if ($espectaculo['disponibles'] > 0): ?>
                    <p class="estado disponible">¡Todavía hay lugares disponibles!</p>
                <?php else: ?>
                    <p class="estado agotado">Entradas agotadas.</p>
                <?php endif; ?>
            </section>

            <!-- Invitación a loguearse -->
            <section class="reserva-login">
                <p class="texto-login">
                    Para reservar entradas, primero debés iniciar sesión.
                </p>
                <a href="<?= site_url('login') ?>" class="boton-login">
                    Iniciar sesión
                </a>
            </section>

        </div>
    </main>

    <!-- Mapa fuera de la tarjeta -->
    <section class="mapa-externa">
        <img src="<?= base_url('activos/imagenes/mapa.jfif') ?>" alt="Mapa del lugar del espectáculo">
    </section>

    <!-- Texto final fuera de la tarjeta con espaciado armonioso -->
    <section class="texto-final">
        Recordá revisar toda la información antes de iniciar sesión para reservar tus entradas.<br>
        ¡No te pierdas este espectáculo y asegurá tu lugar con anticipación!
    </section>

</body>
</html>
