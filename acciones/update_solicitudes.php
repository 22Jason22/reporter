<?php
include("../config/config.php");

// Check if the required POST data is set
$user_id = isset($_POST['id']) ? $_POST['id'] : null; // Using 'id' as per the database structure
echo "User ID: " . $user_id; // Debugging statement to check the user ID
$tipo_sujeto = isset($_POST['tipo_sujeto']) ? $_POST['tipo_sujeto'] : null;
$identificador = isset($_POST['identificador']) ? $_POST['identificador'] : null;
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$edad = isset($_POST['edad']) ? $_POST['edad'] : null;
$hectareas = isset($_POST['hectareas']) ? $_POST['hectareas'] : null;
$id_solicitud = isset($_POST['id_solicitud']) ? $_POST['id_solicitud'] : null;
$id_expediente = isset($_POST['id_expediente']) ? $_POST['id_expediente'] : null;
$id_punto_cuenta = isset($_POST['id_punto_cuenta']) ? $_POST['id_punto_cuenta'] : null;
$estatus_punto_cuenta = isset($_POST['estatus_punto_cuenta']) ? $_POST['estatus_punto_cuenta'] : null;
$cedula = isset($_POST['cedula']) ? $_POST['cedula'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : null;
$parroquia = isset($_POST['parroquia']) ? $_POST['parroquia'] : null;
$sede = isset($_POST['sede']) ? $_POST['sede'] : null;
$nro_expediente = isset($_POST['nro_expediente']) ? $_POST['nro_expediente'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;

// Prepare the update query
$fields = [];
if (!empty($tipo_sujeto)) $fields[] = "tipo_sujeto = '$tipo_sujeto'";
if (!empty($identificador)) $fields[] = "identificador = '$identificador'";
if (!empty($nombre)) $fields[] = "nombre = '$nombre'";
if (!empty($telefono)) $fields[] = "telefono = '$telefono'";
if (!empty($sexo)) $fields[] = "sexo = '$sexo'";
if (!empty($edad)) $fields[] = "edad = '$edad'";
if (!empty($hectareas)) $fields[] = "hectareas = '$hectareas'";
if (!empty($id_solicitud)) $fields[] = "id_solicitud = '$id_solicitud'";
if (!empty($id_expediente)) $fields[] = "id_expediente = '$id_expediente'";
if (!empty($id_punto_cuenta)) $fields[] = "id_punto_cuenta = '$id_punto_cuenta'";
if (!empty($estatus_punto_cuenta)) $fields[] = "estatus_punto_cuenta = '$estatus_punto_cuenta'";
if (!empty($cedula)) $fields[] = "cedula = '$cedula'";
if (!empty($estado)) $fields[] = "estado = '$estado'";
if (!empty($parroquia)) $fields[] = "parroquia = '$parroquia'";
if (!empty($sede)) $fields[] = "sede = '$sede'";
if (!empty($nro_expediente)) $fields[] = "nro_expediente = '$nro_expediente'";
if (!empty($mes)) $fields[] = "mes = '$mes'";

// Construct the final SQL query
if (count($fields) > 0) {
    $sql = "UPDATE solicitudes SET " . implode(", ", $fields) . " WHERE id = '$user_id'";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conexion->error;
    }
} else {
    echo "No fields to update.";
}
if ($conexion->query($sql) === TRUE) {
    header("Location: " . $_POST['url']);
    exit();
}


$conexion->close();
?>
