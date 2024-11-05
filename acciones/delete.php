<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../config/config.php");

    // Leer el cuerpo de la solicitud JSON
    $json_data = file_get_contents("php://input");
    // Decodificar los datos JSON en un array asociativo
    $data = json_decode($json_data, true);

    // Verificar si los datos se decodificaron correctamente
    if ($data !== null) {
        $id = $data['id'];
        $tipo = $data['tipo']; // 'empleado' o 'solicitud'

        // Determinar la tabla basada en el tipo
        $tabla = ($tipo === 'solicitud') ? 'solicitudes' : 'trabajadas';

        // Debug
        error_log("Intentando eliminar de la tabla: " . $tabla . " el ID: " . $id);

        // Preparar la consulta SQL
        $sql = "DELETE FROM $tabla WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        
        if (!$stmt) {
            error_log("Error en la preparación de la consulta: " . $conexion->error);
            echo json_encode(array("success" => false, "message" => "Error en la preparación de la consulta"));
            exit;
        }

        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo json_encode(array(
                    "success" => true, 
                    "message" => "Registro eliminado correctamente",
                    "debug" => array(
                        "tabla" => $tabla,
                        "id" => $id,
                        "affected_rows" => $stmt->affected_rows
                    )
                ));
            } else {
                echo json_encode(array(
                    "success" => false, 
                    "message" => "No se encontró el registro para eliminar",
                    "debug" => array(
                        "tabla" => $tabla,
                        "id" => $id,
                        "affected_rows" => $stmt->affected_rows
                    )
                ));
            }
        } else {
            error_log("Error en la ejecución de la consulta: " . $stmt->error);
            echo json_encode(array("success" => false, "message" => "Error al eliminar el registro: " . $stmt->error));
        }

        $stmt->close();
    } else {
        echo json_encode(array("success" => false, "message" => "Los datos no se proporcionaron correctamente"));
    }
}