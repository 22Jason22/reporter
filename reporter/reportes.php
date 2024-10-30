<!-- reportes.php -->
<div class="table-responsive">
    <table class="table table-hover" id="table_empleados">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Cédula</th>
                <th scope="col">Telefono</th>
                <th scope="col">Identificador</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($reportes as $reporte) { ?>
                <tr id="empleado_<?php echo $reporte['id']; ?>">
                    <th scope='row'><?php echo $reporte['id']; ?></th>
                    <td><?php echo $reporte['nombre']; ?></td>
                    <td><?php echo $reporte['edad']; ?></td>
                    <td><?php echo $reporte['cedula']; ?></td>
                    <td><?php echo $reporte['telefono']; ?></td>
                    <td><?php echo $reporte['identificador']; ?></td>
                    <td>
                        <a title="Ver detalles del Reporte" href="#" onclick="verDetallesReporte(<?php echo $reporte['id']; ?>)" class="btn btn-success">
                            <i class="bi bi-binoculars"></i>
                        </a>
                        <a title="Eliminar datos del Reporte" href="#" onclick="EliminarReporte(<?php echo $reporte['id']; ?>)" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>