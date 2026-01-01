<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario/body_usuario.css'); ?>?v=6.0">
</head>

<body class="usuario-body" style="background-image: url('<?= $fondo; ?>');">

<main class="usuario-main container-fluid">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 text-center animate-in">

            <!-- Título -->
            <h1 class="titulo fade-in">
                Bienvenido
                <?= !empty($nombre) && !empty($apellido) ? $nombre . ' ' . $apellido : 'Usuario'; ?>
            </h1>

            <!-- Subtítulo -->
            <p class="subtitulo fade-in delay-1">
                Explorá tus opciones y disfrutá de la experiencia
            </p>

            <!-- Tarjeta -->
            <section class="usuario-contenido fade-in delay-2">

                <img src="<?= base_url('activos/imagenes/usuario.png'); ?>"
                     alt="Bienvenido"
                     class="welcome-img img-fluid"
                     onerror="this.style.display='none'">

                <p class="body-text">
                    Accedé rápidamente a tus espectáculos favoritos
                    y gestioná tus reservas desde un solo lugar.
                </p>

                <!-- Acciones -->
                <div class="usuario-acciones fade-in delay-3">
                    <a href="<?= site_url('usuario/usuario_espectaculos'); ?>"
                       class="btn btn-espectaculos btn-lg">
                        Ver espectáculos
                    </a>

                    <a href="<?= base_url('usuario/usuario_reservas'); ?>"
                       class="btn btn-reservas btn-lg">
                        Mis reservas
                    </a>
                </div>

            </section>

            <!-- Texto adicional fuera de la tarjeta -->
            <p class="texto-extra fade-in delay-4">
                Recordá que podés consultar disponibilidad, fechas y ubicaciones
                en cualquier momento desde tu panel de usuario.
            </p>

        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
