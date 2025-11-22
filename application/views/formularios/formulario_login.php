<!-- Enlace al CSS del formulario -->
<link rel="stylesheet" href="<?php echo base_url('activos/css/formularios/formulario_login.css'); ?>">

<div class="login-container">
    <!-- Formulario de login conectado al controlador -->
    <form action="<?php echo base_url('login/autenticar'); ?>" 
          method="post" 
          class="login-form" 
          autocomplete="off">

        <!-- Texto de bienvenida -->
        <p class="login-description mb-4">
            Bienvenido a <strong>UNLa Tienda</strong>. Ingresa tus credenciales para acceder a tu cuenta.
        </p>

        <!-- Usuario -->
        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                   placeholder="Ingresa tu usuario" required autocomplete="off" value="">
            <small class="form-text text-muted">Tu nombre de usuario es único y personal.</small>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="palabra_clave" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="palabra_clave" name="palabra_clave"
                   placeholder="Ingresa tu contraseña" required autocomplete="new-password" value="">
            <small class="form-text text-muted">Recuerda mantener tu contraseña segura.</small>
        </div>

        <!-- Botón ingresar -->
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>

    <!-- Sección de registro -->
    <div class="login-extra">
        <p class="registro-text">
            ¿No tienes cuenta todavía? <br>
            <span class="highlight">¡Únete a nuestra comunidad!</span>
        </p>
        <a href="<?php echo site_url('registrar'); ?>" class="btn btn-outline-success registro-btn">
             Regístrate aquí 
        </a>
    </div>
</div>

<!-- Botón de volver al inicio más abajo -->
<div class="volver-inicio">
    <a href="<?php echo site_url('principio/index'); ?>" class="btn btn-secondary">Volver al inicio</a>
</div>
