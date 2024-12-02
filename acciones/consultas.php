<?php
include "config/config.php"; // Asegúrate de incluir la conexión a la base de datos


function obtenerConteoPorEstado($conexion) {
    $sql = "SELECT estado, COUNT(*) AS total FROM trabajadas GROUP BY estado";
    $resultado = $conexion->query($sql);
    
    $data = [];
    while ($row = $resultado->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
function obtenerConteoPorEdad($conexion) {
    $sql = "SELECT edad, COUNT(*) AS total FROM trabajadas GROUP BY edad ORDER BY edad"; // Asegúrate de que el nombre de la tabla sea correcto
    $resultado = $conexion->query($sql);
    
    $data = [];
    while ($row = $resultado->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}
function obtenerConteoPorSede($conexion) {
    $query = "SELECT sede, COUNT(*) AS total FROM trabajadas GROUP BY sede"; // Reemplaza 'tu_tabla' con el nombre de tu tabla
    $result = mysqli_query($conexion, $query);

    $data = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row; // Agrega cada fila obtenida al array de datos
        }
    } else {
        // Manejo de errores (opcional)
        error_log("Error en la consulta: " . mysqli_error($conexion));
    }

    return $data; // Retorna el array con los resultados
}
?>