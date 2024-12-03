<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a2dd6045c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="assets\imgs\Logo_inti.png">
</head>

<body>
    <div class="cintillo">

        <img src="assets/imgs/cintillo.jpeg" alt="Imagen de la barra superior">

    </div>

    <div class="logo-container">
    <img src="assets/imgs/logo_univ.png" alt="Logo Universidad" class="logo-universidad" onerror="console.log('Error loading university logo')">
</div>
<div class="logo-container_INTI">
    <img src="assets/imgs/Logo_inti.png" alt="Logo Instituto" class="logo-instituto" onerror="console.log('Error loading institute logo')">
</div>

    <div class="fondo">

        <div class="contenedor-form login">
            <h2>Iniciar Sesión</h2>
            <?php
            include "config/config.php";
            include "acciones/validar.php";

            ?>
            <form action="" method="post">
                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-envelope"></i></span>
                    <input type="text" required id="usuario" name="usuario">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="contenedor-input">
                    <span class="icono"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" required id="contrasena" name="contrasena">
                    <label for="contrasena">Contraseña</label>
                </div>
                <div class="recordar">
                    <label for="#"><input type="checkbox">Recordar Sesión</label>
                </div>

                <button type="submit" class="btn_2" name="ingresar">Iniciar sesión</button>

                <div class="registrar">
                    <p>¿No tienes cuenta? <a href="registro.php" class="registrar-link">Registrate</a></p>
                    <?php



                    ?>
                </div>

            </form>



        </div>
    </div>


</body>

</html>