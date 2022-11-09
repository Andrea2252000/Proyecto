<?Php
require "../config.php";
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();

require('../../fpdf/fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();


 
    $pdf->SetFont('Arial','B',13);
    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->Cell(80,10,'Compras',1,0,'C');
    // Line break
    $pdf->Ln(20);



$width_cell=array(23,45,20,50,50);
$pdf->SetFont('Arial','B',6);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Producto',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Precio',1,0,'C',true); 
//Third header column//
$pdf->Cell($width_cell[2],10,'Descripcion',1,1,'C',true);
//// header ends ///////

$pdf->SetFont('Arial','',7.5);
//Background color of header//
$pdf->SetFillColor(211,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($productos as $row) {
$pdf->Cell($width_cell[0],10,$row->Producto,1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row->Precio,1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row->Descripción,1,1,'L',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output('F','Compras.pdf');
header("Location: pedido.php");
?>