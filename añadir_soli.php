<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Sistema de Reportes INTI - Añadir Datos</title>
    <link rel="stylesheet" href="assets/css/home.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">

    <!-- Libreria para alertas -----> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="icon" href="assets\imgs\Logo_inti.png">

    <script>
        function confirmSubmit() {
            return confirm("¿Estás seguro de que deseas añadir estos datos?");
        }
    </script>
</head>

<body>

    <header>
        <h2 class="logo">SISREP</h2>
        <nav class="navegation">
            <a href="dashboard.php" class="menu-item">Dashboard</a>
            <a href="principal.php" id="menuTrabajadas" class="menu-item">Trabajadas</a>
            <a href="solicitudes.php" id="menuSolicitudes" class="menu-item">Solicitudes</a>
            <a href="Configuracion.php" class="config-icon">
                <i class="bi bi-gear"></i>
            </a>
            <button class="btn center" onclick="cerrarSesion()">Cerrar sesión </button>
        </nav>
        <script>
            function cerrarSesion() {
                window.location.href = "index.php?";
            }
        </script>
    </header>

    <div class="container_editar">

    <h3>Añadir Información</h3><br>

    <form action="acciones/insertar_datos_sol.php" method="POST" onsubmit="return confirmSubmit();">

        <table class="table">

            <tbody>

                <tr>

                    <td>

                        <input type="text" class="form-control" id="tipo_sujeto" name="tipo_sujeto" placeholder="Tipo de Sujeto" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="identificador" name="identificador" placeholder="Identificador" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="beneficiario" name="nombre" placeholder="Nombre / Beneficiario" required>

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" required>

                    </td>

                    <td>

                        <input type="number" class="form-control" id="edad" name="edad" placeholder ="Edad" required>

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="number" class="form-control" id="hectareas" name="hectareas" placeholder="Hectáreas" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="id_solicitud" name="id_solicitud" placeholder="ID de Solicitud" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="id_expediente" name="id_expediente" placeholder="ID de Expediente" required>

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="text" class="form-control" id="id_punto_cuenta" name="id_punto_cuenta" placeholder="ID de Punto de Cuenta" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="estatus_punto_cuenta" name="estatus_punto_cuenta" placeholder="Estatus de Punto de Cuenta" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" required>

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="parroquia" name="parroquia" placeholder="Parroquia" required>

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="text" class="form-control" id="sede" name="sede" placeholder="Sede" required>

                    </td>

                    <td>

                        <input type="text" class="form-control" id="nro_expediente" name="nro_expediente" placeholder="Número de Expediente" required>

                    </td>

                </tr>

            </tbody>

        </table>

        <center><button type="submit" class="btn btn-primary">Añadir Información</button></center>

    </form>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
