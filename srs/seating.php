 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href= "http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php
	require('../database.php');
	session_start();
	$name=$_SESSION['name'];
   $dept=$_SESSION['dept'];
	$crs=$_SESSION['cr'];
	?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?php echo $name;?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
           <!-- /. NAV TOP  -->
               <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                 <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a     href="serbasic.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li  >
                        <a  class="active-menu" href="sertimetable.php"><i class="fa fa-table fa-3x"></i> Time Table</a>
                    </li>
                     <li>
                        <a  href="defaultentry.php"><i class="fa fa-bar-chart-o fa-3x"></i>Student Selector</a>
                     
                    </li>
                     <li>
                        <a  href="serclass.php"><i class="fa fa-qrcode fa-3x"></i> Class Selection</a>
                    </li>
                      <li>
                        <a  href="serstaff.php"><i class="fa fa-desktop fa-3x"></i> Staff Selection</a>
                    </li>
                     <li>
                        <a  href="seating.php?s=0"><i class="fa fa-edit fa-3x"></i> Gen. Seating Arrangment</a>
                    </li>				
					
					                   
                                	
                </ul>
               

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        
						
						<?php
						require_once("../database.php");$flg=1;
						
						$s=$_GET['s'];
						
						if($s==1)
						{   $d1=$_GET['date1'];
						$d2=$_GET['date2'];
						 $title=$_GET['title'];
							$flg=0;
						 $dd=$db->query("select distinct date from timetable where course=$crs and date between '$d1' and '$d2'");
						 
						 while($dte=$dd->fetch_assoc())
						  { $dwt=$dte['date'];
							$sp=$db->query("SELECT * FROM `timetable` WHERE date like '$dwt' and fa=0 and (`1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL')");
						     $datt=$dwt."0";
						     $dnam=$dwt."-FN";
							if($sp->num_rows>0)
							{echo "<div class=\"form-control\">Seating Arrangement For::<a href=\"pdf-writter/fpdf181/prt.php?d=".$datt."&title=".$title."\">".$dnam."</a></div></br></br>";}
							$sp=$db->query("SELECT * FROM `timetable` WHERE date like '$dwt' and fa=1 and (`1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL')");
						     $datt=$dwt.'1';
						     $dnam=$dwt."-AN";
							if($sp->num_rows>0)
							{echo "<div class=\"form-control\">Seating Arrangement For::<a href=\"pdf-writter/fpdf181/prt.php?d=".$datt."&title=".$title."\">".$dnam."</a></div></br></br>";	}
							
						 }
						}
						elseif($s==2)
						{    $y=1; 
						     $d1=$_POST["date1"];
						     $d2=$_POST["date2"];
						     
							 $da=$db->query("select distinct date from `timetable` where date between '$d1' and '$d2'");
						 
						      if($da->num_rows==0)
							  {
								  echo "<div class=\"form-control\" style=\"color:red\">No data available for the selected dates</div></br>";
								  die();
							  }
						      while($outy=$da->fetch_assoc())
							  {
		                          $date=$outy['date'];
		                          
		                        for($l=0;$l<2;$l++)
		                     { 
							  $count=0;
								 $seld=0;
			 $sp=$db->query("SELECT * FROM `timetable` WHERE date like '$date' and fa=$l and (`1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL' or `9` not like 'NULL' or `10` not like 'NULL')");
							 while($res=$sp->fetch_assoc())
							 {   $af="FN";
							     $faa=$res['fa'];
							     $crr=$res['course'];
							     if($faa)
								 {$af="AN";}
							     $y++;
								 
								 $date=$res['date'];
								 $datee=$date.$faa;
								 for($z=1;$z<=10;$z++)
								 {
									 if($res[$z]!=NULL)
									 {   $na=$res[$z];
									     $seld=1;
										 if($r=$db->query("SELECT DISTINCT subid FROM `subject` WHERE sem=$z AND slot='$na' AND course=$crr"))
				{   
					while($out=$r->fetch_assoc())
					{$tn=$out['subid'];
					
					if($qw=$db->query("SELECT max(id) FROM `$tn`"))
					{
						$opp=$qw->fetch_assoc();
						
						$maxx=$opp['max(id)'];
						
						$count+=$maxx;
					
						
					}
					//else{echo "Failed to read ".$tn;die();}
					}
				}
				else{
					echo "FAILED TO READ STUDENTS LIST";die();
				}
									 }
								}}
							  if($count>0)
								  echo "<div class=\"form-control\">Date: ".$date.",".$af."</div></br>";
							  
								 if($seld==1){
								 $clsneeded=ceil($count/40);
							     $staf=$clsneeded+ceil($clsneeded/3);
								 $cl=$db->query("select * from `ehall` where `$date`=1");
								  if($cl->num_rows>=$clsneeded)
								  {echo "<div class=\"form-control\" style=\"color:blue\">Sufficient Classes are available</div></br>";}
								  else{$flg=0;echo "<div class=\"form-control\" style=\"color:red\">Classes available are inadequate</div></br>";}
							     $cl=$db->query("select * from `teacher` where `$datee`=1");
								  if($cl->num_rows>=$staf)
								  {echo "<div class=\"form-control\" style=\"color:blue\">Sufficient Teachers are available</div></br>";}
								  else{$flg=0;echo "<div class=\"form-control\" style=\"color:red\">Staff available are inadequate.Crosscheck the default value</div></br>";}
								 
							 }
						}}
						if($flg==1)
						{?>
                         <form action="algorithm.php" method="post">
							 <input type="hidden" name="date1" value="<?php echo $d1;?>"/>
                              <input type="hidden" name="date2" value="<?php echo $d2;?>"/>
							 <h2>Enter the Heading For the Print</h2>
                      <input type="text" name="title" class="form-control"
							 placeholder="Title" required/>
                       <input type="submit" style="margin-left: 42%" class="btn btn-primary" value="Gen.Seating Arrangement"/>
                    </div>
                    <?php }
						}
						else{
							?>
							<div class="panel-body">
                            <div class="table-responsive">
                               <form method="post" action="seating.php?s=2">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Start</th>
											<th></th>
											<th>End</th>
										</tr>
									</thead>
									<tbody>
									<tr>
									<td>
										<input type="date" name="date1" required placeholder="YYYY-MM-DD" class="form-control"/></td>
										<td><h4 class="form-control">TO</h4></td>
										<td>
										<input type="date" name="date2" required placeholder="YYYY-MM-DD" class="form-control"/></td>
										</tr>
									</tbody>
								   </table>
								   <hr />
                          <button type="submit" style="margin-left: 42%" class="btn btn-primary">Submit Button</button>

								</form>
								</div>
					</div>
								   
						<?php }?>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
