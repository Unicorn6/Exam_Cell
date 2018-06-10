<?php
require('database.php');
require('fpdf.php');
$pdf= new FPDF();
ob_clean();
$date=$_GET['d'];

function datasheet($db,$a,$b,$st,$ed,$pdf,$tn)
{
	$na="Attencesheet-".$a;
	$pdf->Text(40,20,$na);
	$pdf->Ln(15);
	$qw=$db->query("SELECT sid FROM `$tn` WHERE `id` between '$st' and '$ed' and `dept` = '$a'");
	$t=0;
	while($out=$qw->fetch_assoc())
	{
		++$t;
		$x[$t]=$out['sid'];
	}
		for($p=1;$p<=$t;$p++){
		$pdf->Cell(20,12);
	    $pdf->Cell(60,12,$x[$p],1,0,'C');
	    $pdf->Cell(80,12,"",1,0,'C');
		$pdf->Ln();
		}
	if($a!=$b)
	{
		$pdf->AddPage();
		$nb="Attencesheet-".$b;
		$pdf->Text(40,20,$nb);
		$pdf->Ln(15);
	$qw=$db->query("SELECT sid FROM `$tn` WHERE `id` between '$st' and '$ed' and `dept` = '$b'");
		$ind=$qw->num_rows;
		$t=0;
	while($out=$qw->fetch_assoc())
	{
		++$t;
		$x[$t]=$out['sid'];
	}
		for($p=1;$p<=$t;$p++){
	    $pdf->Cell(20,12);
	    $pdf->Cell(60,12,$x[$p],1,0,'C');
	    $pdf->Cell(80,12,"",1,0,'C');
		$pdf->Ln();
		}
	}
	$pdf->AddPage();
}
function prt($db,$pdf,$tnam,$tnam2)
{
	$pdf->SetFont('Arial','',11);
$pdf->AddPage();
$ppp=$db->query("SELECT * FROM `$tnam2` WHERE 1=1 ");

while($da=$ppp->fetch_assoc())
{
	$clsname=$da['CLSNAME'];
	$colsize=7;
	$tname=$da['T1'];
	if($da['T2']!='NULL')
	{
		$tname=$tname.",".$da['T2'];
		$colsize=9;
		
	}
	$astart=$da['ASTART'];
	$aend=$da['ARANGE']+$da['ASTART'];
	$w=$db->query("SELECT SID FROM `$tnam` WHERE id>=$astart AND id<=$aend");
	$i=0;
	while($p=$w->fetch_assoc())
	{
		++$i;
		$a[$i]=$p['SID'];
	}
	if($da['BSTART']!='NULL'){
	$bstart=$da['BSTART'];
	$bend=$da['BRANGE']+$da['BSTART'];
	$w1=$db->query("SELECT SID FROM `$tnam` WHERE id>=$bstart AND id<=$bend");
	$j=0;
	while($p=$w1->fetch_assoc())
	{
		++$j;
		$b[$j]=$p['SID'];
	}
	}
	else{$j=0;}
	$pdf->Text(5,5,$clsname);
	
	
	$tname="Staff:".$tname;
	$pdf->Text(40,8,$tname);
	
	$pdf->Ln(15);
	$pdf->Cell(60,12,'R1',1,0,'C');
	$pdf->Cell(10,12,'',0);
	$pdf->Cell(60,12,'R2',1,0,'C');
	$pdf->Cell(10,12,'',0);
	$pdf->Cell(60,12,'R3',1,0,'C');
	$pdf->Ln();
	for($t=1;$t<=$colsize;$t++)
	{
		for($l=0;$l<3;$l++)
		{
			$n=$t+($l*$colsize);
			if($n<=$i)
			{$pdf->Cell(30,12,$a[$n],1,0,'C');}
			else{$pdf->Cell(30,12,'',1,0,'C');}
			if($n<=$j)
				{$pdf->Cell(30,12,$b[$n],1,0,'C');}
			else{$pdf->Cell(30,12,'',1,0,'C');}
			$pdf->Cell(10,12,'',0);
		}
		$pdf->Ln();
	}
	$pdf->AddPage();
	datasheet($db,$da['DEPTA1'],$da['DEPTA2'],$astart,$aend,$pdf,$tnam);
	if($j!=0)
	{datasheet($db,$da['DEPTB1'],$da['DEPTB2'],$bstart,$bend,$pdf,$tnam);}
}
	
}






$out=$db->query("SELECT * FROM `timetable` WHERE date='$date'");
while($output=$out->fetch_assoc())
{
$p=1;
for($j=1;$j<=8;$j++)
{
	   if($output[$j]!=NULL)
	{
    $tnam=$j.$output[$j];
	$tnam2=$tnam.$output[$j];
	prt($db,$pdf,$tnam,$tnam2);

	}}}

$pdf->Output();
?>