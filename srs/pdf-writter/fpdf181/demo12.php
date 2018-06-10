<?php
require_once("database.php");
require('fpdf.php');
$pdf= new FPDF();
ob_clean();
$pdf->SetFont('Arial','',11);
$pdf->AddPage();
$pp=$db->query("SELECT * FROM `3aa` ");

while($da=$pp->fetch_assoc())
{
	$clsname=$da['clsname'];
	$start=$da['astart'];
	$end=$da['arange']+$da['astart'];
	$w=$db->query("SELECT SID FROM 3a WHERE id>=$start AND id<=$end");
	$i=0;
	while($p=$w->fetch_assoc())
	{
		++$i;
		$a[$i]=$p['SID'];
	}
	$start=$da['bstart'];
	$end=$da['brange']+$da['bstart'];
	$w1=$db->query("SELECT SID FROM 3a WHERE id>=$start AND id<=$end");
	$j=0;
	while($p=$w1->fetch_assoc())
	{
		++$j;
		$b[$j]=$p['SID'];
	}
	$pdf->Text(5,5,$clsname);
	$pdf->Cell(30,12,'S7',1,0,'C');
	$pdf->Cell(30,12,'S3',1,0,'C');
	$pdf->Cell(10,12,'',0);
	$pdf->Cell(30,12,'S7',1,0,'C');
	$pdf->Cell(30,12,'S3',1,0,'C');
	$pdf->Cell(10,12,'',0);
	$pdf->Cell(30,12,'S7',1,0,'C');
	$pdf->Cell(30,12,'S3',1,0,'C');
	$pdf->Ln();
	for($t=1;$t<=7;$t++)
	{
		for($l=0;$l<3;$l++)
		{
			$n=$t+($l*7);
			if($n<=$i)
			{$pdf->Cell(30,12,$n,1,0,'C');}
			else{$pdf->Cell(30,12,'',0);}
			if($n<=$j)
				{$pdf->Cell(30,12,$n+12,1,0,'C');}
			else{$pdf->Cell(30,12,'',0);}
			$pdf->Cell(10,12,'',0);
		}
		$pdf->Ln();
	}
	$pdf->AddPage();
	
	
}


$pdf->Output();
?>