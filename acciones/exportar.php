<?php
require '../vendor/autoload.php';
include("../config/config.php");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;



if (isset($_GET['formato']) && isset($_GET['tabla'])) {
    $formato = $_GET['formato'];
    $tabla = $_GET['tabla'];
    
    // Consulta para obtener los datos
    $sql = "SELECT * FROM $tabla";
    $resultado = $conexion->query($sql);
    
    if ($resultado->num_rows > 0) {
        // Obtener columnas
        $columnas = [];
        while ($fieldInfo = $resultado->fetch_field()) {
            $columnas[] = $fieldInfo->name;
        }
        
        // Obtener datos
        $datos = [];
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }
        
        if ($formato === 'excel') {
            exportarExcel($columnas, $datos, $tabla);
        } elseif ($formato === 'pdf') {
            exportarPDF($columnas, $datos, $tabla);
        }
    }
}

function exportarExcel($columnas, $datos, $tabla) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Títulos según la fuente
    if ($tabla === 'solicitudes') {
        $titulo = 'Reporte de los Datos de Solicitantes';
    } else {
        $titulo = 'Reporte de Las Solicitudes en Proceso';
    }

    // Insertar imagen izquierda
    $drawing1 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing1->setName('Logo Izquierda');
    $drawing1->setDescription('Logo Izquierda');
    $drawing1->setPath('../assets/imgs/Logo_inti.png'); // Cambia la ruta
    $drawing1->setCoordinates('A1'); // Coloca la imagen en A1
    $drawing1->setHeight(100); // Ajusta la altura
    $drawing1->setWorksheet($sheet);

    // Insertar imagen derecha
    $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing2->setName('Logo Derecha');
    $drawing2->setDescription('Logo Derecha');
    $drawing2->setPath('../assets/imgs/Logo_univ.png'); // Cambia la ruta
    $drawing2->setCoordinates('S1'); // Coloca la imagen en S1
    $drawing2->setHeight(100); // Ajusta la altura
    $drawing2->setWorksheet($sheet);

    // Escribir el título en el centro
    $sheet->mergeCells('C1:Q5'); // Combina las filas 1 a 3 y columnas C a Q
    $sheet->setCellValue('C1', $titulo);
    $sheet->getStyle('C1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('C1')->getFont()->setBold(true)->setSize(14);

    // Dejar espacio entre el título y las imágenes
    $sheet->getRowDimension(4)->setRowHeight(20); // Espacio entre el título y las imágenes

    // Escribir encabezados
    $col = 1;
    foreach ($columnas as $titulo) {
        $sheet->setCellValueByColumnAndRow($col, 6, $titulo); // Cambia la fila a 6
        $col++;
    }

    // Escribir datos
    $row = 7; // Cambia la fila a 7
    foreach ($datos as $fila) {
        $col = 1;
        foreach ($fila as $value) {
            $sheet->setCellValueByColumnAndRow($col, $row, $value);
            $col++;
        }
        $row++;
    }

    // Aplicar estilos
    $lastColumn = $sheet->getHighestColumn();
    $lastRow = $sheet->getHighestRow();
    $range = 'A1:' . $lastColumn . $lastRow;

    $sheet->getStyle($range)->applyFromArray([
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER,
        ],
    ]);

    foreach (range('A', $lastColumn) as $col) {
        $sheet->getColumnDimension($col)->setWidth(15);
    }
    $sheet->getDefaultRowDimension()->setRowHeight(20);

    $headerRange = 'C6:' . $lastColumn . '6'; // Cambia la fila a 6
    $sheet->getStyle($headerRange)->applyFromArray([
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['rgb' => '00FF00'],
        ],
        'font' => [
            'bold' => true,
            'color' => ['rgb' => '000000'],
        ],
    ]);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_' . $tabla . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

function exportarPDF($columnas, $datos, $tabla) {
    require_once(__DIR__ . '/../vendor/autoload.php');

    // Crear una nueva instancia de FPDF con orientación vertical y tamaño A3
    $pdf = new FPDF('L', 'mm', array(800, 300));
    $pdf->AddPage();
    
    // Títulos según la fuente
    if ($tabla === 'solicitudes') {
        $titulo = 'Reporte de los Datos de Solicitantes';
    } else {
        $titulo = 'Reporte de Las Solicitudes en Proceso';
    }

    // Membretes
    $pdf->Image('../assets/imgs/Logo_inti.png', 10, 10, 50); // Ajusta la ruta y tamaño
    $pdf->Image('../assets/imgs/Logo_univ.png', 740, 10, 50); // Ajusta la ruta y tamaño

    // Calcular la posición vertical para centrar el título
    $pdf->SetY(30); // Ajusta la posición Y para centrar el título entre las imágenes

    // Configurar la fuente para el título
    $pdf->SetFont('Arial', 'B', 50);
    $pdf->Cell(0, 10, $titulo, 0, 1, 'C'); // Título centrado
    $pdf->Ln(60); // Espacio después del título

    // Configurar la fuente para los encabezados
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(0, 255, 0);
    $pdf->SetTextColor(0);

    // Calcular el ancho de cada columna
    $pageWidth = 900;
    $margins = 20;
    $columnWidth = ($pageWidth - $margins) / count($columnas);

    // Encabezados
    foreach ($columnas as $columna) {
        $pdf->Cell($columnWidth, 10, utf8_decode($columna), 1, 0, 'C', true);
    }
    $pdf->Ln();


    // Configurar la fuente para los datos
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);

    // Datos
    foreach ($datos as $fila) {
        foreach ($columnas as $columna) {
            $pdf->Cell($columnWidth, 8, utf8_decode($fila[$columna]), 1, 0, 'L', true);
        }
        $pdf->Ln();
    }

    // Salida del PDF
    $pdf->Output('D', 'reporte_' . $tabla . '.pdf');
    exit;
}