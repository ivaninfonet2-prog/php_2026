<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="<?= base_url('activos/css/lista_usuarios/body_lista_usuarios.css'); ?>">
</head>
<body>
<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">

    <h2 class="titulo-tabla"><?= $titulo ?></h2>

    <div class="tabla-container">
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario->id_usuario ?></td>
                            <td><?= $usuario->nombre ?></td>
                            <td><?= $usuario->apellido ?></td>
                            <td><?= $usuario->nombre_usuario ?></td>
                            <td><?= $usuario->dni ?></td>
                            <td>
                                <a href="<?= base_url('administrador/editar_usuario/'.$usuario->id_usuario) ?>" class="boton-accion editar">Editar</a>
                                <a href="<?= base_url('administrador/eliminar_usuario/'.$usuario->id_usuario) ?>" class="boton-accion eliminar" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

</main>
</body>
</html>
