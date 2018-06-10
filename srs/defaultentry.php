<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exam Cell</title>
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
						<h2>Default Number of Students</h2>
                        <h5>Please fill up the below form </h5>
                       
                    </div>
                    <form method="post" action="defaultentry.php">
                      <?php 
						for($i=1;$i<=10;$i++)
						{
                    echo "<label class=\"control-label col-sm-2\" for=".$i.">Semester".$i.":</label>
                                <div class=\"col-sm-10\">
                                  <input type=\"number\" class=\"form-control\" name=".$i." placeholder=\"Approx. No of students\">
                                  <br>
                                </div>";
						}
						?>
						</div>
						</br>
						<div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="sub" class="btn btn-default"></input>
                              
					</form>
			</br>
	
                <?php
	            //require('../database.php');
                if(isset($_POST['sub']))
				{   $flg=1;
				
					if($db->query("DELETE FROM `default` WHERE cr=$crs"))
					{   
						$db->query("INSERT INTO `default` VALUES (0,0,0,0,0,0,0,0,0,0,$crs)");
						for($i=1;$i<=10;$i++)
						{
							if(!(empty($_POST[$i])))
							{
								$m=$_POST[$i];
								if($db->query("UPDATE `default` SET `$i`=$m where cr=$crs"))
								{}
								else{
									
									echo "Insertion Failed....Contact your DB Admin";
									$flg=0;
									break;
								}
							}
						}
					}
					else{
									echo "Insertion Failed....Contact your DB Admin";
									$flg=0;
									
								}
					if($flg){
						
						echo "</br>";
					echo "<div class=\"col-sm-offset-2 col-sm-10\">Insertion Successfull:::>>><a href=\"generate.php\">Generate Students DB</a></div></br></br>";}
					
				}
	?>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
	</div>      <!-- /. PAGE INNER  -->
            
         <!-- /. PAGE WRAPPER  -->
        
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
