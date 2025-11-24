<!-- Enlace al CSS del formulario -->
<link rel="stylesheet" href="<?= base_url('activos/css/login/formulario_login.css'); ?>">

<form action="<?php echo base_url('login/autenticar'); ?>" 
      method="post" 
      class="login-form" 
      autocomplete="off">

    <p class="login-description mb-4">
        Bienvenido a <strong>UNLa Tienda login</strong>. Ingresa tus credenciales para acceder a tu cuenta.
    </p>

    <!-- Usuario -->
    <div class="mb-3">
        <label for="nombre_usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
               placeholder="Ingresa tu usuario" required autocomplete="off">
        <small class="form-text text-muted">Tu nombre de usuario es único y personal.</small>
    </div>

    <!-- Contraseña -->
    <div class="mb-3">
        <label for="palabra_clave" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="palabra_clave" name="palabra_clave"
               placeholder="Ingresa tu contraseña" required autocomplete="new-password">
        <small class="form-text text-muted">Recuerda mantener tu contraseña segura.</small>
    </div>

    <!-- Botones -->
    <div class="login-buttons">
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <a href="<?php echo site_url('registrar'); ?>" class="btn btn-outline-success">Regístrate</a>
    </div>

    <!-- Extra -->
    <div class="login-extra text-center mt-3">
        <p class="registro-text">
            ¿No tienes cuenta todavía? <br>
            <span class="highlight">¡Únete a nuestra comunidad!</span>
        </p>
    </div>
</form>
