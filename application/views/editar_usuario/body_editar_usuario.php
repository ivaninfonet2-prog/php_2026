<link rel="stylesheet" href="<?= base_url('activos/css/editar_usuario/body_editar_usuario.css'); ?>">

<main class="main-content" style="background-image: url('<?= $fondo ?? '' ?>');">

    <!-- TITULO Y DESCRIPCION -->
    <section class="page-header">
        <h1>Editar usuario</h1>
        <p>Modificá la información del usuario seleccionado. Los cambios se aplicarán inmediatamente al guardar.</p>
    </section>

    <!-- TARJETA -->
    <div class="card">

        <div class="card-info">
            Completá los campos que necesites actualizar. Si no ingresás una nueva contraseña, se mantendrá la actual.
        </div>

        <!-- Mensaje de éxito -->
        <?php if ($this->session->flashdata('mensaje_exito')): ?>
            <div class="alert success">
                <?= $this->session->flashdata('mensaje_exito'); ?><br><br>
                <a href="javascript:history.back()" class="btn btn-success">Volver a la vista anterior</a>
            </div>
        <?php endif; ?>

        <!-- Mensaje de error -->
        <?php if ($this->session->flashdata('mensaje')): ?>
            <div class="alert">
                <?= $this->session->flashdata('mensaje'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/editar_usuario/' . ($usuario->id_usuario ?? '')) ?>" method="post">
            <input type="hidden" name="id_usuario" value="<?= $usuario->id_usuario ?? '' ?>">

            <div class="form-grid">

                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" value="<?= set_value('nombre', $usuario->nombre ?? '') ?>" class="<?= form_error('nombre') ? 'error-input' : '' ?>" required>
                    <div class="error-msg"><?= form_error('nombre'); ?></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido" value="<?= set_value('apellido', $usuario->apellido ?? '') ?>" class="<?= form_error('apellido') ? 'error-input' : '' ?>" required>
                    <div class="error-msg"><?= form_error('apellido'); ?></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" value="<?= set_value('email', $usuario->nombre_usuario ?? '') ?>" class="<?= form_error('email') ? 'error-input' : '' ?>" required>
                    <div class="error-msg"><?= form_error('email'); ?></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Contraseña <span class="opcional">(opcional)</span></label>
                    <input type="password" name="password" class="<?= form_error('password') ? 'error-input' : '' ?>">
                    <div class="error-msg"><?= form_error('password'); ?></div>
                </div>

            </div>

            <div class="botones-finales">
                <button type="submit" class="btn">Guardar cambios</button>
                <a href="<?= base_url('administrador/lista_usuarios'); ?>" class="btn btn-danger">Cancelar</a>
            </div>

        </form>
    </div>

    <!-- TEXTO DE PIE -->
    <p class="footer-text">Asegurate de revisar todos los datos antes de guardar los cambios.</p>

</main>
