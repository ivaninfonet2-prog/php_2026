<div class="table-container">

    <h2 class="table-title">Listado de Usuarios</h2>

    <!-- Botón para agregar usuario -->
    <a href="<?= base_url('usuario/agregar'); ?>" class="btn btn-add">+ Agregar Usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Detalle</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $u): ?>
                    <tr>
                        <td><?= $u->id_usuario ?></td>
                        <td><?= $u->nombre ?></td>
                        <td><?= $u->apellido ?></td>
                        <td><?= $u->nombre_usuario ?></td>

                        <td>
                            <a href="<?= base_url('usuario/ver/'.$u->id_usuario) ?>" 
                               class="btn btn-warning btn-sm">Ver Detalles</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align:center; padding: 20px;">
                        No hay usuarios registrados.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
