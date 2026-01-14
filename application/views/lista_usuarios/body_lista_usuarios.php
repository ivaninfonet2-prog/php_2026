<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= isset($titulo) ? $titulo : 'Lista de Usuarios' ?></title>

    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="<?= base_url('activos/css/lista_usuarios/body_lista_usuarios.css'); ?>">
       <link rel="stylesheet" href="<?= base_url('activos/css/confirmacion/modificar_usuario.css'); ?>">
</head>
<body>

<main class="inicio-container" style="background-image: url('<?= isset($fondo) ? $fondo : '' ?>');">

    <!-- Encabezado -->
    <section class="encabezado">
        <h2 class="titulo"><?= isset($titulo) ? $titulo : 'Lista de Usuarios' ?></h2>
        <p class="descripcion">
            Administración de usuarios registrados en el sistema. Desde aquí podés editar o eliminar usuarios existentes.
        </p>
    </section>

    <!-- Contenedor tabla -->
    <section class="tabla-wrapper">
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
                <?php if (!empty($usuarios) && is_array($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= htmlspecialchars($usuario->id_usuario) ?></td>
                            <td><?= htmlspecialchars($usuario->nombre) ?></td>
                            <td><?= htmlspecialchars($usuario->apellido) ?></td>
                            <td><?= htmlspecialchars($usuario->nombre_usuario) ?></td>
                            <td><?= htmlspecialchars($usuario->dni) ?></td>
                            <td class="acciones">
                                <button class="boton editar" onclick="openModal('editar', <?= $usuario->id_usuario ?>)">Editar</button>
                                <button class="boton eliminar" onclick="openModal('eliminar', <?= $usuario->id_usuario ?>)">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="sin-datos">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Texto adicional fuera de la tarjeta -->
    <section class="informacion-adicional">
        <p>Aquí puedes gestionar todos los usuarios. Si deseas más detalles o funciones adicionales, consulta la sección correspondiente en el menú.</p>
    </section>

</main>

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

<script>
    let action = '';
    let itemId = null;

    function openModal(type, id)
    {
        action = type;
        itemId = id;

        if (action === 'eliminar') 
        {
            document.getElementById('modal-titulo').textContent = 'Eliminar Usuario';
            document.getElementById('modal-descripcion').textContent = '¿Estás seguro de que deseas eliminar este usuario?';
            document.getElementById('modal-confirmar').href = '<?= base_url('usuario/eliminar_usuario/'); ?>' + itemId;
        } 
        else if (action === 'editar') 
        {
            document.getElementById('modal-titulo').textContent = 'Editar Usuario';
            document.getElementById('modal-descripcion').textContent = '¿Quieres editar los detalles de este usuario?';
            document.getElementById('modal-confirmar').href = '<?= base_url('usuario/editar_usuario/'); ?>' + itemId;
        }

        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() 
    {
        document.getElementById('modal').style.display = 'none';
    }
</script>

</body>
</html>
