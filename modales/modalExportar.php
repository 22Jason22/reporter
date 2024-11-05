<div class="modal fade" id="exportarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="width: 600px;height: 500px;">
            <div class="modal-header">
                <h5 class="modal-title titulo_modal">Exportar Reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body" style="display: flex;align-content: center;align-items: center;justify-content: center;">
                <div class="d-flex flex-column align-items-center gap-3">
                    <button type="button" class="button btn btn-success btn-lg btn-exportar" data-formato="excel" style="width: 300px;margin-top: 20px;">
                        <i class="bi bi-file-earmark-excel me-2"></i>
                        Exportar a Excel
                    </button>
                    <button type="button" class="btn btn-danger btn-lg btn-exportar" data-formato="pdf" style="width: 300px;margin-top: 20px;">
                        <i class="bi bi-file-earmark-pdf me-2"></i>
                        Exportar a PDF
                    </button>   
                    <button type="button" class="btn btn-info btn-lg btn-exportar" data-formato="csv" style="width: 300px;margin-top: 20px;">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Exportar a CSV
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>