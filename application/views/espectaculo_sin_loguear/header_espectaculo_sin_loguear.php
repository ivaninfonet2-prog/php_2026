<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'UNLa Tienda'; ?></title>

    <!-- CSS del header (versionado para evitar cache) -->
    <link rel="stylesheet"
          href="<?= base_url('activos/css/espectaculo_sin_loguear/header_espectaculo_sin_loguear.css?v=' . time()); ?>">
</head>

<body>

<!-- HEADER -->
<header class="main-header">
    <div class="header-container">

        <!-- Logo + título -->
        <a href="<?= base_url(); ?>" class="brand">
            <img
                src="<?= base_url('activos/imagenes/logo.jpg'); ?>"
                alt="Logo UNLa Tienda"
                class="logo-img"
            >
            <span class="site-title">UNLa Tienda</span>
        </a>

        <!-- Acción -->
        <nav class="nav-menu">
            <a href="<?= base_url(); ?>" class="btn-login">
                Ir al Inicio
            </a>
        </nav>

    </div>
</header>

</body>
</html>
