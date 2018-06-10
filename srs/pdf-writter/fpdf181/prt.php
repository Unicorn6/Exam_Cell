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
	$title=$_GET['title'];
	
	function heading($pdf,$title,$dat,$faa,$csd,$n)
	{
		
		$pdf->SetXY(60,5);
		$pdf->Cell(100,10,$title,0,0,'C');
		$pdf->SetXY(60,15);
		$pdf->Cell(100,10,"RAJIV GANDHI INSTITUTE OF TECHNOLOGY KOTTAYAM",0,0,'C');
		$pdf->SetXY(58,28);
		$pdf->Cell(100,10,"SEATING ARRANGEMENTS",0,0,'C');
		$dat="DATE:".$dat;
		$faa="SESSION:".$faa;
		$csd="BRANCH:".$csd;
		$cls="CLASS:".$n;
		$pdf->SetFont('Arial','',13);
		$pdf->SetXY(20,40);
		$pdf->Cell(50,10,$dat,0,0,'C');
		$pdf->SetXY(145,40);
		$pdf->Cell(50,10,$faa,0,0,'C');
		$pdf->SetXY(20,50);
		$pdf->Cell(60,10,$csd,0,0,'C');
		$pdf->SetXY(145,50);
		$pdf->Cell(50,10,$cls,0,0,'C');
		
		
		$pdf->SetY(20);
		
	}
$pdf= new FPDF();
	 class data
	 {
		 var $id;
		 var $size;
		 var $index;
		 var $reg=array();
		 function data()
		 {
			 $this->id=0;
			 $this->index=0;
			 $this->size=0;
			 $this->reg[1]=0;
		 }
	 }
	
	
	function datasort($n,$st)
	{
		$pl=0;
		$ind=0;
		for($i=1;$i<=$n;$i++)
		{
		  $val=$st[$i]->size-$st[$i]->index;
			if($val>$pl)
			{
				$ind=$i;
				$pl=$val;
				break;
			}
		}
		if($ind!=0 && $i<=$n)
		{
			$st[$i]->index=$st[$i]->size;
		}
		return($ind);
	}
	
	
	$tablename=$_GET['d'];
	if($res=$db->query("SELECT DISTINCT class from `$tablename`"))
	
	{
	while($class=$res->fetch_assoc())
	{   $n=$class['class'];
	    echo $n."</br>";
	    $k=0;
	    $tot=0;
	    $length=strlen($tablename);
	    $las=$length-1;
	    $fp=substr($tablename,$las,$length);
	    $date=substr($tablename,0,$las);
	    echo "----------------></br>".$fp;
	    $faa="FN";
	    if($fp=="1")
		{
			$faa="AN";
		}
	    $hal=substr($n,0,2);
	    if($rep=$db->query("select branch from dept where abb='$hal'"))
		{
		   if($fat=$rep->fetch_assoc())
		    $csd=$fat['branch'];
		   else{
			   echo"Failed to find class abbrevation=".$hal;die();}
		}
		$out=$db->query("select * from `$tablename` where class='$n'");
	     while($r=$out->fetch_assoc())
		 {   
			 if($k==0)
			 {
				 $j=1;
				
			 }
			 else{
				 $id=$r['code'];
				 for($j=1;$j<=$k;$j++)
				 {
					 if($st[$j]->id==$id)
					 {
						 break;
					 }
				 }
			 }
			 if($j>$k)
			 {
				 $st[$j]=new data();
				 $k=$j;
			 }
			 $id=$r['code'];
			 echo "----".$id."</br>";
			 $s=$r['start'];
			 $e=$r['end'];
		     $tot=$tot+$e-$s+1;
			 $st[$j]->id=$id;
			 $in=$st[$j]->size;
			$tp=$db->query("select sid from `$id` where id>=$s and id<=$e");
			 while($q=$tp->fetch_assoc())
			 {
				 ++$in;
				 $st[$j]->reg[$in]=$q['sid'];
			 }
			 $st[$j]->size=$in;
			 
		 }
	     for($p=1;$p<=$k;$p++)
		 {
			 echo $st[$p]->id."--".$st[$p]->size.",,";
		 }
	     echo "</br>".$tot;
	     echo "</br></br>";
	      $x=$db->query("select row,col from `ehall` where rno='$n'");
	      $y=$x->fetch_assoc();
	      $z=datasort($k,$st);
	     if(($tot>40)||($st[$z]->size>20))
		 {
			echo ($y['row']*$y['col']).",,,,,"; 
			 $sz=($y['row']*$y['col']);
		 }
	     else{
			 echo "20".",,,,,,</br>";
			 $sz=20;
		 }
	 $ai=$bi=0;
	  $a=array();
	  $b=array();
	     while($z!=0)
		 {
           for($i=1;$i<=$st[$z]->size;$i++)
		   {
			   ++$ai;
			   $a[$ai]=$st[$z]->reg[$i];
		   }
			$z=datasort($k,$st); 
			 
		 }
	 
	 $pdf->SetFont('Arial','',14);
    $pdf->AddPage();
    heading($pdf,$title,$date,$faa,$csd,$n);
	 $pdf->SetY(30);
    
	 $pdf->SetFont('Arial','',12);
	 $cl=$y['col'];
	 $rwsize=ceil($sz/$cl);
	 $xp=7;
     $yp=65;
	 $p=1;
	 $m=$sz+1;
	 $rc=1;
	 $nrc="C".$rc;
	 $pdf->SetXY($xp,$yp);
	 $pdf->Cell(64,10,$nrc,1,0,'C');
	 $yp=$yp+10;
     for($v=1;$v<=$sz;$v++)
	 {   if($p<=$ai)
	        {$dis=$a[$p];
			$p++;} 
	     else{$dis="";}
		 if($m<=$ai)
	        {$dis1=$a[$m];
			$m++;}
	     else{$dis1="";}
	     
	     $pdf->SetXY($xp,$yp);
		 $pdf->Cell(32,10,$dis,1,0,'C');
		 $pdf->Cell(32,10,$dis1,1,0,'C');
	     $yp=$yp+10;
	     $pdf->Ln();
	     if($v%$rwsize==0)
		 {   $xp=$xp+66;
		     $yp=65;
		  ++$rc;
		  $nrc="C".$rc;
		  $pdf->SetXY($xp,$yp);
		  if($rc<=3){
	 $pdf->Cell(64,10,$nrc,1,0,'C');
		  $yp=$yp+10;}
			 
		 }
	 
	 }
	 
	 
	 
	 for($f=1;$f<=$k;$f++)
	 {
		 $m=$st[$f]->size;
		 $r=1;
		 $v=$st[$f]->id;
		 $pdf->AddPage();
		 $pdf->SetFont('Arial','',25);
		 $na="Attencesheet-".$v;
		 $pdf->SetFont('Arial','',16);
	$pdf->Text(40,20,$na);
	$pdf->Ln(15);
		 while($r<=$m)
			   {
			 $nn=$st[$f]->reg[$r];
				   $r++;
				   $pdf->Cell(20,12);
	    $pdf->Cell(60,12,$nn,1,0,'C');
	    $pdf->Cell(80,12,"",1,0,'C');
		$pdf->Ln();
		 }
	 }
	 
	 
	}}
	
	$table=$tablename."st";
	$out=$db->query("select * from `$table`");
	if($out->num_rows!=0)
	{$pdf->AddPage();
	 $pdf->SetFont('Arial','',14);
	$pdf->SetXY(60,5);
	$ttt="Staff Allocation List:".$date."-".$faa;
    $pdf->Cell(100,10,$ttt,0,0,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->SetXY(15,20);
	$pdf->Cell(30,10,"Class",1,0,'C');
	$pdf->Cell(55,10,"Name",1,0,'C');
	$pdf->Cell(25,10,"Dept",1,0,'C');
	$pdf->Cell(45,10,"Phone.No",1,0,'C');
	$pdf->Cell(25,10,"Type",1,0,'C');
	$pdf->Ln();
	 while($res=$out->fetch_assoc())
	 {   $cls=$res['class'];
		 $name=$res['t1'];
		 $id=substr($name,(strpos($name,'(')+1),(strpos($name,')')));
	     $id=strstr($id,')',true);
		 $d=$db->query("select dept,phno from `teacher` where id='$id'");
		 $ob=$d->fetch_assoc();
		 $dept=$ob['dept'];
	     $phn=$ob['phno'];
	     $t="Inv.";
	  $pdf->SetX(15);
	  $pdf->Cell(30,10,$cls,1,0,'C');
	  $pdf->Cell(55,10,$name,1,0,'C');
	  $pdf->Cell(25,10,$dept,1,0,'C');
	  $pdf->Cell(45,10,$phn,1,0,'C');
	  $pdf->Cell(25,10,$t,1,0,'C');
	  $pdf->Ln();
	  if($res['t2']!=NULL)
	  {
		  $name=$res['t2'];
		 $id=substr($name,(strpos($name,'(')+1),(strpos($name,')')));
	     $id=strstr($id,')',true);
		 $d=$db->query("select dept,phno from `teacher` where id='$id'");
		 $ob=$d->fetch_assoc();
		 $dept=$ob['dept'];
	     $phn=$ob['phno'];
	     $t="Inv.";
	  $pdf->SetX(15);
	  $pdf->Cell(30,10,$cls,1,0,'C');
	  $pdf->Cell(55,10,$name,1,0,'C');
	  $pdf->Cell(25,10,$dept,1,0,'C');
	  $pdf->Cell(45,10,$phn,1,0,'C');
	  $pdf->Cell(25,10,$t,1,0,'C');
	  $pdf->Ln();
	  }
	    $name=$res['re'];
		 $id=substr($name,(strpos($name,'(')+1),(strpos($name,')')));
	     $id=strstr($id,')',true);
		 $d=$db->query("select dept,phno from `teacher` where id='$id'");
		 $ob=$d->fetch_assoc();
		 $dept=$ob['dept'];
	     $phn=$ob['phno'];
	     $t="R";
	  $pdf->SetX(15);
	  $pdf->Cell(30,10,$cls,1,0,'C');
	  $pdf->Cell(55,10,$name,1,0,'C');
	  $pdf->Cell(25,10,$dept,1,0,'C');
	  $pdf->Cell(45,10,$phn,1,0,'C');
	  $pdf->Cell(25,10,$t,1,0,'C');
	  $pdf->Ln();  
	 }
	}
	else
	{
		
	}
	$pdf->Output();
	?>
</body>
</html>