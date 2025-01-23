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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5, user-scalable=yes">

    <!-- Libreria para alertas -----> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="icon" href="assets\imgs\Logo_inti.png">  
    <script>
        function confirmSubmit() {
            return confirm("¿Está seguro de que desea editar esta información?");
        }
    </script>

</head>

<body>

    <header>

        <h2 class="logo">SISREP</h2>

        <nav class="navegation">

            <a href="dashboard.php" class="menu-item">Dashboard</a>
            <a href="principal.php" id="menuTrabajadas" class="menu-item active">Trabajadas</a>
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

    <?php
    include("config/config.php");
    include("acciones/acciones.php");

    
    ?>

    <div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>

    <div class="container_editar">
        <h3>Editar Información</h3><br>
        <form action="<?php echo strpos($_GET['url'], 'principal.php') !== false ? 'acciones/update_trabajadas.php' : 'acciones/update_solicitudes.php'; ?>" method="POST" onsubmit="return confirmSubmit();">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"> <!-- Hidden field for user ID -->
            <input type="hidden" name="url" value="<?php echo $_GET['url']; ?>">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="tipo_sujeto" name="tipo_sujeto" placeholder="Tipo de Sujeto" value="<?php echo isset($data['tipo_sujeto']) ? $data['tipo_sujeto'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="identificador" name="identificador" placeholder="Identificador" value="<?php echo isset($data['identificador']) ? $data['identificador'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="beneficiario" name="nombre" placeholder="Nombre / Beneficiario" value="<?php echo isset($data['nombre']) ? $data['nombre'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo isset($data['telefono']) ? $data['telefono'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" value="<?php echo isset($data['sexo']) ? $data['sexo'] : ''; ?>">
                        </td>
                        <td>
                            <input type="number" class="form-control" id="edad" name="edad" placeholder ="Edad" value="<?php echo isset($data['edad']) ? $data['edad'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" class="form-control" id="hectareas" name="hectareas" placeholder="Hectáreas" value="<?php echo isset($data['hectareas']) ? $data['hectareas'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="id_solicitud" name="id_solicitud" placeholder="ID de Solicitud" value="<?php echo isset($data['id_solicitud']) ? $data['id_solicitud'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="id_expediente" name="id_expediente" placeholder="ID de Expediente" value="<?php echo isset($data['id_expediente']) ? $data['id_expediente'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="id_punto_cuenta" name="id_punto_cuenta" placeholder="ID de Punto de Cuenta" value="<?php echo isset($data['id_punto_cuenta']) ? $data['id_punto_cuenta'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="estatus_punto_cuenta" name="estatus_punto_cuenta" placeholder="Estatus de Punto de Cuenta" value="<?php echo isset($data['estatus_punto_cuenta']) ? $data['estatus_punto_cuenta'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula" value="<?php echo isset($data['cedula']) ? $data['cedula'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo isset($data['estado']) ? $data['estado'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" value="<?php echo isset($data['municipio']) ? $data['municipio'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="parroquia" name="parroquia" placeholder="Parroquia" value="<?php echo isset($data['parroquia']) ? $data['parroquia'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" id="sede" name="sede" placeholder="Sede" value="<?php echo isset($data['sede']) ? $data['sede'] : ''; ?>">
                        </td>
                        <td>
                            <input type="text" class="form-control" id="numero_expediente" name="numero_expediente" placeholder="Número de Expediente" value="<?php echo isset($data['numero_expediente']) ? $data['numero_expediente'] : ''; ?>">
                        </td>
            </table>
            <center><button type="submit" class="btn btn-primary">Actualizar Información</button></center>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6g1g6" crossorigin="anonymous"></script>
</body>

</html>