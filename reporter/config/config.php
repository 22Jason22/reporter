<?php
$host = "localhost";
$usuario = "enna";
$contrasena = "pancito";
$base_de_datos = "reporter";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

