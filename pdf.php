<?php

ob_start();
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/itl2.jpeg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(65);
    // Title
    $this->Cell(55,10,'PDF COMPRAS',1,0,'C');
    // Line break
    $this->Ln(45);

    $this->Cell(130,10,'NOMBRE PRODUCTO',1,0,'C',0);
    $this->Cell(65,10,'PRECIO',1,1,'C',0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
require ('conexion.php');
$consulta= "SELECT * FROM items";
$resul = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',16);

while ($row = $resul->fetch_assoc()) {
    $pdf->Cell(130,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(65,10,$row['precio'],1,1,'C',0);
}

$pdf->Output();
ob_end_flush(); 
?>