<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
	$dept=$_GET['d'];
	require_once('database.php');
						$k=0;
						if($ot=$db->query("SELECT * FROM `timetable` WHERE `1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL'"))
						{
							while($d=$ot->fetch_assoc())
						{ ++$k; 
						  $dat=$d['date'];
                                                  $fa=$d['fa'];
                                                  $dat=$dat.$fa;
						  if($res=$db->query("SELECT id,name FROM `teacher` WHERE `$dat`=1 and dept='$dept'"))
						{   
							while($out=$res->fetch_assoc())
							{   $n=$out['id'];
						        
							    if($_POST[$n][$k]!=$n)
								{   $val=$_POST[$n][$k];
								    echo $n."----".$val;
									$db->query("update `teacher` set `$dat`=0 where id='$n'");
									$db->query("update `teacher` set `$dat`=1 where id='$val'");
								}
						 
							 
							 
							 
							}
						}
						}
							
						}
	header('location:stafflist.php?d='.$dept.'');
	
?>
</body>
</html>