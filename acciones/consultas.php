<?php
include "config/config.php"; // Asegúrate de incluir la conexión a la base de datos

/**
 * Función para obtener conteo por estado de ambas tablas 'solicitudes' y 'trabajadas'.
 *
 * @param mysqli $conexion Conexión a la base de datos.
 * @return array Datos combinados de ambas tablas.
 */
function obtenerConteoPorEstado($conexion) {
    // Consulta para obtener conteo de estados de 'trabajadas'
    $sqlTrabajadas = "SELECT estado, COUNT(*) AS total FROM trabajadas GROUP BY estado";
    $resultadoTrabajadas = $conexion->query($sqlTrabajadas);
    
    $dataCombinada = [];
    while ($row = $resultadoTrabajadas->fetch_assoc()) {
        $dataCombinada[$row['estado']] = $row['total']; // Inicializa el total de trabajadas
    }

    // Consulta para obtener conteo de estados de 'solicitudes'
    $sqlSolicitudes = "SELECT municipio, COUNT(*) AS total FROM solicitudes GROUP BY municipio";
    $resultadoSolicitudes = $conexion->query($sqlSolicitudes);
    
    while ($row = $resultadoSolicitudes->fetch_assoc()) {
        if (isset($dataCombinada[$row['municipio']])) {
            $dataCombinada[$row['municipio']] += $row['total']; // Suma al total existente
        } else {
            $dataCombinada[$row['municipio']] = $row['total']; // Inicializa si no existe
        }
    }

    return $dataCombinada; // Retorna el array combinado
}

/**
 * Función para obtener conteo por edad de ambas tablas 'solicitudes' y 'trabajadas'.
 *
 * @param mysqli $conexion Conexión a la base de datos.
 * @return array Datos combinados de ambas tablas.
 */
function obtenerConteoPorEdad($conexion) {
    // Consulta para obtener conteo de edades de 'trabajadas'
    $sqlTrabajadas = "SELECT edad, COUNT(*) AS total FROM trabajadas GROUP BY edad ORDER BY edad";
    $resultadoTrabajadas = $conexion->query($sqlTrabajadas);
    
    $dataCombinada = [];
    while ($row = $resultadoTrabajadas->fetch_assoc()) {
        $dataCombinada[$row['edad']] = $row['total']; // Inicializa el total de trabajadas
    }

    // Consulta para obtener conteo de edades de 'solicitudes'
    $sqlSolicitudes = "SELECT edad, COUNT(*) AS total FROM solicitudes GROUP BY edad ORDER BY edad";
    $resultadoSolicitudes = $conexion->query($sqlSolicitudes);
    
    while ($row = $resultadoSolicitudes->fetch_assoc()) {
        if (isset($dataCombinada[$row['edad']])) {
            $dataCombinada[$row['edad']] += $row['total']; // Suma al total existente
        } else {
            $dataCombinada[$row['edad']] = $row['total']; // Inicializa si no existe
        }
    }

    return $dataCombinada; // Retorna el array combinado
}

/**
 * Función para obtener conteo por sede de ambas tablas 'solicitudes' y 'trabajadas'.
 *
 * @param mysqli $conexion Conexión a la base de datos.
 * @return array Datos combinados de ambas tablas.
 */
function obtenerConteoPorSede($conexion) {
    // Consulta para obtener conteo de sedes de 'trabajadas'
    $sqlTrabajadas = "SELECT sede, COUNT(*) AS total FROM trabajadas GROUP BY sede";
    $resultadoTrabajadas = $conexion->query($sqlTrabajadas);
    
    $dataCombinada = [];
    while ($row = $resultadoTrabajadas->fetch_assoc()) {
        $dataCombinada[$row['sede']] = $row['total']; // Inicializa el total de trabajadas
    }

    // Consulta para obtener conteo de sedes de 'solicitudes'
    $sqlSolicitudes = "SELECT sede, COUNT(*) AS total FROM solicitudes GROUP BY sede";
    $resultadoSolicitudes = $conexion->query($sqlSolicitudes);
    
    while ($row = $resultadoSolicitudes->fetch_assoc()) {
        if (isset($dataCombinada[$row['sede']])) {
            $dataCombinada[$row['sede']] += $row['total']; // Suma al total existente
        } else {
            $dataCombinada[$row['sede']] = $row['total']; // Inicializa si no existe
        }
    }

    return $dataCombinada; // Retorna el array combinado
}

function obtenerConteoPorTipoSujeto($conexion) {
    // Consulta para obtener conteo de tipos de sujetos de 'trabajadas'
    $sqlTrabajadas = "SELECT tipo_sujeto, COUNT(*) AS total FROM trabajadas GROUP BY tipo_sujeto ORDER BY total DESC";
    $resultadoTrabajadas = $conexion->query($sqlTrabajadas);

    $dataCombinada = [];
    while ($row = $resultadoTrabajadas->fetch_assoc()) {
        $dataCombinada[$row['tipo_sujeto']] = $row['total']; // Inicializa el total de trabajadas
    }

    // Consulta para obtener conteo de tipos de sujetos de 'solicitudes'
    $sqlSolicitudes = "SELECT tipo_sujeto, COUNT(*) AS total FROM solicitudes GROUP BY tipo_sujeto ORDER BY total DESC";
    $resultadoSolicitudes = $conexion->query($sqlSolicitudes);

    while ($row = $resultadoSolicitudes->fetch_assoc()) {
        if (isset($dataCombinada[$row['tipo_sujeto']])) {
            $dataCombinada[$row['tipo_sujeto']] += $row['total']; // Suma al total existente
        } else {
            $dataCombinada[$row['tipo_sujeto']] = $row['total']; // Inicializa si no existe
        }
    }

    return $dataCombinada; // Retorna el array combinado
}
?>