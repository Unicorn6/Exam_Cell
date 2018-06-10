 <?php
require('database.php');
require('fpdf.php');
$pdf= new FPDF();
ob_clean();
session_start();
	$name=$_SESSION['name'];
    $deptss=$_SESSION['dept'];
	$yr=$_SESSION['eo'];

class stu
{
	
	public $sem;
	public $st;
	public $ed;
	public $tot;
	function stu(){}
	
}

$tablename=$deptss;
$rr=$db->query("SELECT * FROM `$tablename`");
while($res=$rr->fetch_assoc())
{    $z=0;$k=1;
     if($yr)
	 {$k=0;}
	for($i=1;$i<5;$i++)
	{
		$n=$i."s";
		if($res[$n]!=0)
		{   ++$z;
			$sel[$z]=new stu();
		     $sel[$z]->sem=$i+$k;
		     $sel[$z]->st=$res[$n];
		     $na=$i."e";
		     $sel[$z]->ed=$res[$na];
		     $sel[$z]->tot=$res[$na]-$res[$n];
		     echo $sel[$z]->sem;
			echo $i.",,,,";
			
		}
		$k++;
		
	}
	echo "</br>";
 
    $tem=new stu();
    for($t=1;$t<$z;$t++)
	{
		for($x=$t+1;$x<=$z;$x++)
		{
			if($sel[$t]->tot>$sel[$x]->tot)
			{
				$tem=$sel[$t];
				$sel[$t]=$sel[$x];
				$sel[$x]=$tem;
			}
		}
	}
    echo "Sorting Completed";
    $teanm="Staff::".$res['t1'];
    $clnm="Class:".$res['clsname'];
    $size=24;
    if($res['t2']!=NULL)
	{
		$teanm=$teanm.",".$res['t2'];
		$size=60;
	}
    $rwsize=$size/3;
 
   $pdf->SetFont('Arial','',10);
    $pdf->AddPage();
    
    $pdf->Text(5,5,$clnm);
    
    
    $pdf->Text(140,5,$teanm);
    $a = new stu();
    $b= new stu();
    $a = $sel[1];
    $b=$sel[2];
    $r=$z;
     
     $xp=5;
     $yp=10;
     for($v=1;$v<=$size;$v++)
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
	     if($v%$rwsize==0)
		 {   $xp=$xp+70;
		     $yp=10;
			 
		 }
	     if($r>0){
	     if($a->st==$a->ed+1)
		 {$a=$sel[$r];
		 --$r;}
	     if($b->st==$b->ed+1){$b=$sel[$r];--$r;}}
	     
	 }
      
 
 
 
 
 
 
 
 
  }
$pdf->Output();
?>