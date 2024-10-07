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

if (isset($_POST["registro"]) ) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $user_nom = $_POST['user_nom'];
    $user_pass = $_POST['user_pass'];
    $gerencia = $_POST['gerencia'];
    $area = $_POST['area'];



    $sql = "INSERT INTO users (nombre, apellido, cedula, usuario, contrasena, area, gerencia) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellido, $cedula, $user_nom, $user_pass,$area , $gerencia);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {

        echo "Registro exitoso! Puedes iniciar sesión ahora";
        echo "<script>setTimeout(function(){ window.location.href='index.php'; }, 3000);</script>";

    } else {

        echo "<center>Las contraseñas no coinciden</center>";
        exit;

    }

}

?>