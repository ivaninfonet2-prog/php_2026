<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva Exitosa</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/reserva_exitosa/body_reserva_exitosa.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <!-- Capa de fondo animado que no afecta al header ni footer -->
    <div class="fondo-animado"></div>

    <main class="contenido">

        <!-- TÍTULO -->
        <h1 class="titulo-principal">¡Reserva confirmada!</h1>

        <!-- MENSAJE BREVE -->
        <div class="texto-intro">
            <p>
                Tu reserva se registró correctamente y ya está confirmada.
            </p>
        </div>

        <!-- TARJETA -->
        <div class="contenedor-mensaje">

            <div class="detalle-reserva">
                <p>
                    Te enviamos un correo electrónico con todos los detalles de tu reserva.
                </p>

                <p>
                    Recordá llegar al menos <strong>15 minutos antes</strong> del horario programado.
                </p>

                <p class="agradecimiento">
                    Gracias por elegirnos. ¡Te esperamos!
                </p>
            </div>

            <!-- ACCIONES (botones de acción) -->
            <div class="acciones">
                <a href="<?= site_url('usuario/usuario_espectaculos') ?>" class="boton boton-espectaculos">
                    Ver Espectáculos
                </a>

                <a href="<?= site_url('usuario/usuario_reservas') ?>" class="boton boton-reservas">
                    Mis Reservas
                </a>
            </div>

        </div>

        <!-- TEXTO DEBAJO DE LA TARJETA -->
        <div class="texto-debajo">
            <p>
                Si tienes alguna duda sobre tu reserva, puedes contactarnos a través de nuestro correo de soporte o llamar a nuestra línea de atención al cliente.
            </p>
        </div>

    </main>

</body>
</html>
