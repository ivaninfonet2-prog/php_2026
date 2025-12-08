
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/espectaculo_sin_loguear.css') ?>">
</head>
<body>
    <div class="page-wrapper">
        <header class="header">
            <h1 class="titulo"><?= $titulo ?></h1>
        </header>

        <main class="contenido">
            <?php if (!empty($espectaculos)): ?>
                <?php foreach ($espectaculos as $espectaculo): ?>
                    <article class="espectaculo">
                        <section class="descripcion">
                            <h2><?= $espectaculo['nombre'] ?></h2>
                            <p><?= $espectaculo['descripcion'] ?></p>
                        </section>

                        <section class="imagen">
                            <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                                 alt="<?= $espectaculo['nombre'] ?>" 
                                 class="imagen-espectaculo">
                        </section>

                        <section class="detalles">
                            <h3>Detalles del Evento</h3>
                            <ul>
                                <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                                <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                                <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                            </ul>
                        </section>

                        <section class="informacion">
                            <h3>Información de Entradas</h3>
                            <p class="entradas">Entradas disponibles: 
                                <strong><?= $espectaculo['disponibles'] ?></strong>
                            </p>

                            <?php if (!empty($mensaje)): ?>
                                <p class="mensaje"><?= $mensaje ?></p>
                            <?php endif; ?>

                            <?php if ($espectaculo['disponibles'] > 0): ?>
                                <p class="estado disponible"> ¡Todavía hay lugares disponibles!</p>
                            <?php else: ?>
                                <p class="estado agotado"> Entradas agotadas.</p>
                            <?php endif; ?>
                        </section>

                        <section class="reserva-login">
                            <p class="aviso-login"> Para reservar entradas, primero debes iniciar sesión.</p>
                            <a href="<?= site_url('login') ?>" class="boton-login">Iniciar sesión</a>
                        </section>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay espectáculos disponibles en este momento.</p>
            <?php endif; ?>

            <div class="boton-inicio-container">
                <a href="<?= site_url('principio') ?>" class="boton-inicio"> Volver al inicio</a>
            </div>
        </main>
    </div>
</body>
</html>
