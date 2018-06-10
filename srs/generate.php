<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	session_start();
	$name=$_SESSION['name'];
   $dept=$_SESSION['dept'];
	$crs=$_SESSION['cr'];
	$dtp=$dept;
	require_once("../database.php");
	if($qw=$db->query("select * from `timetable` where course=$crs"))
	{
		while($opt=$qw->fetch_assoc())
			 {
				 for($i=1;$i<=10;$i++)
		{
			if($opt[$i]!=NULL)
			{   
				$perre=$opt[$i];
			    
				if($r=$db->query("SELECT subid FROM `subject` WHERE sem=$i AND slot='$perre' AND course=$crs"))
				{   $t=0;
					$sub=$r->fetch_assoc();
					$sid=$sub['subid'];
					$db->query("DROP TABLE `$sid`");
					$db->query("CREATE Table `$sid`(ID INT(3) PRIMARY KEY AUTO_INCREMENT,SID VARCHAR(15) UNIQUE,DEPT VARCHAR(5),DHALL INT(1) DEFAULT '0')");
					$dt=$db->query("select * from `default` where cr=$crs");
					$rp=$dt->fetch_assoc();
				    $t=$rp[$i];
					if($t==0)
					{
						echo "Total number of students for sem:".$i.",is not given";
						die();
					}
				    else
					{
						for($k=1;$k<=$t;$k++)
						{$ntm="S".$i.":".$k;
					    $xy=$db->query("INSERT INTO `$sid`(`SID`,`DEPT`) VALUES ('$ntm','$dtp')");
					}
					}
					
				}
			}
		}
			 }
		
		
	}
header('Location:serclass.php');
?>


<body>
</body>
</html>