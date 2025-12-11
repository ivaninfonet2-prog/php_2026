<main class="registro-container" style="background-image: url('<?= $fondo; ?>');">
    
    <!-- Texto fuera de la tarjeta -->
    <div class="registro-texto-encima">
        <h2 class="titulo-encima">Bienvenido, por favor regístrate para continuar</h2>
        <p class="subtitulo-encima">Rellena tus datos personales para crear una cuenta y acceder a todos nuestros servicios.</p>
    </div>

    <div class="registro-form">
        
        <!-- Aviso de error -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <strong>Atención:</strong> <?= $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('registrar/registrar_usuario'); ?>" autocomplete="off">

            <!-- Nombre / Apellido -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>
                <div class="w-50">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" required>
                </div>
            </div>

            <!-- DNI / Teléfono -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" required>
                </div>
                <div class="w-50">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" required>
                </div>
            </div>

            <!-- Email / Contraseña -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="nombre_usuario" class="form-label">Email</label>
                    <input type="email" class="form-control" name="nombre_usuario" required>
                </div>
                <div class="w-50">
                    <label for="palabra_clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="palabra_clave" required autocomplete="new-password">
                </div>
            </div>

            <!-- Botones -->
            <div class="botones">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="<?= site_url('login'); ?>" class="btn btn-primary">Iniciar sesión</a>
            </div>
        </form>

        <!-- Bloque de iniciar sesión -->
        <div class="registro-registered">
            <p>¿Ya tienes una cuenta?</p>
        </div>
    </div>
</main>

<!-- Enlace al archivo CSS del body -->
<link rel="stylesheet" href="<?= base_url('activos/css/registrar_usuario/body_registrar_usuario.css'); ?>">
