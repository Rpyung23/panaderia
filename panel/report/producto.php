<?php

if (file_exists('fpdf184/fpdf.php')){
    require('fpdf184/fpdf.php');
}else{
    require('../../fpdf184/fpdf.php');
}

if (file_exists('conn/conn.php'))
{
    require('conn/conn.php');
}else{
    require('../../conn/conn.php');
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190,15,'Reporte de Productos',1,0,'C');
$pdf->Image('http://hcx3.com/00_2018/prueba/img/logo.png',10,12,30,0,'','http://www.fpdf.org');


$pdf->Ln();
$pdf->Cell(25,10,'Codigo',1,0,'C');
$pdf->Cell(60,10,'Nombres',1,0,'C');
$pdf->Cell(65,10,utf8_decode('Descripción'),1,0,'C');
$pdf->Cell(40,10,'Precio',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',14);

$conn = Conn();
$query_resuylt = mysqli_query($conn,
    'select P.cod_producto,P.nombre,P.descripcion,P.precio from producto as P where active = 1');

if (mysqli_num_rows($query_resuylt)>0)
{
    while ($dato = mysqli_fetch_array($query_resuylt))
    {
        $pdf->Cell(25,10,$dato['cod_producto'],1,0,'C');
        $pdf->Cell(60,10,utf8_decode(substr($dato['nombre'],0,23)),1,0,'C');
        $pdf->Cell(65,10,utf8_decode(substr($dato['descripcion'],0,23)),1,0,'C');
        $pdf->Cell(40,10,$dato['precio'],1,0,'C');
        $pdf->Ln();
    }
}

$pdf->Output();





?>
