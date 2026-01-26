<!-- CSS específico para eliminar espectáculos -->
<link rel="stylesheet" href="<?= base_url('activos/css/eliminar_espectaculo/body_eliminar_espectaculo.css'); ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <!-- ENCABEZADO -->
    <section class="encabezado-editar">
        <h1>Eliminar espectáculo</h1>
        <p>
            Vas a eliminar este espectáculo de manera permanente. Esta acción no se puede deshacer.
        </p>
    </section>

    <!-- FORMULARIO DE CONFIRMACIÓN -->
    <form action="<?= base_url('espectaculos/eliminar_espectaculo/' . ($espectaculo['id_espectaculo'] ?? '')); ?>" method="post">

        <input type="hidden" name="id_espectaculo" value="<?= $espectaculo['id_espectaculo'] ?? ''; ?>">

        <div class="card">

            <h2>Datos del espectáculo</h2>

            <p><strong>Nombre:</strong> <?= htmlspecialchars($espectaculo['nombre'] ?? ''); ?></p>
            <p><strong>Descripción:</strong> <?= htmlspecialchars($espectaculo['descripcion'] ?? 'Sin descripción'); ?></p>
            <p><strong>Fecha:</strong> <?= isset($espectaculo['fecha']) ? date('d/m/Y', strtotime($espectaculo['fecha'])) : ''; ?></p>
            <p><strong>Hora:</strong> <?= isset($espectaculo['hora']) ? date('H:i', strtotime($espectaculo['hora'])) : ''; ?></p>
            <p><strong>Precio:</strong> <?= isset($espectaculo['precio']) ? '$'.htmlspecialchars($espectaculo['precio']) : 'No definido'; ?></p>
            <p><strong>Entradas disponibles:</strong> <?= htmlspecialchars($espectaculo['disponibles'] ?? ''); ?></p>
            <p><strong>Dirección:</strong> <?= htmlspecialchars($espectaculo['direccion'] ?? ''); ?></p>

            <?php if (!empty($espectaculo['imagen']) && file_exists('./activos/imagenes/'.$espectaculo['imagen'])): ?>
                <div class="imagen-actual">
                    <span>Imagen:</span>
                    <img src="<?= base_url('activos/imagenes/'.$espectaculo['imagen']); ?>" alt="Imagen del espectáculo">
                </div>
            <?php endif; ?>

            <p class="alerta-error" style="text-align:center; margin-top: 20px;">
                Esta acción eliminará permanentemente el espectáculo. ¿Deseás continuar?
            </p>

        </div>

        <!-- BOTONES DE CONFIRMACIÓN -->
        <div class="acciones-form">
            <button type="submit" class="boton boton-eliminar">
                Confirmar eliminación
            </button>
            <a href="<?= base_url('espectaculos/administrador_espectaculos'); ?>" class="boton boton-secundario">
                Cancelar
            </a>
        </div>

    </form>

</main>
