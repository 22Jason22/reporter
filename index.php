<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a2dd6045c4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    
    
    <div class="fondo">

        <div class="contenedor-form login">
            <h2 >Iniciar Sesión</h2>
            <?php 
            include"config/config.php";
            include"acciones/validar.php"; 
            ?>
            <form action="" method="post" > 
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

                <button type="submit" class="btn" name="ingresar">Iniciar sesión</button>

                <div class="registrar">
                    <p>¿No tienes cuenta? <a href="registro.php" class="registrar-link">Registrate</a></p>
                </div>

            </form>

            

        </div>
    </div>


</body>

</html>