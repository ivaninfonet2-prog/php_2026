<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $titulo; ?></title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?= base_url('activos/css/body_footer/body_footer_acerca.css'); ?>">
</head>

<body class="background-image" style="background-image: url('<?= $fondo; ?>');">

  <!-- Sección de introducción -->
  <section class="intro-text container text-center">
    <h1 class="titulo-principal">Bienvenido a nuestra plataforma</h1>
    <p>Un espacio pensado para estudiantes</p>
  </section>

  <!-- Sección principal de contenido -->
  <main class="main-content container d-flex flex-column align-items-center">
    
    <!-- Cuadro con información sobre la plataforma -->
    <div class="cuadro-acerca mt-4">
      <h2 class="animated-title"><?= $titulo; ?></h2>
      <p class="animated-text">
        Te ofrecemos productos y actividades diseñadas para acompañarte en tu vida universitaria.
      </p>
      <p class="extra-info">
        Explora nuestras secciones y descubre beneficios, eventos y contenido exclusivo para nuestra comunidad.
      </p>
    </div>

    <!-- Texto debajo de la tarjeta -->
    <div class="texto-debajo mt-4">
      <p>¡Aprovecha todas las herramientas y recursos que tenemos para ti!</p>
    </div>

  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
