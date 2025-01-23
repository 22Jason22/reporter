<?php
include("../config/config.php"); // Asegúrate de que la ruta sea correcta

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipo_sujeto = $_POST['tipo_sujeto'];
    $identificador = $_POST['identificador'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $hectareas = $_POST['hectareas'];
    $id_solicitud = $_POST['id_solicitud'];
    $id_expediente = $_POST['id_expediente'];
    $id_punto_cuenta = $_POST['id_punto_cuenta'];
    $estatus_punto_cuenta = $_POST['estatus_punto_cuenta'];
    $cedula = $_POST['cedula'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $parroquia = $_POST['parroquia'];
    $sede = $_POST['sede'];
    $nro_expediente = $_POST['nro_expediente'];
    
    // Preparar la consulta SQL
    $sql = "INSERT INTO trabajadas (tipo_sujeto, identificador, nombre, telefono, sexo, edad, hectareas, id_solicitud, id_expediente, id_punto_cuenta, estatus_punto_cuenta, cedula, estado, municipio, parroquia, sede, nro_expediente) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssiidiiissssss", $tipo_sujeto, $identificador, $nombre, $telefono, $sexo, $edad, $hectareas, $id_solicitud, $id_expediente, $id_punto_cuenta, $estatus_punto_cuenta, $cedula, $estado, $municipio, $parroquia, $sede, $nro_expediente);

    // Ejecutar la declaración
    if ($stmt->execute()) {
        header("Location: ../principal.php?mensaje=Datos añadidos correctamente");
        
        // Redirigir a otra página o mostrar un mensaje de éxito
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo "No se han enviado datos.";
}
?>