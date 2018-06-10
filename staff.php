<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
     require_once('database.php');
	class hall
	{
		var $name;
		var $dis;
		var $size;
		function teach()
		{
			$name=NULL;
			
			$dis=0;
			$size=0;
		}
	}
	class teach{
		var $name;
		var $id;
		var $p;
		function teach()
		{
			$name=NULL;
			$id=0;
			$p=0;
		}
	}
	$d1=$_GET["date1"];
$d2=$_GET["date2"];
	$title=$_GET["title"];
	
	if($res=$db->query("SELECT * from timetable"))// where date between '$d1' and '$d2'"))
	{
		while($out=$res->fetch_assoc())
		{
			$date=$out['date'];
			$fn=$out['fa'];
			$datee=$date.$fn;
			$tname=$date.$fn;
			$sin=0;
			$tot=0;
			if($tt=$db->query("select distinct class,dis from `$tname` order by dis DESC"))
			{
				
				$tot=0;
				while($tch=$tt->fetch_assoc())
				{   
					++$sin;
					$cls[$sin]=new hall();
					$cls[$sin]->name=$tch['class'];
					$cls[$sin]->dis=$tch['dis'];
			        $name=$tch['class'];
					if($qw=$db->query("select start,end,dis from `$tname` where class='$name'"))
					{   echo "qw";
						while($q=$qw->fetch_assoc())
						{
							$sz=$q['end']-$q['start']+1;
							$cls[$sin]->size=$cls[$sin]->size+$sz;
							
						}
					}
					if($cls[$sin]->size>=50)
						$tot=$tot+2;
					else 
						++$tot;
					echo $cls[$sin]->name."-".$cls[$sin]->size."</br>".$tot;
				}
				
			}
			if($sin>0)
			{
				$table=$tname."st";
				echo "Creating Table";
				$db->query("create table `$table`(class varchar(15),t1 varchar(25) default NULL,t2 varchar(25) default NULL,re varchar(25) default NULL)");
				$db->query("delete from `$table` where 1=1");
			}
			$tot=$tot+($sin/3);
			$tot=ceil($tot);
			$ind=0;
			if($r=$db->query("select id,name,pu from `teacher` where `$datee`=1 order by pu"))
			{
				$num=$r->num_rows;
				echo $num.",".$tot;
				if($num<$tot)
				{
					echo "Available staffs are inadiquate.Pls add more staffs for day".$date."</br>";
					die();
				}
				else{
					
					while($tea=$r->fetch_assoc())
					{
						++$ind;
						$staff[$ind]=new teach();
						$staff[$ind]->id=$tea['id'];
						$staff[$ind]->name=$tea['name']."(".$tea['id'].")";
						$staff[$ind]->p=$tea['pu'];
					}
					
				}
				
			}
			
			   $i=$j=1;
			while($i<=$sin)
			{ 
				$clsname=$cls[$i]->name;
				$staffname=$staff[$j]->name;
			    if($db->query("insert into `$table`(class,t1) values('$clsname','$staffname')"))
				{
					$staff[$j]->p=$staff[$j]->p+($cls[$j]->dis*2);
					++$j;
				}
				else 
				{
					echo "insertion Failed";
					die();
				}
				if($cls[$i]->size>50)
				{
					$staffname=$staff[$j]->name;
					if($db->query("update `$table` set t2='$staffname' where class='$clsname'"))
				{
					$staff[$j]->p=$staff[$j]->p+(($cls[$i]->dis)*2);
					++$j;
				}
				else 
				{
					echo "insertion Failed";
					die();
				}
				}
				$i++;
			}
			$i=1;
			
			if($sin%3==1)
			{
				for($i=1;$i<=2;$i++)
				{
					if($i>$sin)
						break;
				$clsname=$cls[$i]->name;
				$staffname=$staff[$j]->name;
				if($db->query("update `$table` set re='$staffname' where class='$clsname'"))
				{
					$staff[$j]->p=$staff[$j]->p+1;
					
				}
				else 
				{
					echo "insertion Failed";
					die();
				}
				}
				++$j;
			}
			$p=0;
			$k=$i;
			for($k=$i;$k<=$sin;$k++)
			{   echo "Hai";
				$clsname=$cls[$k]->name;
				$staffname=$staff[$j]->name;
			    echo $staffname.$clsname;
				if($db->query("update `$table` set re='$staffname' where class='$clsname'"))
				{
					echo $j.$j;
				$p=$p+1;
				if($p==1)
				{
					$staff[$j]->p=$staff[$j]->p+1;
				}
				if($p==3)
				{++$j;echo "entered";
				 
				$p=0;}
				
				}
				else 
				{
					echo "insertion Failed";
					die();
				}
				
			}
			
			for($z=1;$z<=$j;$z++)
			{
				$staffid=$staff[$z]->id;
				$pp=$staff[$z]->p;
				$db->query("update `teacher` set pu=$pp where id='$staffid'");
			}
			
			
		}
	}
	header('location:seating.php?s=1&date1='.$d1.'&date2='.$d2.'&title='.$title.'');
	?>
</body>
</html>