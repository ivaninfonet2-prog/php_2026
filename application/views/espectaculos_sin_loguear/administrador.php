
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Espectáculos</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/index_espectaculos_logueado.css'); ?>">
</head>
<body>

<main class="main-content">
    <h2 class="titulo">Espectáculos</h2>

    <!-- Mensaje Flash -->
    <?php if ($this->session->flashdata('mensaje')): ?>
        <div class="alerta" id="mensaje-alerta">
            <?= htmlspecialchars($this->session->flashdata('mensaje'), ENT_QUOTES, 'UTF-8'); ?>
            <span class="cerrar-alerta" onclick="document.getElementById('mensaje-alerta').style.display='none';">&times;</span>
        </div>
    <?php endif; ?>

    <!-- Listado de espectáculos -->
    <?php if (!empty($espectaculos)): ?>
        <div class="contenedor-tarjetas">
            <?php foreach ($espectaculos as $espectaculo): ?>
                <div class="tarjeta">
                    <img 
                        src="<?= base_url('activos/imagenes/' . htmlspecialchars($espectaculo->imagen, ENT_QUOTES, 'UTF-8')); ?>" 
                        alt="<?= htmlspecialchars($espectaculo->nombre, ENT_QUOTES, 'UTF-8'); ?>" 
                        class="imagen" 
                        loading="lazy"
                    >
                    <div class="contenido">
                        <h3><?= htmlspecialchars($espectaculo->nombre, ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><strong>Fecha:</strong> <?= date('d/m/Y', strtotime($espectaculo->fecha)); ?></p>
                        <p><strong>Hora:</strong> <?= date('H:i', strtotime($espectaculo->hora)); ?></p>
                        <p><strong>Entradas:</strong> <?= htmlspecialchars($espectaculo->disponibles, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Aviso:</strong> <?= htmlspecialchars($espectaculo->aviso, ENT_QUOTES, 'UTF-8'); ?></p>

                        <a href="<?= site_url('espectaculos/editar/' . $espectaculo->id_espectaculo); ?>" class="boton-editar">Editar</a>
                        <a href="<?= site_url('espectaculos/eliminar/' . $espectaculo->id_espectaculo); ?>" class="boton-eliminar" onclick="return confirm('¿Eliminar espectáculo y todos sus datos asociados?');">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="mensaje-vacio">No hay espectáculos disponibles en este momento.</p>
    <?php endif; ?>

    <div class="acciones">
        <a href="<?= base_url('administrador'); ?>" class="boton">Volver al Panel</a>
        <a href="<?= site_url('login/logout'); ?>" class="boton">Cerrar Sesión</a>
    </div>
</main>

<!-- Script para ocultar alerta automáticamente -->
<script>
    setTimeout(function() {
        var alerta = document.getElementById('mensaje-alerta');
        if (alerta) {
            alerta.style.display = 'none';
        }
    }, 5000);
</script>

</body>
</html>
