<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	require('database.php');
	require('fpdf.php');
	$dp=$_GET['d'];
	
	$pdf=new FPDF();
	$pdf->SetFont('Arial','',16);
    $pdf->AddPage();
	$pdf->SetXY(60,5);
		$pdf->Cell(100,10,$title,0,0,'C');
		$pdf->SetXY(60,15);
		$pdf->Cell(100,10,"RAJIV GANDHI INSTITUTE OF TECHNOLOGY KOTTAYAM",0,0,'C');
		$pdf->SetXY(58,28);
		$pdf->Cell(100,10,"Staff List",0,0,'C');
	    $pdf->SetXY(30,40);
	    $pdf->Ln();
	if($res=$db->query("SELECT DISTINCT date from `timetable`"))
	{
		while($day=$res->fetch_assoc())
		{ $date=$day['date'];
		    $dd=$date."0";
		    $tm="FN";
		   if($out=$db->query("SELECT * FROM `teacher` WHERE `$dd`=1 and `dept`='$dp'"))
		   {
			   if($out->num_rows>0)
			   {
				   $pdf->SetFont('Arial','',16);
				   $pdf->SetX(30);
				   $pdf->Cell(100,10,$date."-".$tm,0,0,'L');
				   $pdf->Ln();$pdf->Ln();
				   while($st=$out->fetch_assoc())
				   {   $pdf->SetFont('Arial','',14);
					   $pdf->SetX(20);
					   $staff="#..".$st['name']."(".$st['id'].")";
					   $pdf->Cell(100,10,$staff,0,0,'L');
					   $pdf->Ln();
				   }
			   }
		   }
		  $dd=$date."1";
		    $tm="AN";
		   if($out=$db->query("SELECT * FROM `teacher` WHERE $dd=1 and `dept`='$dp'"))
		   {
			   if($out->num_rows>0)
			   {   $pdf->SetX(30);
				   $pdf->SetFont('Arial','',16);
				   $pdf->Cell(100,10,$date."-".$tm,0,0,'L');
				   $pdf->Ln();
				   $pdf->Ln();
				   while($st=$out->fetch_assoc())
				   {    $pdf->SetFont('Arial','',14);
					    $pdf->SetX(20);
					   $staff=$st["name"]."(".$st["id"].")";
					   $pdf->Cell(100,10,$staff,0,0,'L');
					   $pdf->Ln();
				   }
			   }
		   }
			
		}
	}
	
	
	$pdf->Output();
	?>
</body>
</html>