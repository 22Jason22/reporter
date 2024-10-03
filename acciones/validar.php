<?php

include "config/config.php";

if (isset($_POST["ingresar"])) {
    if (isset($_POST['usuario']) and isset($_POST['contrasena'])) {
        $user = $_POST['usuario'];
        $pass = $_POST['contrasena'];

        $consulta = "select * from users where usuario ='$user' and contrasena='$pass'";
        $resultado = mysqli_query($conexion, $consulta);
        $filas = mysqli_num_rows($resultado);
        
        if ($filas) {
            header ("location :localhost/index.php");
        }else {
        
            echo '<center><h1 class="bad">Usuario no existe</h1></center>';
            
        }



    }
}
