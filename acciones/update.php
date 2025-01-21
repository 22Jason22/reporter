<?php
include("config/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $tipo_sujeto = $_POST['tipo_sujeto'];
    $identificador = $_POST['identificador'];
    $beneficiario = $_POST['beneficiario'];
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
    $numero_expediente = $_POST['numero_expediente'];
    $mes = $_POST['mes'];

    // Actualizar la base de datos
    $query = "UPDATE tabla_reportes SET 
        tipo_sujeto='$tipo_sujeto', 
        identificador='$identificador', 
        beneficiario='$beneficiario', 
        telefono='$telefono', 
        sexo='$sexo', 
        edad='$edad', 
        hectareas='$hectareas', 
        id_solicitud='$id_solicitud', 
        id_expediente='$id_expediente', 
        id_punto_cuenta='$id_punto_cuenta', 
        estatus_punto_cuenta='$estatus_punto_cuenta', 
        cedula='$cedula', 
        estado='$estado', 
        municipio='$municipio', 
        parroquia='$parroquia', 
        sede='$sede', 
        numero_expediente='$numero_expediente', 
        mes='$mes' 
        WHERE id='$id'";

    if ($conexion->query($query) === TRUE) {
        echo "Registro actualizado con éxito.";
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }

    $conexion->close();
}
?>
