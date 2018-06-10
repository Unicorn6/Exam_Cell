<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	  
	<?php
	 require("database.php");
	 $res=$db->query("select distinct date from timetable");
	 while($outy=$res->fetch_assoc())
	 {
		 $date=$outy['date'];
		 $l=0;
		 while($l<2)
		 {
			 $sp=$db->query("SELECT * FROM `timetable` WHERE date like '$date' and fa=$l and (`1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL' or `9` not like 'NULL' or `10` not like 'NULL')");
			 while($opt=$sp->fetch_assoc())
			 {
				 for($i=1;$i<=10;$i++)
		{
			if($opt[$i]!=NULL)
			{   $set=1;
				$perre=$opt[$i];
			    $cr=$opt['course'];
				if($r=$db->query("SELECT DISTINCT subid FROM `subject` WHERE sem=$i AND slot='$perre' AND course=$cr"))
				{   
					while($out=$r->fetch_assoc())
					{$nam=$out['subid'];
						echo $date."-------".$l."-------".$cr."-----".$i.$perre."----".$nam."</br>";
					}
				}
				else{
					echo "FAILED TO READ STUDENTS LIST";die();
				}
				
				
			}
		}
			 }
			 ++$l;
			 echo "</br>";
		 }
	 }
	?>
</body>
</html>