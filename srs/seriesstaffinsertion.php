<!doctype html>
<html>
<head>  
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once("../database.php");
	session_start();
	$name=$_SESSION['name'];
   $dept=$_SESSION['dept'];
	$crs=$_SESSION['cr'];
	$table=$dept."tt";
	
if($dat=$db->query("SELECT distinct date FROM timetable WHERE course=$crs"))
{
	$i=0;
	while($res=$dat->fetch_assoc())
	{
		++$i;
		$date[$i]=$res['date']; 
		/*try{
			if(!($db->query("ALTER TABLE `ehall` ADD `$date[$i]` TINYINT(1) NOT NULL DEFAULT '0'")))
			{
				throw new Exception("error");
			}
		}
		catch(Exception $e){
			die("Cannot create new row in ehall");
		}*/
	}
	echo $i;
	if($val=$db->query("SELECT id FROM `teacher` WHERE dept='$dept'"))
	{
	
		while($class=$val->fetch_assoc())
		{   
			$id=$class['id'];
			for($j=1;$j<=$i;$j++)
			{
				 
				echo "entered</br>";
				
				if(isset($_POST[$id][$j]))
				{    $dtb=$date[$j]."0";
				     echo $date[$j]."</br>";
					$db->query("UPDATE teacher SET `$dtb`= 1 WHERE id='$id'");
				 $dtb=$date[$j]."1";
					$db->query("UPDATE teacher SET `$dtb`= 1 WHERE id='$id'");
				}
			}
		}
	}
	
	
}
	
	header('Location:seating.php?s=0');
	?>
</body>
</html>