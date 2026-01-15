<!-- Enlazamos el CSS exclusivo para el login -->
<link rel="stylesheet" href="<?= base_url('activos/css/login/body_login.css?v=' . time()) ?>">

<div class="login-bg" style="background-image: url('<?= $fondo ?>');">

    <div class="login-wrapper">

        <!-- ENCABEZADO -->
        <div class="login-header">
            <h1><?= $titulo ?></h1>
            <p>Ingresá con tu usuario para acceder a todos los eventos</p>
        </div>

        <!-- TARJETA LOGIN -->
        <div class="login-card">

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <p class="login-text">Completá tus datos para iniciar sesión</p>

            <?= form_open('login/autenticar'); ?>

                <label for="nombre_usuario_input">Usuario</label>
                <input
                    type="text"
                    id="nombre_usuario_input"
                    name="nombre_usuario"
                    class="form-control"
                    placeholder="Ingresá tu usuario"
                    required
                >

                <label for="palabra_clave_input">Contraseña</label>
                <input
                    type="password"
                    id="palabra_clave_input"
                    name="palabra_clave"
                    class="form-control"
                    placeholder="Ingresá tu contraseña"
                    required
                >

                <div class="login-actions">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                    <a href="<?= site_url('registrar'); ?>" class="btn btn-success">Registrarme</a>
                </div>

            <?= form_close(); ?>

        </div>

        <!-- TEXTO DEBAJO DE LA TARJETA -->
        <div class="login-extra">
            ¿Todavía no tenés cuenta?
            <span>Registrate y empezá a disfrutar de nuestros espectáculos</span>
        </div>

    </div>
</div>
