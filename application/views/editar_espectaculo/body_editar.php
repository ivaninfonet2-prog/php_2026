<!-- Enlace al CSS específico para esta vista -->
<link rel="stylesheet" href="<?= base_url('activos/css/editar_espectaculo/body_editar.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">
    <div class="card">

        <h2>Editar Espectáculo</h2>

        <!-- Botones de navegación -->
        <div class="botones-arriba">
            <a href="<?= base_url('administrador') ?>" class="btn">Panel Administrador</a>
            <a href="javascript:history.back()" class="btn">Volver</a>
        </div>

        <?php if ($this->session->flashdata('mensaje')): ?>
            <div class="alert"><?= $this->session->flashdata('mensaje'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('espectaculos/editar_espectaculo/'.($espectaculo['id_espectaculo'] ?? '')) ?>"
              method="post" enctype="multipart/form-data">

            <input type="hidden" name="id_espectaculo" value="<?= $espectaculo['id_espectaculo'] ?? '' ?>">
            <input type="hidden" name="imagen_actual" value="<?= $espectaculo['imagen'] ?? '' ?>">

            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control <?= form_error('nombre') ? 'error-input' : '' ?>" value="<?= set_value('nombre', $espectaculo['nombre'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('nombre'); ?></div>

            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control <?= form_error('descripcion') ? 'error-input' : '' ?>" required><?= set_value('descripcion', $espectaculo['descripcion'] ?? '') ?></textarea>
            <div class="error-msg"><?= form_error('descripcion'); ?></div>

            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control <?= form_error('fecha') ? 'error-input' : '' ?>" value="<?= set_value('fecha', $espectaculo['fecha'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('fecha'); ?></div>

            <label class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control <?= form_error('hora') ? 'error-input' : '' ?>" value="<?= set_value('hora', $espectaculo['hora'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('hora'); ?></div>

            <label class="form-label">Precio</label>
            <input type="number" name="precio" step="0.01" class="form-control <?= form_error('precio') ? 'error-input' : '' ?>" value="<?= set_value('precio', $espectaculo['precio'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('precio'); ?></div>

            <label class="form-label">Entradas disponibles</label>
            <input type="number" name="disponibles" class="form-control <?= form_error('disponibles') ? 'error-input' : '' ?>" value="<?= set_value('disponibles', $espectaculo['disponibles'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('disponibles'); ?></div>

            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control <?= form_error('direccion') ? 'error-input' : '' ?>" value="<?= set_value('direccion', $espectaculo['direccion'] ?? '') ?>" required>
            <div class="error-msg"><?= form_error('direccion'); ?></div>

            <?php if (!empty($espectaculo['imagen']) && file_exists('./activos/imagenes/'.$espectaculo['imagen'])): ?>
                <label class="form-label">Imagen actual:</label>
                <img src="<?= base_url('activos/imagenes/'.$espectaculo['imagen']) ?>" width="180" class="img-thumbnail">
            <?php endif; ?>

            <label class="form-label">Cambiar imagen</label>
            <input type="file" name="imagen" class="form-control">

            <!-- Botones de acción -->
            <div class="botones-finales">
                <button type="submit" class="btn">Guardar cambios</button>
                <a href="<?= base_url('administrador') ?>" class="btn">Cancelar</a>
            </div>
        </form>
    </div>
</main>
