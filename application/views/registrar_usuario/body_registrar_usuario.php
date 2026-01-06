<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?= base_url('activos/css/registrar_usuario/body_registrar_usuario.css'); ?>">
</head>
<body style="background-image: url('<?= $fondo; ?>');">

  <main class="registro-container">
    <!-- Texto encima de la tarjeta -->
    <div class="registro-texto-encima">
      <h2>Bienvenido, por favor regístrate para continuar</h2>
      <p>Rellena tus datos personales para crear una cuenta y acceder a todos nuestros servicios.</p>
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
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" required>
          </div>
        </div>

        <!-- DNI / Teléfono -->
        <div class="form-group-row">
          <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" class="form-control" name="dni" id="dni" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" required>
          </div>
        </div>

        <!-- Email / Contraseña -->
        <div class="form-group-row">
          <div class="form-group">
            <label for="nombre_usuario">Email</label>
            <input type="email" class="form-control" name="nombre_usuario" id="nombre_usuario" required>
          </div>
          <div class="form-group">
            <label for="palabra_clave">Contraseña</label>
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
  </main>

  <!-- Texto debajo de la tarjeta -->
  <div class="registro-texto-debajo">
    <p>Al registrarte aceptas nuestros Términos y Condiciones y la Política de Privacidad.</p>
  </div>

  <!-- Bootstrap JS (sin jQuery) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>