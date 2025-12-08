<!DOCTYPE html>
<html lang="es">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>

    <!-- CSS principal del login -->
    <link rel="stylesheet" href="<?= base_url('activos/css/login/body_login.css'); ?>">

    <!-- Bootstrap opcional -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<main class="body-login" style="background-image: url('<?= $fondo ?>');">

    <div class="login-container">

        <!-- Texto fuera de la tarjeta -->
        <h1 class="titulo-login">Bienvenido a UNLa Tienda</h1>
        <p class="subtitulo-login">Accede a tu cuenta y descubre más beneficios.</p>

        <!-- Formulario -->
        <form action="<?= base_url('login/autenticar'); ?>" 
              method="post" 
              class="login-form" 
              autocomplete="off">

            <p class="login-description mb-4">
                Bienvenido a <strong>UNLa Tienda login</strong>. Ingresa tus credenciales para acceder a tu cuenta.
            </p>

            <!-- Mensaje de error -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Usuario -->
            <div class="mb-3">
                <label for="nombre_usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario"
                       placeholder="Ingresa tu usuario" required autocomplete="off">
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="palabra_clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="palabra_clave" name="palabra_clave"
                       placeholder="Ingresa tu contraseña" required autocomplete="new-password">
            </div>

            <!-- Botones -->
            <div class="login-buttons">
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <a href="<?= site_url('registrar'); ?>" class="btn btn-success">Regístrate</a>
            </div>

            <!-- Extra -->
            <div class="login-extra text-center mt-3">
                <p class="registro-text">
                    ¿No tienes cuenta todavía? <br>
                    <span class="highlight">¡Únete a nuestra comunidad!</span>
                </p>
            </div>
        </form>
    </div>
</main>

=======
    <meta charset="utf-8">
    <title><?= $titulo ?></title>
    <!-- Enlace al CSS del body -->
    <link rel="stylesheet" href="<?= base_url('activos/css/login/body_login.css'); ?>">
    <!-- Bootstrap si lo usas -->
    <link rel="stylesheet" href="<?= base_url('activos/css/bootstrap.min.css'); ?>">
</head>
<body>
<div class="body-login"
     style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
            url('<?= $fondo ?>') no-repeat center center fixed;
            background-size: cover;">

    <!-- Sección dinámica con el formulario -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-4 col-sm-8 col-10 animate__animated animate__fadeInUp">
            <?= $contenido ?> <!-- Aquí se inserta formulario_login -->
        </div>
    </div>

    <!-- Botón volver colocado más arriba -->
    <div class="volver-inicio text-center mt-4">
        <a href="<?php echo site_url('principio'); ?>" class="btn btn-secondary">Volver al inicio</a>
    </div>
 
 
    <!-- Sección extra decorativa -->
    <div class="row mt-5">
        <div class="col-12 text-center animate__animated animate__zoomIn">
            <h3 class="mensaje-bienvenida">¡Disfrutá de nuestros espectáculos!</h3>
            <p class="mensaje-sub">Explorá la cartelera y viví experiencias únicas.</p>
        </div>
    </div>
</div>
>>>>>>> da0aeb1fb2f7b6372806ff3804e884ba9fe2557f
</body>
</html>
