  <?php
   $pdf->SetFont('Arial','',10);
    $pdf->AddPage();
    $a = new stu();
    $b= new stu();
    $a = $sel[1];
    $b=$sel[2];
    $r=$z;
     
     $xp=5;
     $yp=10;
     for($v=1;$v<=60;$v++)
	 {   if($a->st<=$a->ed)
	        {$dis="S".$a->sem.":".$a->st;
			$a->st=$a->st+1;}
	     else{$dis="";}
		 if($b->st<=$b->ed)
	        {$dis1="S".$b->sem.":".$b->st;
			$b->st=$b->st+1;}
	     else{$dis1="";}
	     $yp=$yp+10;
	     $pdf->SetXY($xp,$yp);
		 $pdf->Cell(25,10,$dis,1,0,'C');
		 $pdf->Cell(25,10,$dis1,1,0,'C');
	     $pdf->Ln();
	     if($v%20==0)
		 {   $xp=$xp+70;
		     $yp=10;
			 
		 }
	     if($r>0){
	     if($a->st==$a->ed+1)
		 {$a=$sel[$r];
		 --$r;}
	     if($b->st==$b->ed+1){$b=$sel[$r];--$r;}}
	     
	 }

?>