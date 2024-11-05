<?php
require_once("../config/config.php");
$id = (int)$_GET['id'];

// Consultar la base de datos para obtener los detalles del empleado en la tabla trabajadas
$sql = "SELECT * FROM trabajadas WHERE id = $id LIMIT 1";
$query = $conexion->query($sql);
$reporte = $query->fetch_assoc();

// Si no se encuentra en trabajadas, consultar en solicitudes
if (!$reporte) {
    $sql = "SELECT * FROM solicitudes WHERE id = $id LIMIT 1";
    $query = $conexion->query($sql);
    $reporte = $query->fetch_assoc();
}

// Devolver los detalles del empleado como un objeto JSON
header('Content-type: application/json; charset=utf-8');
if ($reporte) {
    echo json_encode($reporte);
} else {
    echo json_encode(["error" => "No se encontraron detalles para el ID proporcionado"]);
}
exit;
?>