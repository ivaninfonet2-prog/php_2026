<!-- Enlazamos CSS específico para el modal -->
<link rel="stylesheet" href="<?= base_url('activos/css/cerrar_sesion/confirmacion_modal.css'); ?>">

<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar acción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <?= $mensaje; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="<?= $url_confirmar; ?>" class="btn btn-danger">Confirmar</a>
            </div>
        </div>
    </div>
</div>
