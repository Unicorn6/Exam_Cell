<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require('database.php');
	function rollback($db){
	$st=$db->query("update teacher set pu=0,available=0");
	$xy=$db->query("select * from timetable");
	
	while($out=$xy->fetch_assoc())
	{
		$da=$out['date'];
		$f=$out['fa'];
		$name=$da.$f;
		$db->query("DROP TABLE `$name`");
		$name=$name."st";
		$db->query("DROP TABLE `$name`");
		
		
	 
	 for($i=1;$i<9;$i++)
	 {
		 if($out[$i]!=NULL)
		 {$tn=$out[$i];
		   if($in=$db->query("SELECT DISTINCT subid FROM `subject` WHERE sem=$i AND slot='$tn'"))
					 {
						 while($rw=$in->fetch_assoc())
						 {
					        $tna=$rw['subid'];
					 
				
						 $db->query("DROP TABLE `$tna`");
						 
					 
						 }
					 }
	
		 }
	 }
		
			$na=$out['date'];
			$res=$db->query("ALTER TABLE `ehall` DROP `$na`");
		    $na=$na.$f;
		  $res1=$db->query("ALTER TABLE `teacher` DROP `$na`");
		
	}
	$exe=$db->query("DELETE FROM `timetable` WHERE 1=1");
	}
	rollback($db);
	
	header("location:login.php");
	?>
</body>
</html>