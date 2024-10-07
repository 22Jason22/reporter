<?php
/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/config.php");
    $tbl_empleados = "tbl_empleados";


    $nombre = trim($_POST['nombre']);
    $edad = trim($_POST['edad']);
    $cedula = trim($_POST['cedula']);
    $telefono = trim($_POST['telefono']);
    $cargo = trim($_POST['identificador']);

$dirLocal = "fotos_empleados";    

}

/**
 * Función para obtener todos los empleados 
 */

function ObtenerReportes($conexion)
{
    $sql = "SELECT * FROM trabajadas  ORDER BY id ASC";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        return false;
    }
    return $resultado;
}

