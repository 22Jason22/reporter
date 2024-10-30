<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sistema de Reportes INTI</title>
    <link rel="stylesheet" href="assets/css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">


    <!-- Libreria para alertas ----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>

    <header>

        <h2 class="logo">Reportes INTI</h2>

        <nav class="navegation">

        <a href="principal.php" id="menuTrabajadas" class="menu-item active">Trabajadas</a>
        <a href="solicitudes.php" id="menuSolicitudes" class="menu-item">Solicitudes</a>

            <button class="btn center" onclick="cerrarSesion()">Cerrar sesión </button>
        </nav>
        <script>
            function cerrarSesion() {

                window.location.href = "index.php?";

            }
        </script>
    </header>


    <?php
    include("config/config.php");
    include("acciones/acciones.php");

    $solicitudes = ObtenerSolicitudes($conexion);
    $totalSolicitudes = $solicitudes->num_rows;
    ?>


    <div class="container">

        <div class="row justify-content-md-center">
            <div class="sec_trab">
                <div class="col-md-12">
                    <h1 class="text-center">
                        Lista de Reportes (<?php echo $totalSolicitudes ?>)
                        <span class="float-end">
                            <a href="acciones/exportar.php" class="btn btn-success" title="Exportar a CSV" download="Reportes.csv"><i class="bi bi-filetype-csv"></i></a>
                        </span>
                        <hr>
                    </h1>
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
                                    foreach ($solicitudes as $solicitude) { ?>
                                        <tr id="empleado_<?php echo $solicitude['id']; ?>">
                                            <th scope='row'><?php echo $solicitude['id']; ?></th>
                                            <td><?php echo $solicitude['nombre']; ?></td>
                                            <td> <?php echo $solicitude['edad']; ?></td>
                                            <td><?php echo $solicitude['cedula']; ?></td>
                                            <td><?php echo $solicitude['telefono']; ?></td>
                                            <td><?php echo $solicitude['identificador']; ?></td>
                                            <td>
                                                <a title="Ver detalles del Reporte" href="#" onclick="verDetallesReporte(<?php echo $solicitude['id']; ?>)" class="btn btn-success">
                                                    <i class="bi bi-binoculars"></i>
                                                </a>
                                                <a title="Eliminar datos del Reporte" href="#" onclick="EliminarReporte(<?php echo $solicitude['id']; ?>)" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/detallesReporte.js"></script>
    <script src="assets/js/eliminarReporte.js"></script>
    <script src="assets/js/refreshTableAdd.js"></script>
    <script src="assets/js/refreshTableEdit.js"></script>
    <script src="assets/js/alertas.js"></script>
    <script src="js/navegacion.js"></script>

    <!-------------------------Librería  datatable para la tabla -------------------------->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $("#table_empleados").DataTable({
                pageLength: 5,
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json",
                },
            });
        });
    </script>

</body>

</html>