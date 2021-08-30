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

$fechaI = $_GET["fechaI"];
$fechaF = $_GET["fechaF"];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190,15,'Reporte de Ventas',1,0,'C');
$pdf->Image('http://hcx3.com/00_2018/prueba/img/logo.png',10,12,30,0,'','http://www.fpdf.org');


$pdf->Ln();
$pdf->Cell(25,10,'Factura',1,0,'C');
$pdf->Cell(60,10,'Dni/Cliente',1,0,'C');
$pdf->Cell(65,10,utf8_decode('Nombres Com.'),1,0,'C');
$pdf->Cell(40,10,'Precio Total',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',14);

$conn = Conn();
$query = "select F.id_factura,F.dni_cliente,F.nombres,F.precio_tot
            from factura as F join detalle_venta as DV on F.id_factura = DV.fk_id_factura 
            where F.fecha_venta between '$fechaI' and '$fechaF'";

$query_resuylt = mysqli_query($conn,$query);


if (mysqli_num_rows($query_resuylt)>0)
{
    while ($dato = mysqli_fetch_array($query_resuylt))
    {
        $pdf->Cell(25,10,$dato['id_factura'],1,0,'C');
        $pdf->Cell(60,10,utf8_decode(substr($dato['dni_cliente'],0,20)),1,0,'C');
        $pdf->Cell(65,10,utf8_decode(substr($dato['nombres'],0,20)),1,0,'C');
        $pdf->Cell(40,10,$dato['precio_tot'],1,0,'C');
        $pdf->Ln();
    }
}

$pdf->Output();





?>
