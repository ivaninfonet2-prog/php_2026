<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $espectaculo['nombre']; ?></title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="<?= base_url('activos/css/ver_usuario/body_ver_usuario.css?v=' . time()); ?>" />
</head>

<!-- Fondo del body -->
<div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

    <!-- Fondo del body -->
    <div class="fondo-body" style="background-image: url('<?= $fondo ?>');"></div>

    <main class="container flex-grow-1">
        <section class="card">
            
            <!-- Título -->
            <h1 class="titulo"><?= $espectaculo['nombre']; ?></h1>

            <!-- Imagen -->
            <div class="imagen-wrapper">
                <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']) ?>" 
                     alt="<?= $espectaculo['nombre'] ?>" 
                     class="imagen" />
            </div>

            <!-- Descripción -->
            <section class="descripcion">
                <p><?= $espectaculo['descripcion'] ?></p>
            </section>

            <!-- Detalles -->
            <section class="detalles">
                <h3>Detalles del Evento</h3>
                <ul>
                    <li><strong>Fecha:</strong> <?= $espectaculo['fecha'] ?></li>
                    <li><strong>Hora:</strong> <?= $espectaculo['hora'] ?></li>
                    <li><strong>Dirección:</strong> <?= $espectaculo['direccion'] ?></li>
                </ul>
            </section>

            <!-- Entradas -->
            <p class="entradas">Entradas disponibles: <strong><?= $espectaculo['disponibles']; ?></strong></p>

            <?php if (!empty($mensaje)): ?>
                <div class="mensaje"><?= $mensaje; ?></div>
            <?php endif; ?>

            <!-- Reserva -->
            <?php if ($espectaculo['disponibles'] > 0): ?>
                <form method="post" action="<?= site_url('reservar/procesar/' . $espectaculo['id_espectaculo']); ?>" class="formulario">
                    <label for="cantidad_entradas">Cantidad:</label>
                    <input type="number" name="cantidad_entradas" id="cantidad_entradas" min="1" max="<?= $espectaculo['disponibles']; ?>" required />

                    <div class="botones">
                        <button type="submit" class="btn reservar">Reservar</button>
                        <a href="<?= site_url('usuario') ?>" class="btn volver">Volver a Usuario</a>
                    </div>
                </form>
            <?php else: ?>
                <div class="error">Entradas agotadas.</div>
                <div class="botones">
                    <a href="<?= site_url('usuario') ?>" class="btn volver">Volver a Usuario</a>
                </div>
            <?php endif; ?>
        </section>
    </main>

</body>
</html>
