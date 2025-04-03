<?php
require './code128.php';

//class Generar_factura{

//public function generar(){
// Obtener los datos enviados desde el formulario
$facturas = isset($_POST['facturas']) ? json_decode($_POST['facturas'], true) : [];

// Crear el PDF
$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

// Encabezado
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(150, 10, 'Factura', 0, 1, 'L');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(150, 10, 'Fecha de emisión: ' . date('d/m/Y'), 0, 1, 'L');

// Tabla de productos
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(50, 8, 'Nombre Usuario', 1, 0, 'C', true);
$pdf->Cell(50, 8, 'Producto', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Fecha', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Total', 1, 1, 'C', true);

// Rellenar la tabla
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);
foreach ($facturas as $factura) {
    $pdf->Cell(50, 8, $factura['NOMBRE_USUARIO'], 1);
    $pdf->Cell(50, 8, $factura['NOMBRE_PRODUCTO'], 1);
    $pdf->Cell(30, 8, $factura['FECHA_CREACION'], 1);
    $pdf->Cell(20, 8, $factura['CANTIDAD'], 1, 'C');
    $pdf->Cell(30, 8, $factura['TOTAL'], 1, 'R');
    $pdf->Ln();
}

// Generar el PDF
$pdf->Output('D', 'Factura.pdf');
/*
}
}
$generar = new Generar_factura();
$generar->generar();
*/
?>
