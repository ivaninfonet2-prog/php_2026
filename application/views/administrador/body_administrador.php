<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Administrador</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlaces a CSS externos -->
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador/body_administrador.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/mensaje_admin.css'); ?>">
</head>
<body>
    <main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
        <div class="botones-container">
            <h2 class="panel-title">Panel de Control</h2>

            <!-- Bloque de mensaje -->
            <?php if ($this->session->flashdata('mensaje')): ?>
                <div class="<?php echo strpos($this->session->flashdata('mensaje'), 'correctamente') !== false ? 'mensaje-exito' : 'mensaje-error'; ?>">
                    <?= $this->session->flashdata('mensaje'); ?>
                </div>
            <?php endif; ?>

            <a href="<?= base_url('administrador/administrador_espectaculos'); ?>" class="boton"> Espectáculos</a>
            <a href="<?= base_url('ventas/mostrar_ventas'); ?>" class="boton"> Ventas</a>
            <a href="<?= base_url('clientes/mostrar_clientes'); ?>" class="boton"> Clientes</a>
            <a href="<?= base_url('administrador/crear_espectaculo'); ?>" class="boton"> Agregar Espectáculo</a>
            <a href="<?= base_url('administrador/administrador_usuarios'); ?>" class="boton"> Usuarios</a>
            <a href="<?= base_url('administrador/crear_usuario'); ?>" class="boton"> Agregar Usuario</a>
        </div>
    </main>
</body>
</html>
