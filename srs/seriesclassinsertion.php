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
	
if($dat=$db->query("SELECT distinct date FROM `timetable` WHERE course=$crs"))
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
	if($val=$db->query("SELECT rno FROM `ehall` WHERE rno like '$dept%'"))
	{
	
		while($class=$val->fetch_assoc())
		{   
			$id=$class['rno'];
			for($j=1;$j<=$i;$j++)
			{
				 $var =$id."[".$j."]";
				
				echo $id."</br>";
				if(isset($_POST[$id][$j]))
				{  
					$db->query("UPDATE ehall SET `$date[$j]`= 1 WHERE rno='$id'");
				}
			}
		}
	}
	
	
}
	//header('Location:serstaff.php');
	?>
</body>
</html>