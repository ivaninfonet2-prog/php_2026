<link rel="stylesheet" href="<?= base_url('activos/css/editar_espectaculo/body_editar_espectaculo.css') ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <section class="encabezado-editar">
        <h1>Editar espectáculo</h1>
        <p>Podés modificar los datos, cambiar la imagen y actualizar la información de manera rápida y sencilla.</p>
    </section>

    <!-- MENSAJES -->
    <?php if ($this->session->flashdata('error_imagen')): ?>
        <div class="alert error">
             <?= $this->session->flashdata('error_imagen') ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert success">
             <?= $this->session->flashdata('success') ?>
        </div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">

        <div class="card">

            <label>Nombre</label>
            <input type="text" name="nombre"
                   value="<?= set_value('nombre', $espectaculo['nombre']) ?>" required>

            <label>Descripción</label>
            <textarea name="descripcion" required><?= set_value(
                'descripcion',
                $espectaculo['descripcion']
            ) ?></textarea>

            <div class="fila">
                <input type="date" name="fecha"
                       value="<?= set_value('fecha', $espectaculo['fecha']) ?>" required>
                <input type="time" name="hora"
                       value="<?= set_value('hora', $espectaculo['hora']) ?>" required>
            </div>

            <div class="fila">
                <input type="number" step="0.01" name="precio"
                       value="<?= set_value('precio', $espectaculo['precio']) ?>" required>
                <input type="number" name="disponibles"
                       value="<?= set_value('disponibles', $espectaculo['disponibles']) ?>" required>
            </div>

            <label>Dirección</label>
            <input type="text" name="direccion"
                   value="<?= set_value('direccion', $espectaculo['direccion']) ?>" required>

            <!-- IMAGEN -->
            <?php if (!empty($espectaculo['imagen'])): ?>
                <div class="imagen-contenedor">
                    <p>Imagen actual:</p>
                    <img src="<?= base_url($espectaculo['imagen']) ?>" alt="Imagen del espectáculo">
                </div>
            <?php endif; ?>

            <!-- NUEVA IMAGEN -->
            <label>Cambiar imagen</label>
            <input type="file" name="imagen" id="imagenNueva" accept="image/*">

            <div id="previewNueva" class="preview oculto">
                <p>Vista previa:</p>
                <img id="imgNueva">
            </div>

        </div>

        <!-- BOTONES EN FILA -->
        <div class="acciones-form">
            <div class="botones-fila">
                <button type="submit">Guardar cambios</button>
                <a href="<?= base_url('administrador') ?>">Cancelar</a>
            </div>
            <p class="texto-explicativo">Guardá los cambios o cancelá para volver al panel sin modificar nada.</p>
        </div>

    </form>
</main>

<script>
document.getElementById('imagenNueva').addEventListener('change', function(e) 
{
    const file = e.target.files[0];
    const preview = document.getElementById('previewNueva');
    const img = document.getElementById('imgNueva');

    if (!file) {
        preview.classList.add('oculto');
        return;
    }

    if (!file.type.startsWith('image/')) {
        alert('El archivo NO es una imagen válida');
        e.target.value = '';
        preview.classList.add('oculto');
        return;
    }

    img.src = URL.createObjectURL(file);
    preview.classList.remove('oculto');
});
</script>
