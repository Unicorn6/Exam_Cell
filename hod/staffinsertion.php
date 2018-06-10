<!doctype html>
<html>
<head>  
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once("database.php");
	
	$dept=$_GET['d'];
	echo $dept;
	if($val=$db->query("SELECT id FROM `teacher` WHERE 1=1 and dept='$dept'"))
	{    $db->query("UPDATE `teacher` SET `available`= 0 WHERE dept='$dept'");
		while($class=$val->fetch_assoc())
		{   
			$id=$class['id'];
			
				if(isset($_POST[$id]))
				{  
					$db->query("UPDATE `teacher` SET `available`= 1 WHERE `id`='$id'");
				}
			}
		}
	else{
		echo "Insertion Failed";die();
	}
	
	header('location:stafflist.php?d='.$dept.'');

	?>
</body>
</html>