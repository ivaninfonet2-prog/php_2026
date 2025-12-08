<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/crear_espectaculo/body_crear_espectaculo.css') ?>">
</head>

<body>
<main class="main-content" style="background-image: url('<?= $fondo ?>');">

    <!-- Botones fuera de la tarjeta -->
    <div class="top-buttons-outside">
        <a href="<?= base_url('administrador') ?>" class="btn btn-secondary">Volver al Panel</a>
        <a href="<?= base_url('login/logout') ?>" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <div class="card">
        <h2><?= $titulo ?></h2>

        <!-- Error de imagen -->
        <?php if (isset($error_imagen)): ?>
            <div class="alert alert-danger"><?= $error_imagen ?></div>
        <?php endif; ?>

        <!-- Errores de validación -->
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <?= form_open_multipart(); ?>

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                       value="<?= set_value('nombre') ?>" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required><?= set_value('descripcion') ?></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control"
                           value="<?= set_value('fecha') ?>" required>
                </div>
                <div class="form-group">
                    <label for="hora">Hora</label>
                    <input type="time" name="hora" id="hora" class="form-control"
                           value="<?= set_value('hora') ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" name="precio" id="precio" class="form-control"
                           step="0.01" value="<?= set_value('precio') ?>" required>
                </div>
                <div class="form-group">
                    <label for="disponibles">Disponibles</label>
                    <input type="number" name="disponibles" id="disponibles" class="form-control"
                           value="<?= set_value('disponibles') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control"
                       value="<?= set_value('direccion') ?>" required>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control" required>
            </div>

            <button type="submit" class="btn">Crear Espectáculo</button>

        <?= form_close(); ?>
    </div>

</main>


</body>
</html>
