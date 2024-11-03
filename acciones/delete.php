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

        // Preparar la consulta SQL
        $sql = "DELETE FROM $tabla WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Si es un empleado/reporte, manejar la eliminación de la imagen
            if ($tipo !== 'solicitud' && isset($data['avatar'])) {
                $avatarName = $data['avatar'];
                $dirLocal = "fotos_empleados";
                $filePath = $dirLocal . '/' . $avatarName;
                if (file_exists($filePath)) {
                    unlink($filePath); // Eliminar el archivo de imagen
                }
            }
            echo json_encode(array("success" => true, "message" => "Registro eliminado correctamente"));
        } else {
            echo json_encode(array("success" => false, "message" => "Error al eliminar el registro: " . $conexion->error));
        }

        $stmt->close();
    } else {
        // Si no se proporcionaron los datos correctamente, devolver un mensaje de error
        echo json_encode(array("success" => false, "message" => "Los datos no se proporcionaron correctamente"));
    }
}
