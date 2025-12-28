<!-- Enlace al CSS específico del body -->
<link rel="stylesheet" href="<?= base_url('activos/css/clientes/body_clientes.css'); ?>">

<main class="inicio-container" style="background-image: url('<?= $fondo ?>');">

    <!-- Encabezado -->
    <header class="header-text">
        <h2>Listado de Clientes</h2>
        <p>
            A continuación se muestran todos los clientes registrados en el sistema,
            junto con sus datos de contacto y correo electrónico asociado.
        </p>
    </header>

    <?php if (!empty($clientes)): ?>
        <section class="table-container">
            <table class="clientes-table">
                <thead>
                    <tr>
                        <th>ID Cliente</th>
                        <th>Email</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?= $cliente['id_cliente']; ?></td>
                            <td><?= $cliente['email']; ?></td>
                            <td><?= $cliente['nombre']; ?></td>
                            <td><?= $cliente['dni']; ?></td>
                            <td><?= $cliente['telefono']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    <?php else: ?>
        <p class="no-datos">
            <?= $mensaje ?? 'No hay datos disponibles.' ?>
        </p>
    <?php endif; ?>

</main>
