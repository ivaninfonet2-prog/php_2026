<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="<?= base_url('activos/css/administrador_espectaculos/body_administrador_espectaculos.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/modificar_espectaculo.css'); ?>">
</head>
<body>

<main class="main-content" style="background-image: url('<?= htmlspecialchars($fondo, ENT_QUOTES); ?>');">

    <!-- ENCABEZADO -->
    <section class="encabezado-seccion">
        <h1 class="titulo-principal"><?= htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p class="descripcion-principal">
            Administración de espectáculos disponibles. Desde aquí podés editar, eliminar o revisar la información de cada evento.
        </p>
    </section>

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

                    <!-- Imagen del espectáculo -->
                    <?php
                        $img_url = !empty($espectaculo['imagen']) 
                            ? base_url('activos/imagenes/' . htmlspecialchars($espectaculo['imagen'], ENT_QUOTES)) 
                            : base_url('activos/imagenes/default.jpg');
                    ?>
                    <img src="<?= $img_url ?>" alt="<?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES); ?>" class="imagen" loading="lazy">

                    <!-- Información principal -->
                    <div class="contenido-info">
                        <h3 class="nombre-artista"><?= htmlspecialchars($espectaculo['nombre'], ENT_QUOTES); ?></h3>
                        <p class="descripcion-artista">
                            <?= !empty($espectaculo['descripcion']) ? htmlspecialchars($espectaculo['descripcion'], ENT_QUOTES) : 'Sin descripción disponible'; ?>
                        </p>
                    </div>

                    <!-- Detalles adicionales -->
                    <div class="contenido">
                        <p><strong>Fecha:</strong> <?= date('d/m/Y', strtotime($espectaculo['fecha'])); ?></p>
                        <p><strong>Hora:</strong> <?= date('H:i', strtotime($espectaculo['hora'])); ?></p>
                        <p><strong>Dirección:</strong> <?= htmlspecialchars($espectaculo['direccion'], ENT_QUOTES); ?></p>
                        <p><strong>Entradas disponibles:</strong> <?= htmlspecialchars($espectaculo['disponibles'], ENT_QUOTES); ?></p>
                        <p><strong>Precio:</strong> <?= isset($espectaculo['precio']) && !empty($espectaculo['precio']) ? '$' . htmlspecialchars($espectaculo['precio'], ENT_QUOTES) : 'No definido'; ?></p>

                        <!-- Acciones -->
                        <div class="acciones-tarjeta">
                            <button class="boton boton-editar" onclick="openModal('editar', <?= $espectaculo['id_espectaculo']; ?>)">Editar</button>
                            <button class="boton boton-eliminar" onclick="openModal('eliminar', <?= $espectaculo['id_espectaculo']; ?>)">Eliminar</button>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="mensaje-vacio">No hay espectáculos disponibles en este momento.</p>
    <?php endif; ?>

    <!-- Texto adicional -->
    <p class="texto-adicional">
        ¡Aprovechá para ver los espectáculos más recientes y gestionarlos con facilidad desde este panel!
    </p>

    <!-- Modal de Confirmación -->
    <div id="modal" class="confirmacion-container" style="display: none;">
        <div class="confirmacion-card">
            <h1 id="modal-titulo">¿Estás seguro?</h1>
            <p id="modal-descripcion">¿Quieres proceder con esta acción?</p>
            <div class="acciones">
                <a href="#" id="modal-confirmar" class="btn confirmar">Confirmar</a>
                <button onclick="closeModal()" class="btn cancelar">Cancelar</button>
            </div>
        </div>
    </div>

</main>

<script>
    let action = '';
    let itemId = null;

    function openModal(type, id) {
        action = type;
        itemId = id;

        if (action === 'eliminar') {
            document.getElementById('modal-titulo').textContent = 'Eliminar Espectáculo';
            document.getElementById('modal-descripcion').textContent = '¿Estás seguro de que deseas eliminar este espectáculo y todos sus datos asociados?';
            document.getElementById('modal-confirmar').href = '<?= site_url('espectaculos/eliminar_espectaculo/'); ?>' + itemId;
        } else if (action === 'editar') {
            document.getElementById('modal-titulo').textContent = 'Editar Espectáculo';
            document.getElementById('modal-descripcion').textContent = '¿Quieres editar los detalles de este espectáculo?';
            document.getElementById('modal-confirmar').href = '<?= site_url('espectaculos/editar_espectaculo/'); ?>' + itemId;
        }

        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }

    setTimeout(() => {
        const alerta = document.getElementById('mensaje-alerta');
        if (alerta) alerta.style.display = 'none';
    }, 5000);
</script>

</body>
</html>
