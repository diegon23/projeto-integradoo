<?php
	require_once __DIR__."/../../fpdf/fpdf.php";
	
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(40,10,'Hello World!');
	$pdf->Output('D','contrato.pdf');
	
?>