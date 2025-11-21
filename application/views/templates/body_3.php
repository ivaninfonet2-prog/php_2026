<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- CSS de body_3 -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/body_3.css'); ?>">

    <!-- CSS de vista_usuario -->
    <link rel="stylesheet" href="<?php echo base_url('activos/css/vista_usuario.css'); ?>">
</head>
<body>
    <main class="usuario-main container-fluid">
        <div class="row justify-content-center align-items-center usuario-contenido">
            <div class="col-12 text-center animate-in">
                
                <img src="<?php echo base_url('activos/imagenes/usuario.png'); ?>" 
                     alt="Bienvenido" 
                     class="welcome-img img-fluid" 
                     onerror="this.style.display='none'">

                <h1 class="titulo fade-in">
                    Bienvenido <?php echo $nombre . ' ' . $apellido; ?>
                </h1>

                <p class="subtitulo fade-in delay-1">
                    Explorá tus opciones y disfrutá de la experiencia
                </p>

                <div class="botones fade-in delay-2">
                    <a href="<?php echo site_url('espectaculos'); ?>" class="btn btn-espectaculos btn-sm">Ver espectáculos</a>
                    <a href="<?php echo base_url('reservar/listar'); ?>" class="btn btn-reservas btn-sm">Mis Reservas</a>
                    <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-logout btn-sm">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
