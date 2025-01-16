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


</head>

<body>



    <?php
    include("config/config.php");
    include("acciones/acciones.php");

    ?>

    <div class="cintillo">

        <img src="assets/imgs/cintillo.jpeg" alt="Imagen de la barra superior">

    </div>

    <div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>


    <body>
        <div class="container mt-5" style="margin-top: 150px;">
            <div class="row justify-content-center">
                <div class="col-md-6" style="margin-top: 150px;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Recuperación de contraseña</h3>
                        </div>
                        <div class="card-body">
                            <div id="correo-electronico">
                                <form>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Correo electrónico</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="btn-verificar">Verificar</button>
                                </form>
                            </div>
                            <div id="codigo-confirmacion" style="display: none;">
                                <p>Se envió un código de confirmación a su correo electrónico.</p>
                                <form>
                                    <div class="form-group mb-3">
                                        <label for="codigo" class="form-label">Código de confirmación</label>
                                        <input type="text" id="codigo" name="codigo" class="form-control" required>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="btn-verificar-codigo">Verificar código</button>
                                </form>
                            </div>
                            <div id="nueva-contraseña" style="display: none;">
                                <form>
                                    <div class="form-group mb-3">
                                        <label for="nueva_contraseña" class="form-label">Nueva contraseña</label>
                                        <input type="password" id="nueva_contraseña" name="nueva_contraseña" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="confirmar_contraseña" class="form-label">Confirmar contraseña</label>
                                        <input type="password" id="confirmar_contraseña" name="confirmar_contraseña" class="form-control" required>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="btn-cambiar-contraseña">Cambiar contraseña</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function cerrarSesion() {
                // Agregar aquí la lógica para cerrar la sesión
                // Por ejemplo, puedes hacer una petición AJAX para cerrar la sesión en el servidor
                $.ajax({
                    type: 'POST',
                    url: 'index.php',
                    success: function() {
                        // Redireccionar al usuario a la página de inicio de sesión
                        window.location.href = 'index.php';
                    }
                });
            }

            $(document).ready(function() {
                $("#btn-verificar").click(function() {
                    var email = $("#email").val();
                    // Generar código de confirmación
                    var codigo = Math.floor(Math.random() * 900000) + 100000;
                    // Mostrar sección de código de confirmación
                    $("#correo-electronico").hide();
                    $("#codigo-confirmacion").show();
                });

                $("#btn-verificar-codigo").click(function() {
                    var codigo = $("#codigo").val();
                    // Verificar código de confirmación
                    if (codigo === "129422") { // Verificar con el código universal
                        // Mostrar sección de nueva contraseña
                        $("#codigo-confirmacion").hide();
                        $("#nueva-contraseña").show();
                    } else {
                        alert("Código de confirmación incorrecto");
                    }
                });

                $("#btn-cambiar-contraseña").click(function() {
                    var nueva_contraseña = $("#nueva_contraseña").val();
                    var confirmar_contraseña = $("#confirmar_contraseña").val();
                    // Verificar si las contraseñas coinciden
                    if (nueva_contraseña === confirmar_contraseña) {
                        // Cambiar contraseña
                        console.log("Contraseña cambiada con éxito");
                        cerrarSesion();
                    } else {
                        console.log("Las contraseñas no coincden");
                    }
                });
            });
        </script>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="assets/js/detallesReporte.js"></script>
        <script src="assets/js/eliminarReporte.js"></script>
        <script src="assets/js/refreshTableAdd.js"></script>
        <script src="assets/js/refreshTableEdit.js"></script>
        <script src="assets/js/alertas.js"></script>
        <script src="js/navegacion.js"></script>
        <script src="assets/js/exportar.js"></script>

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