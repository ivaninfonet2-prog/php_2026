<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/registro_exitoso/body_registro_exitoso.css'); ?>">
</head>

<body style="background-image: url('<?= $fondo; ?>');">

    <main class="inicio-container">

        <!-- TEXTO SUPERIOR (FUERA DE LA TARJETA) -->
        <section class="mensaje-superior">
            <h2>¡Bienvenido a UNLa Tienda!</h2>
            <p>Tu registro se completó correctamente. Estás a un paso de comenzar.</p>
        </section>

        <!-- TARJETA -->
        <div class="contenido">
            <h1 class="titulo">Registro Exitoso</h1>
            <p class="mensaje">Tu cuenta ha sido creada correctamente.</p>
            <p class="submensaje">Ya podés explorar todas nuestras funcionalidades.</p>

            <div class="botones">
                <a href="<?= base_url('principal'); ?>" class="boton boton-verde">
                    Página Principal
                </a>
                <a href="<?= base_url('login'); ?>" class="boton boton-azul">
                    Loguearse
                </a>
            </div>
        </div>

    </main>

</body>
</html>
