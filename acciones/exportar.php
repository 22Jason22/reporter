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
    
    // Escribir encabezados
    $col = 1;
    foreach ($columnas as $titulo) {
        $sheet->setCellValueByColumnAndRow($col, 1, $titulo);
        $col++;
    }
    
    // Escribir datos
    $row = 2;
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
    
    $headerRange = 'A1:' . $lastColumn . '1';
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
    $pdf = new FPDF('L', 'mm',  array(800, 300)); // Cambiar a A3 para más espacio
    $pdf->AddPage();
    
    // Configurar la fuente para los encabezados
    $pdf->SetFont('Arial', 'B', 12); // Aumentar tamaño de fuente
    $pdf->SetFillColor(0, 255, 0); // Color de fondo verde para encabezados
    $pdf->SetTextColor(0); // Color de texto negro
    
    // Calcular el ancho de cada columna
    $pageWidth = 900; // Ancho de página A3 en orientación horizontal
    $margins = 20; // Márgenes izquierdo y derecho combinados
    $columnWidth = ($pageWidth - $margins) / count($columnas);

    // Encabezados
    foreach ($columnas as $columna) {
        $pdf->Cell($columnWidth, 10, utf8_decode($columna), 1, 0, 'C', true);
    }
    $pdf->Ln();

    // Configurar la fuente para los datos
    $pdf->SetFont('Arial', '', 11); // Aumentar tamaño de fuente para datos
    $pdf->SetFillColor(255, 255, 255); // Color de fondo blanco para los datos
    $pdf->SetTextColor(0); // Color de texto negro

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
