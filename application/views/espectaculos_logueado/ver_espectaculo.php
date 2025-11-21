
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $espectaculo['nombre']; ?></title>
  <link rel="stylesheet" href="<?= base_url('activos/css/espectaculos/ver_espectaculo.css'); ?>" />
</head>
<body>

  <main class="container">
    <section class="card">
      <h1 class="titulo"><?= $espectaculo['nombre']; ?></h1>

      <div class="imagen-wrapper">
        <img src="<?= base_url('./activos/imagenes/' . $espectaculo['imagen']) ?>" alt="<?= $espectaculo['nombre'] ?>" class="imagen" />
      </div>

      <p class="entradas"> Entradas disponibles: <strong><?= $espectaculo['disponibles']; ?></strong></p>

      <?php if (!empty($mensaje)): ?>
        <div class="mensaje"><?= $mensaje; ?></div>
      <?php endif; ?>

      <?php if ($espectaculo['disponibles'] > 0): ?>
        <form method="post" action="<?= site_url('reservar/procesar/' . $espectaculo['id_espectaculo']); ?>" class="formulario">
          <label for="cantidad_entradas">Cantidad:</label>
          <input type="number" name="cantidad_entradas" id="cantidad_entradas" min="1" max="<?= $espectaculo['disponibles']; ?>" required />

          <div class="botones">
            <button type="submit" class="btn reservar">Reservar</button>
            <a href="<?= site_url('usuario') ?>" class="btn volver">Volver</a>
          </div>
        </form>
      <?php else: ?>
        <div class="error"> Entradas agotadas.</div>
        <div class="botones">
          <a href="<?= site_url('usuario') ?>" class="btn volver">Volver</a>
        </div>
      <?php endif; ?>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; <?= date('Y'); ?> Eventos Buenos Aires. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
