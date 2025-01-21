<!-- Modal para editar los detalles del empleado -->
<div class="modal fade" id="editarEmpleadoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titulo_modal">Editar Detalles del Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarEmpleado">
                    <input type="hidden" id="idEmpleadoEditar" name="idEmpleadoEditar">
                    
                    <div class="mb-3">
                        <label for="tipo_sujeto" class="form-label">Tipo de Sujeto</label>
                        <input type="text" class="form-control" id="tipo_sujeto" name="tipo_sujeto">
                    </div>
                    <div class="mb-3">
                        <label for="identificador" class="form-label">Identificador</label>
                        <input type="text" class="form-control" id="identificador" name="identificador">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <input type="text" class="form-control" id="sexo" name="sexo">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="mb-3">
                        <label for="hectareas" class="form-label">Hectáreas</label>
                        <input type="number" class="form-control" id="hectareas" name="hectareas">
                    </div>
                    <div class="mb-3">
                        <label for="id_solicitud" class="form-label">ID de Solicitud</label>
                        <input type="text" class="form-control" id="id_solicitud" name="id_solicitud">
                    </div>
                    <div class="mb-3">
                        <label for="id_expediente" class="form-label">ID de Expediente</label>
                        <input type="text" class="form-control" id="id_expediente" name="id_expediente">
                    </div>
                    <div class="mb-3">
                        <label for="id_punto_cuenta" class="form-label">ID de Punto de Cuenta</label>
                        <input type="text" class="form-control" id="id_punto_cuenta" name="id_punto_cuenta">
                    </div>
                    <div class="mb-3">
                        <label for="estatus_punto_cuenta" class="form-label">Estatus de Punto de Cuenta</label>
                        <input type="text" class="form-control" id="estatus_punto_cuenta" name="estatus_punto_cuenta">
                    </div>
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula">
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado">
                    </div>
                    <div class="mb-3">
                        <label for="municipio" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="municip io" name="municipio">
                    </div>
                    <div class="mb-3">
                        <label for="parroquia" class="form-label">Parroquia</label>
                        <input type="text" class="form-control" id="parroquia" name="parroquia">
                    </div>
                    <div class="mb-3">
                        <label for="sede" class="form-label">Sede</label>
                        <input type="text" class="form-control" id="sede" name="sede">
                    </div>
                    <div class="mb-3">
                        <label for="nro_expediente" class="form-label">Número de Expediente</label>
                        <input type="text" class="form-control" id="nro_expediente" name="nro_expediente">
                    </div>
                    <div class="mb-3">
                        <label for="mes" class="form-label">Mes</label>
                        <input type="text" class="form-control" id="mes" name="mes">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>