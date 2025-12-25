<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva Exitosa</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/reserva_exitosa/body_reserva_exitosa.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <div class="fondo-animado"></div>

    <main class="contenido">

        <!-- TÍTULO -->
        <h1 class="titulo-principal">Reserva Exitosa</h1>

        <!-- TEXTO DEBAJO DEL TÍTULO -->
        <div class="texto-intro">
            <p>
                Tu reserva se registró correctamente y ya está confirmada.
            </p>

            <p>
                Te enviamos un correo electrónico con todos los detalles.  
                Recordá llegar al menos <strong>15 minutos antes</strong> del horario programado.
            </p>

            <p class="agradecimiento">
                ¡Gracias por elegirnos! Nuestro equipo está listo para recibirte.
            </p>
        </div>

        <!-- TARJETA -->
        <div class="contenedor-mensaje">
            <p class="texto-tarjeta">
                Podés revisar el estado de tu reserva desde tu perfil.
            </p>

            <a href="<?= site_url('usuario') ?>" class="boton">
                Volver a Usuario
            </a>
        </div>

    </main>

</body>
</html>
