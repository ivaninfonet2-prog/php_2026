<h2>Listado de Clientes</h2>

<!-- CSS personalizado -->
<link rel="stylesheet" href="<?= base_url('activos/css/clientes/body_clientes.css'); ?>">

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">
    <?php if (!empty($clientes)): ?>
        <div class="table-container">
            <table class="clientes-table">
                <thead>
                    <tr>
                        <th>ID Cliente</th>
                        <th>Usuario ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['id_cliente'] ?></td>
                            <td><?= $cliente['usuario_id'] ?></td>
                            <td><?= $cliente['nombre'] ?></td>
                            <td><?= $cliente['dni'] ?></td>
                            <td><?= $cliente['telefono'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Botones debajo de la tabla -->
        <div class="botones-acciones">
            <a href="<?= base_url('administrador'); ?>" class="btn volver">Volver al panel</a>
            <a href="<?= base_url('login/logout'); ?>" class="btn cerrar">Cerrar sesión</a>
        </div>

    <?php else: ?>
        <p class="no-datos"><?= isset($mensaje) ? $mensaje : 'No hay datos disponibles.' ?></p>
    <?php endif; ?>
</main>
