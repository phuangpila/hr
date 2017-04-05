<?php
define('FPDF_FONTPATH','fpdf/font/');
require('fpdf/fpdf.php');

$font = 'angsana';
  $pdf=new FPDF();
  $pdf->AddFont($font,'','angsa.php');
  $pdf->AddPage('L');

  $pdf->Cell(50,15,'',0,1,'L');
  $pdf->SetFont($font,'',20);
  $pdf->Text(145,13,'���');
  $pdf->Text(145,20,'���');
  $pdf->SetFont($font,'',16);
  $pdf->Cell(100,15,'',1,0,'C');
  $pdf->Cell(77,15,'',1,0,'C');
  $pdf->Cell(100,15,'',1,1,'C');
  $pdf->Cell(100,12,'',1,0,'C');
  $pdf->Cell(77,12,'',1,0,'C');
  $pdf->Cell(100,12,'',1,1,'C');
$pdf->Cell(20,20,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(80,5,'ttt',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,1,'C');

$pdf->Cell(20,5,'ggg',0,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,0,'C');
$pdf->Cell(20,5,'',1,1,'C');
  
  //$pdf->SetFont($font,'',20);
  
  // $pdf->Cell(98,12,'A',1,0,'C' );
  // $pdf->SetFont($font,'',16);
  // $pdf->Cell(81,12,'B',1,0,'R' );
  
  // $pdf->Cell(98,12,'C',1,1,'L');
  // $pdf->Cell(98,10,'D',1,0,'C' );
  
  // $pdf->Cell(81 ,10,'E',1,1,'C');
  // $pdf->SetFont($font,'',20);
  // $pdf->Cell(30 ,20,'F',1,0,'C');
  // $pdf->Cell(30 ,20,'G',1,1,,'C');
  // $pdf->Cell(30 ,20,'H',1,1,'C');
  // $pdf->Cell(30 ,20,'I',1,1,'C');
   // $pdf->Cell(30 ,20,('J'),1,1,'C');
  // $pdf->Cell(30 ,20,('K'),1,1,'C');
  // $pdf->Cell(30 ,20,('L'),1,0,'C');
  // $pdf->Cell(30 ,20,('M'),1,1,'C');
  
$pdf->Output();
?>