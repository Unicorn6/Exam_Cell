<!doctype html>
<html>
<head>  
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once("database.php");
	
if($dat=$db->query("SELECT DISTINCT date FROM timetable WHERE 1=1"))
{
	$i=0;
	while($res=$dat->fetch_assoc())
	{
		++$i;
		$date[$i]=$res['date']; 
		$db->query("UPDATE ehall SET `$date[$i]`= 0 WHERE 1=1");
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
	if($val=$db->query("SELECT rno FROM `ehall` WHERE 1=1"))
	{
		while($class=$val->fetch_assoc())
		{   
			$id=$class['rno'];
			
			for($j=1;$j<=$i;$j++)
			{
				 
				if(isset($_POST[$class['rno']][$j]))
				{  
					$db->query("UPDATE ehall SET `$date[$j]`= 1 WHERE rno='$id'");
				}
			}
		}
	}
	
	
}
	header('location:seating.php?s=0');
	?>
</body>
</html>