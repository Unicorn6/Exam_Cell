<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php
//session_start();
//$dept=$_SESSION['dept'];
$dept="cs";
$dept=$dept."tt";
require_once("database.php");	
$flag=1;
for($i=1;$i<=6;$i++)
{
	if(!empty($_POST['day'][$i]))
	{
		$day=$_POST['day'][$i];
		$s1=$_POST['1'][$i];
		$s2=$_POST['2'][$i];
		$s3=$_POST['3'][$i];
		$s4=$_POST['4'][$i];
		$out=$db->query("INSERT INTO $dept VALUES(STR_TO_DATE('$day','%Y-%m-%d'),'$s1','$s2','$s3','$s4')");
		if($out)
		{
			$result =$db->query("SHOW COLUMNS FROM `ehall` LIKE $day");
			if(empty($result))
			{
				$enter=$db->query("ALTER TABLE `ehall` ADD `$day` INT(1) NOT NULL DEFAULT '0'");
			}
			$tech=$db->query("SHOW COLUMNS FROM `teacher` LIKE $day");
			if(empty($tech))
			{
				$enter1=$db->query("ALTER TABLE `teacher` ADD `$day` INT(1) NOT NULL DEFAULT '0'");
			}
		}
		else{$flag=0;}
	}
}
if($flag)	
{
	header('Location:serclass.html');
}
else{
	echo "Error in insertion";
}	
	
	
?>
<body>
</body>
</html>