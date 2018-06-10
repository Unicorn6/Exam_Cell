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





if($rest=$db->query("SELECT DISTINCT date FROM `timetable`"))
{
	while($tm=$rest->fetch_assoc())
	{ $date=$tm['date'];
	 echo $date."</br>";
	  if($res=$db->query("select * from `timetable` where date like '$date' and fa=0"))
	  { $fin=0;
	
         while($out=$res->fetch_assoc())
         { $cp=$out['course'];
		   
           if($q=$db->query("select * from `default` where cr=$cp"))
		   { $value=$q->fetch_assoc();
            for($i=1;$i<=8;$i++)
             { echo "e";
	           if($out[$i]!=NULL)
	            {
		           $fin=$fin+$value[$i];
		  
	            }
              }
	
		 }
		 }
	
	
  if($fin!=0)
  {   echo $fin."</br>";
	  echo $out['date']."</br>";
	  $not=ceil($fin/40);
	  $not=$not+ceil($not/3);
	  echo $not."</br>";
	  $trem=$not;
	  
	  $fa=$out['fa'];
	  $datee=$date.'0';

	  
	  if($dpt=$db->query("select abb from dept"))
{
	while($dt=$dpt->fetch_assoc())
	{
		$dept=$dt['abb'];
		echo "</br>".$dept."</br>";
     $db->query("UPDATE `teacher` SET `$datee`=0 WHERE dept='$dept'" );
	  $rs=$db->query("SELECT id,pu FROM `teacher` WHERE available=1 and dept='$dept' ORDER BY pu");
	 $dpp=$rs->num_rows;
		$deptnot=ceil($not*$dpp);
		if($trem!=0)
		{
	       while($result=$rs->fetch_assoc())
	   {
		   if($deptnot==0||$trem==0)
		   {
			   break;
		   }
		   $id=$result['id'];
		   $v=$result['pu']+1;
		   if($db->query("UPDATE `teacher` SET `$datee`=1 WHERE id='$id'"))
		   {
			   $db->query("UPDATE `teacher` SET `pu`=$v WHERE id='$id'");
			   $deptnot=$deptnot-1;
			   $trem=$trem-1;
		   }
		   else{echo "Failed to update teacher table";die();}
	   }
	  
      }

	}}

}
	
	}	

	 
	 
	 if($res=$db->query("select * from `timetable` where date like $date and fa=1"))
	  { $fin=0;
	
         while($out=$res->fetch_assoc())
         { $cp=$out['course'];
           if($q=$db->query("select * from `default` where cr=$cp"))
		   { $value=$q->fetch_assoc();
            for($i=1;$i<=8;$i++)
             {
	           if($out[$i]!=NULL)
	            {
		           $fin=$fin+$value[$i];
		  
	            }
              }
	
		 }
		 }
	
	
  if($fin!=0)
  {
	  echo $out['date']."</br>";
	  $not=ceil($fin/40);
	  $not=$not+ceil($not/3);
	  echo $not."</br>";
	  $trem=$not;
	  $datee=$out['date'];
	  $fa=$out['fa'];
	  $datee=$date.'1';
	  echo $deptnot."</br>";
	  
	  if($dpt=$db->query("select abb from dept"))
{
	while($dt=$dpt->fetch_assoc())
	{
		$dept=$dt['abb'];
		echo "</br>".$dept."</br>";
     $db->query("UPDATE `teacher` SET `$datee`=0 WHERE dept='$dept'" );
	  $rs=$db->query("SELECT id,pu FROM `teacher` WHERE available=1 and dept='$dept' ORDER BY pu");
	 $dpp=$rs->num_rows;
		$deptnot=ceil(not*$dpp);
		if($trem!=0 && $deptnot!=0 )
		{
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
			   $trem=$trem-1;
		   }
		   else{echo "Failed to update teacher table";die();}
	   }
	  
      }

	}}

}
	
	}	
	
	
	 
	 
	 
	 
	 
	 
	
}
}

else{
	echo "Failed to read timetable";die();
}
header('location:class.php');
//$db->query("UPDATE `teacher` SET `pu`=0 WHERE 1=1");