
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Espectáculo</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/editar_espectaculo.css') ?>">
</head>
<body>
<main class="main-content">
    <h2 class="titulo">Editar Espectáculo</h2>

    <?php if (validation_errors()) : ?>
        <div class="error"><?= validation_errors(); ?></div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('mensaje')) : ?>
        <div class="mensaje-flash"><?= $this->session->flashdata('mensaje'); ?></div>
    <?php endif; ?>

    <form action="<?= site_url('espectaculos/actualizar'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_espectaculo" value="<?= $espectaculo['id_espectaculo']; ?>">
        <input type="hidden" name="imagen_actual" value="<?= $espectaculo['imagen']; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= set_value('nombre', $espectaculo['nombre']); ?>" required>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?= set_value('fecha', $espectaculo['fecha']); ?>" required>

        <label for="hora">Hora:</label>
        <input type="time" name="hora" value="<?= set_value('hora', $espectaculo['hora']); ?>" required>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="<?= set_value('direccion', $espectaculo['direccion']); ?>" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" rows="4" required><?= set_value('descripcion', $espectaculo['descripcion']); ?></textarea>

        <label for="disponibles">Entradas disponibles:</label>
        <input type="number" name="disponibles" value="<?= set_value('disponibles', $espectaculo['disponibles']); ?>" required>

        <label for="imagen">Imagen actual:</label>
        <?php if (!empty($espectaculo['imagen'])) : ?>
            <div class="imagen-actual">
                <img src="<?= base_url('activos/imagenes/' . $espectaculo['imagen']); ?>" alt="Imagen actual del espectáculo" width="150">
            </div>
        <?php else : ?>
            <p>No hay imagen cargada actualmente.</p>
        <?php endif; ?>

        <label for="imagen">Subir nueva imagen:</label>
        <input type="file" name="imagen" accept="image/*">

        <div class="botones-finales">
            <button type="submit" class="boton-editar">Guardar Cambios</button>
            <a href="<?= site_url('administrador'); ?>" class="boton-volver">Volver al listado</a>
        </div>
    </form>
</main>
</body>
</html>
