<?php
include "config/config.php";

if (isset($_POST["ingresar"])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verifica si el usuario existe
    $sql = "SELECT * FROM users WHERE usuario = ? AND contrasena = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $usuario, $contrasena);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // La consulta fue exitosa, inicia sesión
        header("Location: principal.php");
        exit;
    } else {
        // La consulta no fue exitosa, muestra un mensaje de error
        echo "<center>Usuario o contraseña incorrectos</center>";
    }
}  
?>