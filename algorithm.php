 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

require_once("database.php");
//class representing exam-hall and fuction to assign values into it
	class ehall{
  var $rno;
  var $row;
  var $col;
  var $avail;
  var $draw;
  var $distance;
  var $max;
  var $alloc=0;
  var $remain=0;
  function setvalues($rno, $row, $col, $avail,$draw,$distance)
  {
     $this->rno = $rno;
      $this->row = $row; 
       $this->col = $col;
        $this->avail = $avail;
         $this->draw = $draw;
          $this->distance = $distance;
          $this->max=$row*$col*2;
  }
	}
	//end of class ehall
 /*Class for student info 
   name=subject id
   index=beginning number
   maxval=end number
   remain=no of students appearing 
   as we are storing the reg.no in the database according there index numbers such as 1,2,3.....are being stored in here there fore maxval and remain are same*/
class student 
{
	public $name;
	public $index;
	public $maxval;
	public $remain;
	function student($nm,$maxx)
	{
	  $this->name=$nm;
	  $this->index=1;
	  $this->maxval=$maxx;
	  $this->remain=$maxx;
	}
}
	
	
// function to find the largest student grp at a time based on the remaining value	
function stsort($st,$n)
{
	
	$m=0;
	$ind=0;
	
	for($i=1;$i<=$n;$i++)
	{  
		if($m<$st[$i]->remain)
		{   
			$ind=$i;
			$m=$st[$i]->remain;
		}
	}
	
	
	return($ind);
	
	
	
}
//function to randomize the class reordering there index number
function reorder($k,$st)
{   echo "-----".$k."-------";
	$in=rand(1,30);
	$in=($in%($k));
    echo $in."-----";
	for($b=0;$b<=$k;$b++)
	{   $ob[$b]=new ehall();
		$ob[$b]=$st[$in];
		++$in;
		if($in>$k)
		{$in=0;}
	}
	
	return($ob);
	
}	
	
	
	//fuunction you created ............
function classcap(&$classno,$total,$dd,$db){
  
                              
                          
                                
                                if ($result = $db->query("SELECT * FROM ehall WHERE `$dd`=1 order by distance"))
                                 {
                                      $i=0;
                                      while($row=$result->fetch_assoc())
                                          {
                                              $eobj[$i]=new ehall();
                                                $eobj[$i]->setvalues($row["rno"],$row["row"],$row["col"],$row["avail"],$row["draw"],$row["distance"]);
                                                $i=$i+1;

                                          }
                                }
                                 else {       
                                              echo "0 results".$dd;die();
                                      }


                          
                            
$k=$i-1;
              /*Class allocation*/
              $alloc_remain=$total;
	echo $total."</br>";
              $classno=floor($total/40);
	          echo "First".$classno."</br>";
	echo "Second".$k."</br>";
              $remain=$total%40;
              $totalcap=0;  //total capacity of classes allocated
              $i=0;
              $j=0;         //no of classes allocated so far
              while($j<$classno)
              {
                if($eobj[$i]->avail==1)                 /*allocates default 40 to all available classes*/
                {
                  $eobj[$i]->alloc=40;
                  $alloc_remain-=40;
                  $j=$j+1;
                  $totalcap+=$eobj[$i]->max;
                }
                $i=$i+1;
              }
              if($alloc_remain>0)
              {
                if($total>$totalcap)      ///classess are not enough
                {
                  $classno+=1;

                  while(($j<$classno)&&($i<=$k)&&($alloc_remain!=0))
                  {
                    if($eobj[$i]->avail==1)                 /*allocates remaining to available class*/
                    {

                      $eobj[$i]->alloc=$alloc_remain;
                      $alloc_remain=0;

                      $j=$j+1;
                      $totalcap+=$eobj[$i]->max;
                    }
                    $i=$i+1;
                  }

                }


                else {
                         echo "full mode"."</br>";             //classes are enough,allocate remaining in increasing order of capacity
                            do{
                              $p=0;
                              $y=0;
                              for($m=0;$m<$i;$m++)
                              { echo "Entered"."</br>";
                                if($eobj[$m]->avail==0)
                                    continue;
                                    else if($p<($eobj[$m]->max -$eobj[$m]->alloc))
                                      {
                                        $y=$m;
                                        $p=$eobj[$m]->max -$eobj[$m]->alloc;
                                      }
                                    }
                                            if($alloc_remain>$p)
                                            {
                                        $alloc_remain-=$p;
                                        $eobj[$y]->alloc+=$p;
                                      }
                                        else {
                                            $eobj[$y]->alloc+=$alloc_remain;
                                          $p-=$alloc_remain;
                                          $alloc_remain=0;
                                        }


                            } while($alloc_remain!=0);

                }
              }
	for($i=0;$i<$classno;$i++)
	{
		$eobj[$i]->remain=$eobj[$i]->alloc;
	}
	
	return($eobj);
}
	
	
	
	
	$map=array();
	$t=0;
	
//Getting Students List------------- 
	
	
$d1=$_POST["date1"];
	$d2=$_POST["date2"];
$title=$_POST["title"];
if($res=$db->query("SELECT  distinct date FROM timetable where date between '$d1' and '$d2'"))
{
	while($outy=$res->fetch_assoc())
	{    $t=0;
	     $date=$outy['date'];
		 $l=0;
	 echo $date."</br></br>";
		 for($l=0;$l<2;$l++)
		 {   $total=0;
			 $sp=$db->query("SELECT * FROM `timetable` WHERE date like '$date' and fa=$l and (`1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL' or `9` not like 'NULL' or `10` not like 'NULL')");
			 while($opt=$sp->fetch_assoc())
			 {
				 for($i=1;$i<=10;$i++)
		{
			if($opt[$i]!=NULL)
			{   $set=1;
				$perre=$opt[$i];
				$cr=$opt['course'];
				//selecting the particular course from the slot number
				if($r=$db->query("SELECT DISTINCT subid FROM `subject` WHERE sem=$i AND slot='$perre' AND course=$cr"))
				{   
					while($out=$r->fetch_assoc())
					{$tn=$out['subid'];
					//getting info abt the max no of students for that subject and creating a new class objects array and adding into them
					if(($qw=$db->query("SELECT max(id) FROM `$tn`")) && ($qw->num_rows>0))
					{
						$opp=$qw->fetch_assoc();
						++$t;
						$maxx=$opp['max(id)'];
						$st[$t]=new student($tn,$maxx);
						$map[$tn]=0;
						$total=$total+$maxx;
						echo $tn."</br>";
						echo $maxx."</br>"; 
						
					}
					//else{echo "Failed to read ".$tn;die();}
					}
				}
				else{
					echo "FAILED TO READ STUDENTS LIST";die();
				}
				
				
			}
		}
			 }
			 
			 echo $total."</br>";
			 if($total>0){echo "asap";
	$tabname=$date.$l;
	$dd=$opt['date'];
	$db->query("create table `$tabname`(code varchar(15),class varchar(15),start int(3),end int(3),dis int(3))");
	$db->query("delete from `$tabname` where 1=1");
	$clsind=0;
	$clsobj=classcap($clsind,$total,$date,$db);
	echo "Total Class -----".$clsind."</br></br>";
	$clsobjj=reorder($clsind,$clsobj);
	$clsobjj=$clsobj;
	$stind=stsort($st,$t);
		echo $clsind.$stind; 
		while($stind!=0)
		{
			$cls=$map[$st[$stind]->name];
			if($cls<$clsind)
			{
				$x=$clsobj[$cls]->alloc;
				$clsname=$clsobj[$cls]->rno;
				$crsname=$st[$stind]->name;
				echo "class capacity".$x.$clsobj[$cls]->remain;
				$x=$x/2;
				$size=0;
			  if(($x<=$clsobj[$cls]->remain)&&($st[$stind]->remain>=$x))
			  {
				    $size=$x;
				    
				  echo $clsobj[$cls]->rno."-----".$x."-----".$st[$stind]->name."->>".$size."hai</br>";
				  
				    
			  }
				else if($clsobj[$cls]->remain!=0){
					$size=$st[$stind]->remain;
					if($clsobj[$cls]->remain<$size)
					{$size=$clsobj[$cls]->remain;}
					echo $clsobj[$cls]->rno."-----".$st[$stind]->name."->>".$size."die</br>";
					
				}
				if($size!=0){
				    $st[$stind]->remain-=$size;
					$clsobj[$cls]->remain-=$size;

					//randamize forward or backward
					$ran=rand(1,1000);
					$fb=$ran%2;
					if($fb)
					{
					$std=$st[$stind]->index;
					$end=$std+$size-1;
                    $st[$stind]->index+=$size;
					}
					else{
						$end=$st[$stind]->maxval;
						$std=$end-$size+1;
						$std[$stdind]->maxval=$std-1;
					}
					$diss=$clsobj[$cls]->distance;
					$db->query("insert into `$tabname` values('$crsname','$clsname',$std,$end,$diss)");
					
					}
				    $map[$st[$stind]->name]+=1;
				
				
				
			}
			else{
				echo "where";
				$crsname=$st[$stind]->name;
				for($j=0;$j<$clsind;$j++)
				{   echo $clsobj[$j]->remain."</br>";
					if($clsobj[$j]->remain!=0)
				{   echo "last";
				 $clsname=$clsobj[$j]->rno;
				 $diss=$clsobj[$j]->distance;
					$size=$st[$stind]->remain;
					if($clsobj[$j]->remain<$size)
					{$size=$clsobj[$j]->remain;}
					$st[$stind]->remain-=$size;
					$clsobj[$j]->remain-=$size;
					
					echo $clsobj[$j]->rno."-----".$st[$stind]->name."->>".$size;
					break;
					
				}
			}
			$ran=rand(1,1000);
			$fb=$ran%2;
			if($fb)
			{
			$std=$st[$stind]->index;
			$end=$std+$size-1;
			$st[$stind]->index+=$size;
			}
			else{
				$end=$st[$stind]->maxval;
				$std=$end-$size+1;
				$std[$stdind]->maxval=$std-1;
			}
					$db->query("insert into `$tabname` values('$crsname','$clsname',$std,$end,$diss)");
				
			}
			$stind=stsort($st,$t);
		}
	
	
	
	
	}
		 }
	}
	
	
}
	else  
{echo "Failed to read timetable";die();}
//Students detail updated------------	
header('location:staff.php?date1='.$d1.'&date2='.$d2.'&title='.$title.'');
	
	
?>