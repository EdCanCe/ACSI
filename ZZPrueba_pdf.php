<?php
$idpag = $_GET["id"];
require('fpdf/fpdf.php');
class PDF extends FPDF{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('imgs/icon.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('ACSI - RECETA MÉDICA'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','',12);
$pdf->setY(50);

include("conexion.php");
$alumnos = "SELECT * FROM alumnos where NoControl = '". $idpag ."'";
$resultado = mysqli_query($conexion, $alumnos);
while($row=mysqli_fetch_assoc($resultado)){
    $pdf->Cell(0,10,$row['NoControl']." ".$row['NombreAl']." ".$row['ApPaternoAl']." ".$row['ApMaternoAl'],0,1);
}
$pdf->Output();
?>