<?php 
require("database.php");
$dept='CS';
$out=$db->query("SELECT id FROM `teacher` WHERE available=1");
if($o=$out->fetch_assoc())
{
	$tot=$out->num_rows;
	echo $tot."</br>";
}
else{echo "Cannt access db";die();}
$out=$db->query("SELECT id FROM `teacher` WHERE available=1 AND dept='$dept'");
if($o=$out->fetch_assoc())
{
	$t=$out->num_rows;
	echo $t."</br>";
}
else{echo "Cannt access db";die();}
$per=$t/$tot;
if($res=$db->query("SELECT * FROM `timetable`"))
{
	$val=$db->query("SELECT * FROM `default`");
	$value=$val->fetch_assoc();
while($out=$res->fetch_assoc())
{
  $fin=0;
  for($i=1;$i<=8;$i++)
  {
	  if($out[$i]!=NULL)
	  {
		 $fin=$fin+$value[$i];
		  
	  }
  }
  if($fin!=0)
  {
	  echo $out['date']."</br>";
	  $not=ceil($fin/40);
	  $not=$not+ceil($not/3);
	  echo $not."</br>";
	  $deptnot=floor($not*$per)+1;
	  $datee=$out['date'];
	  echo "</br>".$deptnot;
	  $rs=$db->query("SELECT id,pu FROM `teacher` WHERE available=1 and dept='$dept' ORDER BY pu");
	  
	   while($result=$rs->fetch_assoc())
	   {
		   if($deptnot==0)
		   {
			   break;
		   }
		   $id=$result['id'];
		   $v=$result['pu']+1;
		   if($db->query("UPDATE `teacher` SET `$datee`=1 WHERE id='$id'"))
		   {
			   $db->query("UPDATE `teacher` SET `pu`=$v WHERE id='$id'");
			   $deptnot=$deptnot-1;
		   }
		   else{echo "Failed to update teacher table";die();}
	   }
	  
  }



}
	
	
	
	
}

else{
	echo "Failed to read timetable";die();
}
$db->query("UPDATE `teacher` SET `pu`=0 WHERE 1=1");