<footer class="main-footer">
    <div class="container text-center">
        <p class="mb-2">&copy; <?= date('Y'); ?> UNLa Tienda. Todos los derechos reservados.</p>

        <ul class="footer-links list-inline mb-3">
            <li class="list-inline-item">
                <a href="<?= base_url('acerca'); ?>" class="footer-link">Acerca de</a>
            </li>
            <li class="list-inline-item">
                <a href="<?= base_url('contacto'); ?>" class="footer-link">Contacto</a>
            </li>
            <li class="list-inline-item">
                <a href="<?= base_url('politicas'); ?>" class="footer-link">Políticas</a>
            </li>
            <li class="list-inline-item">
                <a href="<?= base_url('ayuda'); ?>" class="footer-link">Ayuda</a>
            </li>
        </ul>
    </div>
</footer>

<!-- Enlace al CSS del footer -->
<link rel="stylesheet" href="<?= base_url('activos/css/principal/footer_principal.css'); ?>">
