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
	$xy=$db->query("select * from timetable");
	$e=0;
	while($out=$xy->fetch_assoc())
	{
		$da=$out['date'];
		$f=$out['fa'];
		$name=$da.$f;
		$db->query("DROP TABLE `$name`");
		$dtp=$name.'st';
		$db->query("DROP TABLE `$dtp`");
	 ++$e;
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
		if($e%2==0)
		{
			$na=$out['date'];
			$nn=$na.'0';
			$nnn=$na.'1';
			
			$res=$db->query("ALTER TABLE `ehall` DROP `$na`");
		  $res1=$db->query("ALTER TABLE `teacher` DROP `$nn`");
			$res1=$db->query("ALTER TABLE `teacher` DROP `$nnn`");
		}
	}
	$exe=$db->query("DELETE FROM `timetable` WHERE 1=1");
		$exe=$db->query("DELETE FROM `default` WHERE 1=1");
		$exe=$db->query("UPDATE `teacher` SET `available`=0 WHERE 1=1");
		
		
	}
	rollback($db);
	
	header("location:login.php");
	?>
</body>
</html>