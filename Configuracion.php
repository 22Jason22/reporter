<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Reportes INTI</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="icon" href="assets/imgs/Logo_inti.png">
</head>

<body>

    <header>
        <h2 class="logo">Reportes INTI</h2>
        <nav class="navegation">
            <a href="dashboard.php" class="menu-item">Dashboard</a>
            <a href="principal.php" id="menuTrabajadas" class="menu-item active">Trabajadas</a>
            <a href="solicitudes.php" id="menuSolicitudes" class="menu-item">Solicitudes</a>
            <a href="Configuracion.php" class="config-icon">
                <i class="bi bi-gear"></i>
            </a>
            <button class="btn center" onclick="cerrarSesion()">Cerrar sesión </button>
        </nav>
    </header>

    <?php
    include("config/config.php");
    include("acciones/acciones.php");
    session_start();
    ?>

    <div class="logo-container">
        <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad">
    </div>
    <div class="logo-container_INTI">
        <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto">
    </div>

    <div class="containerri">
        <div class="container_info">
            <div class="profile-card">
                <h2>
                    Samuel Vegas
                </h2>
                <p>
                    INTI Central
                </p>
            </div>
            <div class="profile-details">
                <div class="tabs">
                    <a class="active" href="#">Informacion</a>
                    <a href="#">Cambiar Contraseña</a>
                </div>
                <div class="profile-info">
                    <h3>Detalles de Usuario</h3>
                    <div class="info-item">
                        <span>Identificador</span>
                        <span>V-30730167</span>
                    </div>
                    <div class="info-item">
                        <span>Nombre</span>
                        <span>Samuel Vegas</span>
                    </div>
                    <div class="info-item">
                        <span>Cedula</span>
                        <span>30730167</span>
                    </div>
                    <div class="info-item">
                        <span>Trabajo</span>
                        <span>Base de Datos</span>
                    </div>
                    <div class="info-item">
                        <span>Ubicación</span>
                        <span>La Vega, Caracas</span>
                    </div>
                    <div class="info-item">
                        <span>Gerencia</span>
                        <span>Sistemas</span>
                    </div>
                    <div class="info-item">
                        <span>Área</span>
                        <span>Operaciones</span>
                    </div>
                    <div class="info-item">
                        <span> Teléfono</span>
                        <span>0416-7062510</span>
                    </div>
                    <div class="info-item">
                        <span>Correo</span>
                        <span>vegassamuel1294@gmail.com</span>
                    </div>
                </div>

                <div class="change-password-form" style="display: none;">
                    <h3>Cambiar Contraseña</h3>
                    <form id="formChangePassword">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Contraseña Actual</label>
                            <input type="password" class="form-control" id="currentPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="newPassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnCambiarContraseña">Cambiar Contraseña</button>
                    </form>
                </div>
            </div>
        </div>
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

            // Obtener los elementos del formulario
            const newPassword = document.getElementById('newPassword');
            const confirmPassword = document.getElementById('confirmPassword');
            const formChangePassword = document.getElementById('formChangePassword');

            // Agregar evento de submit al formulario
            formChangePassword.addEventListener('submit', (e) => {
                // Obtener los valores de los campos
                const newPasswordValue = newPassword.value;
                const confirmPasswordValue = confirmPassword.value;

                // Validar que las contraseñas coincidan
                if (newPasswordValue !== confirmPasswordValue) {
                    toastr.error('Las contraseñas no coinciden. Por favor, inténtelo de nuevo.');
                    e.preventDefault();
                } else {
                    // Si las contraseñas coinciden, cerrar la sesión
                    cerrarSesion();
                }
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

                // Manejar el clic en la pestaña "Cambiar Contraseña"
                $('.tabs a').on('click', function(e) {
                    e.preventDefault();
                    $('.tabs a').removeClass('active');
                    $(this).addClass('active');

                    if ($(this).text() === 'Cambiar Contraseña') {
                        $('.profile-info').hide(); // Ocultar la información del usuario
                        $('.change-password-form').show(); // Mostrar el formulario de cambio de contraseña
                    } else {
                        $('.change-password-form').hide(); // Ocultar el formulario de cambio de contraseña
                        $('.profile-info').show(); // Mostrar la información del usuario
                    }
                });

                // Manejar el envío del formulario de cambio de contraseña
                $('#formChangePassword').on('submit', function(e) {
                    e.preventDefault();
                    const currentPassword = $('#currentPassword').val();
                    const newPassword = $('#newPassword').val();
                    const confirmPassword = $('#confirmPassword').val();

                    if (newPassword !== confirmPassword) {
                        toastr.error('Las contraseñas no coinciden.');
                        return;
                    }


                });
            });
        </script>
    </div>
</body>


</html>