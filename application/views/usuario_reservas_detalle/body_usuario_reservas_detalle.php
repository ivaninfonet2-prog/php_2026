<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Reserva</title>

    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/body_usuario_reservas_detalle.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('activos/css/usuario_reservas_detalle/aviso_usuario_reservas_detalle.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="contenido">

        <!-- ENCABEZADO -->
        <section class="intro">
            <h1 class="titulo">Detalle de la Reserva</h1>
            <p class="subtitulo">
                Reserva Nº <?= $reserva['id_reserva']; ?> · Revisá toda la información
            </p>
        </section>

        <!-- CONTENEDOR -->
        <section class="detalle-wrapper">

            <!-- DETALLE -->
            <div class="detalle-card">
                <div class="fila">
                    <span>Espectáculo</span>
                    <strong><?= $reserva['nombre_espectaculo']; ?></strong>
                </div>

                <div class="fila">
                    <span>Fecha del espectáculo</span>
                    <strong><?= $reserva['fecha_espectaculo']; ?></strong>
                </div>

                <div class="fila">
                    <span>Cantidad de entradas</span>
                    <strong><?= $reserva['cantidad']; ?></strong>
                </div>

                <div class="fila">
                    <span>Precio unitario</span>
                    <strong>$<?= number_format($reserva['precio'], 2, ',', '.'); ?></strong>
                </div>

                <div class="total">
                    Total abonado:
                    $<?= number_format($reserva['monto_total'], 2, ',', '.'); ?>
                </div>

                <div class="fila">
                    <span>Fecha de reserva</span>
                    <strong><?= $reserva['fecha_reserva']; ?></strong>
                </div>

                <div class="fila">
                    <span>Entradas disponibles</span>
                    <strong><?= $reserva['disponibles']; ?></strong>
                </div>
            </div>

            <!-- MENSAJE / ACCIONES -->
            <?php if ($this->session->flashdata('mensaje_cancelacion')): ?>
                <div class="detalle-card aviso-cancelacion">
                    <?= $this->session->flashdata('mensaje_cancelacion'); ?>
                </div>
            <?php else: ?>
                <div class="acciones">
                    <a href="#aviso-cancelacion" class="boton cancelar">
                        Cancelar reserva
                    </a>

                    <a href="<?= site_url('usuario/usuario_reservas') ?>" class="boton volver">
                        Volver a reservas
                    </a>
                </div>
            <?php endif; ?>

        </section>

    </main>

    <!-- POPUP -->
    <div id="aviso-cancelacion" class="overlay">
        <div class="popup">
            <h2>Confirmar cancelación</h2>
            <p>¿Deseás cancelar esta reserva? Esta acción no se puede deshacer.</p>

            <div class="acciones-popup">
                <a href="<?= base_url('reservar/cancelar_reserva/'.$reserva['id_reserva']); ?>" class="boton confirmar">
                    Sí, cancelar
                </a>
                <a href="#" class="boton volver">
                    No, volver
                </a>
            </div>
        </div>
    </div>

</body>
</html>
