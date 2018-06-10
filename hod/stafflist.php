<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <?php
	require_once("database.php");
	
	$deptt=$_GET['d'];
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
                <a class="navbar-brand" href="basic.php"><?php echo "HOD";?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">&nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
               <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="staff.php?d=<?php echo $deptt;?>"><i class="fa fa-dashboard fa-3x"></i>Staff Selector</a>
                    </li>
                      <li  >
                        <a href="stafflist.php?d=<?php echo $deptt;?>"><i class="fa fa-table fa-3x"></i>Duty List</a>
                    </li>
                    <li  >
                        <a href="../pdf-writter/fpdf181/staffprint.php?d=<?php echo $deptt;?>"><i class="fa fa-table fa-3x"></i>Print Out</a>
                    </li>
                     
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Staff Duty List</h2>   
                        <h5>Change if needed </h5>
						<form method="post" action="staffmod.php?d=<?php echo $deptt;?>">
						 <div class="tab-content">
                                <div class="tab-pane fade active in" id="cs">
                       <?php
						require_once('database.php');
						$k=0;
						if($ot=$db->query("SELECT distinct date FROM `timetable` WHERE `1` not like 'NULL' or `2` not like 'NULL' or `3` not like 'NULL' or `4` not like 'NULL' or `5` not like 'NULL' or `6` not like 'NULL' or `7` not like 'NULL' or `8` not like 'NULL'"))
						{
							while($d=$ot->fetch_assoc())
						{ ++$k;
					
					       $dat=$d['date'];
                                                $fa=0;
                                               $date=$dat.$fa;
						    
						if($res=$db->query("SELECT id,name FROM `teacher` WHERE `$date`=1 and dept='$deptt'"))
						{   $ob="FN";echo "
										<h4><div class=\"panel-heading\">".$dat."-".$ob."</div></h4>";
							if($res->num_rows==0)
						        {
									echo "<div class=\"form-control\" style=\"color:blue\">No staff has been allocated from your department.</div></br>";
								}
							while($out=$res->fetch_assoc())
							{   $n=$out['id'];
								echo "			
							<select class=\"form-control\" name=".$n."[".$k."]>
               <option value=".$out['id'].">".$out['name']."</option>";
				      $r=$db->query("SELECT id,name FROM `teacher` WHERE `$date`=0 and dept='$deptt'");
								while($o=$r->fetch_assoc())
								{
               echo "<option value=".$o['id']." >".$o['name']."</option>";
			                    }
               
            echo" </select>
             <br>
           </div>";

							}
							
						}
						                       $fa=1;
                                               $date=$dat.$fa;
						    
						if($res=$db->query("SELECT id,name FROM `teacher` WHERE `$date`=1 and dept='$deptt'"))
						{  ++$k; $ob="AN";echo "
										<h4><div class=\"panel-heading\">".$dat."-".$ob."</div></h4>";
							if($res->num_rows==0)
						        {
									echo "<div class=\"form-control\" style=\"color:blue\">No staff has been allocated from your department.</div></br>";
								}
							while($out=$res->fetch_assoc())
							{   $n=$out['id'];
								echo "			
							<select class=\"form-control\" name=".$n."[".$k."]>
               <option value=".$out['id'].">".$out['name']."</option>";
				      $r=$db->query("SELECT id,name FROM `teacher` WHERE `$date`=0 and dept='$deptt'");
								while($o=$r->fetch_assoc())
								{
               echo "<option value=".$o['id']." >".$o['name']."</option>";
			                    }
               
            echo" </select>
             <br>
           </div>";

							}
							
						}
						}
						}
						?>
						 <div style="padding-left: 46%;">
                     <input type="Submit" name="sub" value="Submit" class="btn  pmd-btn-raised pmd-ripple-effect btn-info .btn-block."/>
                        </div>
						</div></div>
						</form>
                    </div>
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
