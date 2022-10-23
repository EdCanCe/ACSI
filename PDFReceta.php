<?php
$idpag = $_GET["id"];
session_start();
require('fpdf/fpdf.php');
class PDF extends FPDF{
    // Cabecera de página
    function Header(){
        $this->Image('imgs/fondoPDF.png',0,0,220);
        $this->Ln(0);
        $this->SetFont('Helvetica','B',10);
        $this->Cell(200,0,utf8_decode("- ACSI -"),0,1,'C');
        $this->Ln(5);
        $this->SetFont('Helvetica','B',20);
        $this->Cell(200,5,utf8_decode("- RECETA MÉDICA -"),0,0,'C');
        // Salto de línea
    }
    
}

// Creación del objeto de la clase heredada
$pdf=new PDF('P','mm',array(220,280));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Helvetica','B',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(0);
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * from Receta where NoConsulta = '$idpag'");
while($row=mysqli_fetch_assoc($resultado)){
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $fechaConsulta = date('j', strtotime($row['Fecha']))." de ".$meses[date('n', strtotime($row['Fecha']))-1]." de ".date('Y', strtotime($row['Fecha']));
    $pdf->Cell(0,6,utf8_decode($fechaConsulta),0,1,'R');
    $pdf->SetFont('Helvetica','B',15);
    $pdf->Ln(6);
    $resultado2 = mysqli_query($conexion, "SELECT * from Alumnos where NoControl = '$row[NoControlFK]'");
    while($row2=mysqli_fetch_assoc($resultado2)){
        $pdf->Cell(0,10,utf8_decode("Nombre del paciente: ".$row2['NombreAl']." ".$row2['ApPaternoAl']." ".$row2['ApMaternoAl']),0,1,'L');
    }
    $pdf->Cell(0,10,utf8_decode("Temperatura del paciente: ".$row['TempPaciente']." °C"),0,1,'L');
    $pdf->Cell(0,10,utf8_decode("Peso del paciente: ".$row['PesoPaciente']." kg"),0,1,'L');
    $pdf->Cell(0,10,utf8_decode("Altura del paciente: ".$row['Altura']." mts"),0,1,'L');
    $pdf->Ln(10);
    $pdf->SetX(15);
    $pdf->Cell(0,10,utf8_decode("Padecimientos:"),0,1,'L');
    $pdf->SetFont('Helvetica','B',10);
    $pdf->SetX(20);
    $pdf->Multicell(180,6,utf8_decode($row['Padecimientos']),0,1);
    $pdf->Ln(7);
    $pdf->SetX(15);
    $pdf->SetFont('Helvetica','B',15);
    $pdf->Cell(0,10,utf8_decode("Diagnóstico:"),0,1,'L');
    $pdf->SetFont('Helvetica','B',10);
    $pdf->SetX(20);
    $pdf->Multicell(180,6,utf8_decode($row['Diagnostico']),0,1);
    $pdf->Ln(7);
    $pdf->SetX(15);
    $pdf->SetFont('Helvetica','B',15);
    $pdf->Cell(0,10,utf8_decode("Tratamiento:"),0,1,'L');
    $pdf->SetFont('Helvetica','B',10);
    $pdf->SetX(20);
    $pdf->Multicell(180,6,utf8_decode($row['Dosis']),0,1);
    $resultado2 = mysqli_query($conexion, "SELECT * from Doctor where CedulaProf = '$row[CedulaProfFK]'");
    while($row2=mysqli_fetch_assoc($resultado2)){
        $pdf->SetFont('Helvetica','B',10);
        $pdf->SetY(265);
        $pdf->Cell(0,12,utf8_decode("Firma: ".$row2['NombreDoc']." ".$row2['ApPaternoDoc']." ".$row2['ApMaternoDoc']." - Cédula Prof: ".$row['CedulaProfFK']),0,1,'C');
    }
    $pdf->Line(55, 265, 165, 265);
}
$pdf->Output();
?>
