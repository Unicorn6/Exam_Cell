<!doctype html>
<html>
<head>  
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	require_once("database.php");
	$dept="CS";
	$db->query("UPDATE `teacher` SET `available`= 0");

	if($val=$db->query("SELECT id FROM `teacher`"))
	{
	
		while($class=$val->fetch_assoc())
		{   
			$id=$class['id'];
			
			echo $id."</br>";	 
				
				
				if(isset($_POST[$id]))
				{  
					$db->query("UPDATE `teacher` SET `available`= 1 WHERE id='$id'");
					echo "a";
				}
			
		}
	}
	
	

header('Location:class.php');
	?>
</body>
</html>