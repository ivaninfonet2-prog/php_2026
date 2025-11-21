
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

            <p class="subtitulo fade-in delay-1">Explorá tus opciones y disfrutá de la experiencia</p>

            <div class="botones fade-in delay-2">
                <a href="<?php echo site_url('espectaculos'); ?>" class="btn btn-espectaculos btn-sm">Ver espectáculos</a>
                <a href="<?php echo base_url('reservar/listar'); ?>" class="btn btn-reservas btn-sm">Mis Reservas</a>
                <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-logout btn-sm">Cerrar sesión</a>
            </div>
        </div>
    </div>
</main>
