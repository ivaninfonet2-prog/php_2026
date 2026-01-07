<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo ?></title>
  <!-- CSS del Login -->
  <link rel="stylesheet" href="<?= base_url('activos/css/login/body_login.css'); ?>">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <main class="login-bg" style="background-image: url('<?= $fondo ?>');">
    <section class="login-wrapper">
      <!-- ENCABEZADO (TÍTULO + DESCRIPCIÓN) -->
      <header class="login-header">
        <h1>Bienvenido a UNLa Tienda</h1>
        <p>Accede a tu cuenta y descubre más beneficios</p>
      </header>

      <!-- TARJETA LOGIN -->
      <form class="login-card" action="<?= base_url('login/autenticar'); ?>" method="post" autocomplete="off">
        <!-- Texto introductorio dentro de la tarjeta -->
        <p class="login-text">
          Bienvenido a <strong>UNLa Tienda</strong>. Ingresa tus credenciales para continuar.
        </p>

        <!-- Alerta de error -->
        <?php if ($this->session->flashdata('error')): ?>
          <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>

        <!-- Input Usuario -->
        <div class="mb-4">
          <label for="nombre_usuario">Usuario</label>
          <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Ingresa tu usuario" required>
        </div>

        <!-- Input Contraseña -->
        <div class="mb-4">
          <label for="palabra_clave">Contraseña</label>
          <input type="password" id="palabra_clave" name="palabra_clave" class="form-control" placeholder="Ingresa tu contraseña" required>
        </div>

        <!-- Botones -->
        <div class="login-actions">
          <button type="submit" class="btn btn-primary">Ingresar</button>
          <a href="<?= site_url('registrar'); ?>" class="btn btn-success">Registrarse</a>
        </div>
      </form>

      <!-- TEXTO FUERA DE LA TARJETA -->
      <div class="login-extra">
        <p>¿No tienes cuenta todavía?</p>
        <span>Únete a la comunidad de UNLa Tienda y empezá a disfrutar beneficios exclusivos.</span>
      </div>
    </section>
  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
