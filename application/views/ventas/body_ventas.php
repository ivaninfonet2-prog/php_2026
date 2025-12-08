<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/ventas/body_ventas.css'); ?>">
</head>
<body>
    <main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
        <h1 class="titulo">Ventas</h1>

        <?php if (!empty($ventas)): ?>
            <div class="table-container">
                <table class="ventas-table">
                    <thead>
                        <tr>
                            <th>ID Venta</th>
                            <th>Espectáculo</th>
                            <th>Total</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <td><?= $venta['id_venta'] ?></td>
                                <td><?= $venta['espectaculo_id'] ?></td>
                                <td>$<?= $venta['monto_total'] ?></td>
                                <td><?= $venta['fecha_venta'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Botones de acciones -->
            <div class="acciones">
                <a href="<?= base_url('administrador'); ?>" class="btn volver">Ir a la vista Administrador</a>
                <a href="<?= base_url('login/logout'); ?>" class="btn cerrar">Cerrar sesión</a>
            </div>
        <?php else: ?>
            <p class="no-datos">No hay ventas disponibles.</p>
        <?php endif; ?>
    </main>
</body>
</html>

