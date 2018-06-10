<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
	require_once("../database.php");
	$c=$_GET['c'];
	if($c==1)
		$sa=8;
	else if($c==2)
		$sa=10;
	else if($c==3)
		$sa=4;
	else 
		$sa=6;
	function rollback($db)
	{
		$db->query("DELETE FROM timetable WHERE course=$c");
	}
	
	if(empty($_POST['day'][1]))
	{ 
		$err="Enter the corresponding details";
		$z=-1;
		header('location:timetablee.php?z='.$z.'&err='.$err.'');
		die();
	}
	date_default_timezone_set('GMT'); 
	
	
    
	for($i=1;!(empty($_POST['day'][$i]));$i++)
	{  
		
		
		$d=$_POST['day'][$i];
		
		if(date('Y-m-d') < date('Y-m-d', strtotime($d)) )
		{ 
		  if($db->query("INSERT INTO timetable(date,fa,course) values(STR_TO_DATE('$d','%Y-%m-%d'),0,$c) ")&&($db->query("INSERT INTO timetable(date,fa,course) values(STR_TO_DATE('$d','%Y-%m-%d'),1,$c) ")))	{
			  $result =$db->query("SHOW COLUMNS FROM `ehall` LIKE $d");
			if(empty($result))
			{
			  $enter=$db->query("ALTER TABLE `ehall` ADD `$d` INT(1) NOT NULL DEFAULT '0'");
			}
			
				
			
			  $flag=0;
			  $f=0;
			 
			 for($j=1;$j<=2*$sa;$j++)
			 {   $t=$j;
				 if($j>$sa)
				 {
					 $f=1;
					 $t=$t-$sa;
				 }
				 if($_POST[$j][$i]!="NULL")
				 {
					 $flag=1;
					 $temp=$_POST[$j][$i];
					 $temp=strtoupper($temp);
					 $db->query("UPDATE `timetable` SET `$t`='$temp' WHERE date='$d' AND fa=$f AND course=$c ");
					 $dd=$d.$f;
					 $tech=$db->query("SHOW COLUMNS FROM `teacher` LIKE $dd");
			         if(empty($tech))
			         {
					 $enter1=$db->query("ALTER TABLE `teacher` ADD `$dd` INT(1) NOT NULL DEFAULT '0'");
					 }
					/* if($in=$db->query("SELECT DISTINCT subid FROM `subject` WHERE sem=$t AND slot='$temp' AND course=$c "))
					 {
						 while($rw=$in->fetch_assoc())
						 {
					 $tna=$rw['subid'];
					 $db->query("CREATE Table `$tna`(ID INT(3) PRIMARY KEY AUTO_INCREMENT,SID VARCHAR(15) UNIQUE,DEPT VARCHAR(5),DHALL INT(1) DEFAULT '0')");
						
						 }
					 }
					 else{echo "Failed to create table";die();}*/
				 }
			 }
		  }header('location:sertimetable.php?z=1');
		  
		}
		
		else
		{
			$error="Invalid date is being selected";
		//$db->query("DELETE * FROM timetable");
			rollback($db);
			$z=-1;
			header('location:sertimetable.php?z='.$z.'&err='.$error.'');
		die();
			
		}
	
		
	}
	
	?>
</body>


</html>