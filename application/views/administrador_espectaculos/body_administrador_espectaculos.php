<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></title>
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador_espectaculos/body_administrador_espectaculos.css'); ?>">
</head>
<body>

<main class="main-content" style="background-image: url('<?= $fondo ?>');">
    <h2 class="titulo"><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></h2>

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
                    <?php if (!empty($espectaculo['imagen'])): ?>
                        <img src="<?= base_url('activos/imagenes/' . htmlspecialchars($espectaculo['imagen'], ENT_QUOTES, 'UTF-8')); ?>" 
                             alt="<?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES, 'UTF-8'); ?>" 
                             class="imagen" loading="lazy">
                    <?php else: ?>
                        <img src="<?= base_url('activos/imagenes/default.jpg'); ?>" alt="Imagen no disponible" class="imagen">
                    <?php endif; ?>

                    <div class="contenido">
                        <h3><?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><strong>Fecha:</strong> <?= date('d/m/Y', strtotime($espectaculo['fecha'])); ?></p>
                        <p><strong>Hora:</strong> <?= date('H:i', strtotime($espectaculo['hora'])); ?></p>
                        <p><strong>Entradas:</strong> <?= htmlspecialchars($espectaculo['disponibles'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Aviso:</strong> <?= isset($espectaculo['aviso']) ? htmlspecialchars($espectaculo['aviso'], ENT_QUOTES, 'UTF-8') : 'Sin aviso'; ?></p>
                        <p><strong>Precio:</strong> <?= isset($espectaculo['precio']) ? '$' . htmlspecialchars($espectaculo['precio'], ENT_QUOTES, 'UTF-8') : 'No definido'; ?></p>
                        <p><strong>Detalles:</strong> <?= isset($espectaculo['detalles']) ? htmlspecialchars($espectaculo['detalles'], ENT_QUOTES, 'UTF-8') : 'Sin detalles'; ?></p>

                        <div class="acciones-tarjeta">
                            <a href="<?= site_url('espectaculos/editar_espectaculo/' . $espectaculo['id_espectaculo']); ?>" class="boton boton-editar">Editar</a>
                            <a href="<?= site_url('espectaculos/eliminar_espectaculo/' . $espectaculo['id_espectaculo']); ?>" class="boton boton-eliminar" onclick="return confirm('¿Eliminar espectáculo y todos sus datos asociados?');">Eliminar</a>
                        </div>
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
    setTimeout(function() 
    {
        var alerta = document.getElementById('mensaje-alerta');
        if (alerta) alerta.style.display = 'none';
    }, 5000);
</script>

</body>
</html>
