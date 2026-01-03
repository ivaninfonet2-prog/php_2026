<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/registrar_usuario/body_registrar_usuario.css'); ?>">
</head>

<body>

<header class="main-header">

    <div class="header-container">

        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                class="logo-img"
                alt="Logo UNLa Tienda"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Botón a la derecha -->
        <nav class="nav-menu">
            <a href="<?= base_url(); ?>" class="btn btn-login">
                Ir al Inicio
            </a>
        </nav>

    </div>

</header>

<main class="registro-container" style="background-image: url('<?= $fondo; ?>');">

    <!-- Texto encima de la tarjeta -->
    <div class="registro-texto-encima">
        <h2 class="titulo-encima">Bienvenido, por favor regístrate para continuar</h2>
        <p class="subtitulo-encima">
            Rellena tus datos personales para crear una cuenta y acceder a todos nuestros servicios.
        </p>
    </div>

    <!-- Tarjeta de registro -->
    <div class="registro-form">
        
        <!-- Aviso de error -->
        <?php if (isset($error)): ?>
            <div class="alert-danger">
                <strong>Atención:</strong> <?= $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('registrar/registrar_usuario'); ?>" autocomplete="off">

            <!-- Nombre / Apellido -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="w-50">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" required>
                </div>
            </div>

            <!-- DNI / Teléfono -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni" id="dni" required>
                </div>
                <div class="w-50">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" required>
                </div>
            </div>

            <!-- Email / Contraseña -->
            <div class="form-group-row">
                <div class="w-50">
                    <label for="nombre_usuario" class="form-label">Email</label>
                    <input type="email" class="form-control" name="nombre_usuario" id="nombre_usuario" required>
                </div>
                <div class="w-50">
                    <label for="palabra_clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="palabra_clave" id="palabra_clave" required autocomplete="new-password">
                </div>
            </div>

            <!-- Botones -->
            <div class="botones">
                <button type="submit" class="btn btn-success">Registrar</button>
                <a href="<?= site_url('login'); ?>" class="btn btn-primary">Iniciar sesión</a>
            </div>
        </form>
    </div>

    <!-- Texto debajo de la tarjeta -->
    <div class="registro-texto-debajo">
        <p>Al registrarte aceptas nuestros Términos y Condiciones y la Política de Privacidad.</p>
    </div>
</main>

</body>
</html>
