<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/crear_espectaculo/body_crear_espectaculo.css') ?>">
</head>
<body>
<main class="main-content" style="background-image: url('<?= $fondo ?>');">

    <!-- ENCABEZADO -->
    <div class="page-header">
        <h1><?= $titulo ?></h1>
        <p>Complete los datos del espectáculo. La imagen es opcional.</p>
    </div>

    <!-- TARJETA DE FORMULARIO -->
    <div class="card">

        <!-- MENSAJES -->
        <?php if ($this->session->flashdata('error_imagen')): ?>
            <div class="alert error"><?= $this->session->flashdata('error_imagen') ?></div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert success"><?= $this->session->flashdata('success') ?></div>
        <?php endif; ?>

        <!-- FORMULARIO -->
        <?= form_open_multipart(); ?>

            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= set_value('nombre') ?>" required>

            <label>Descripción</label>
            <textarea name="descripcion" required><?= set_value('descripcion') ?></textarea>

            <div class="fila">
                <input type="date" name="fecha" value="<?= set_value('fecha') ?>" required>
                <input type="time" name="hora" value="<?= set_value('hora') ?>" required>
            </div>

            <div class="fila">
                <input type="number" step="0.01" name="precio" placeholder="Precio" value="<?= set_value('precio') ?>" required>
                <input type="number" name="disponibles" placeholder="Disponibles" value="<?= set_value('disponibles') ?>" required>
            </div>

            <label>Dirección</label>
            <input type="text" name="direccion" value="<?= set_value('direccion') ?>" required>

            <label>Imagen</label>
            <input type="file" name="imagen" id="imagenInput" accept="image/*">

            <div id="preview" class="preview oculto">
                <p>Vista previa:</p>
                <img id="previewImg">
            </div>

            <div class="acciones">
                <button type="submit">Crear espectáculo</button>
                <a href="<?= base_url('administrador') ?>">Cancelar</a>
            </div>

        <?= form_close(); ?>
    </div>

    <!-- TEXTO ABAJO -->
    <div class="texto-bajo">
        <p>Si necesitas ayuda o tienes preguntas, contacta con el administrador del sistema.</p>
    </div>

</main>

<script>
document.getElementById('imagenInput').addEventListener('change', function(e) 
{
    const file = e.target.files[0];
    const preview = document.getElementById('preview');
    const img = document.getElementById('previewImg');

    if ( !file) 
    {
        preview.classList.add('oculto');
        return;
    }

    if ( !file.type.startsWith('image/')) 
    {
        alert('El archivo seleccionado NO es una imagen');
        e.target.value = '';
        preview.classList.add('oculto');
        return;
    }

    img.src = URL.createObjectURL(file);
    preview.classList.remove('oculto');
});
</script>

</body>
</html>
