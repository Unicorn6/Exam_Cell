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
	require('database.php');
	session_start();
	$name=$_SESSION['name'];
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
font-size: 16px;">&nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a   href="basic.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                      <li  >
                        <a href="#"><i class="fa fa-table fa-3x"></i> Time Table<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="timetablee.php?z=0">B.tech</a>
                            </li>
                            <li>
                                <a href="timetablebarch.php?z=0">B.arch</a>
                            </li>
                            <li>
                                <a href="timetablemtech.php?z=0">M.tech</a>
                            </li>
                            <li>
                                <a href="timetablemca.php?z=0">MCA</a>
                            </li>
                            </ul>
                    </li>
                      <li>
                        <a  href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Upload Portal<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="upload.php?s=1">Semester 1</a>
                            </li>
                            <li>
                                <a href="upload.php?s=2">Semester 2</a>
                            </li>
                            <li>
                                <a href="upload.php?s=3">Semester 3</a>
                            </li>
                            <li>
                                <a href="upload.php?s=4">Semester 4</a>
                            </li>
                            <li>
                                <a href="upload.php?s=5">Semester 5</a>
                            </li>
                            <li>
                                <a href="upload.php?s=6">Semester 6</a>
                            </li>
                            <li>
                                <a href="upload.php?s=7">Semester 7</a>
                            </li>
                            <li>
                                <a href="upload.php?s=8">Semester 8</a>
                            </li>
                            <li>
                                <a href="upload.php?s=9">Semester 9</a>
                            </li>
                            <li>
                                <a href="upload.php?s=10">Semester 10</a>
                            </li>
						 </ul>
                    </li>
                       <li  >
                        <a class="active-menu" href="#"><i class="fa fa-square-o fa-3x"></i> Default Entry<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="defaultentry.php?z=1">B.tech</a>
                            </li>
                            <li>
                                <a href="defaultentry.php?z=2">B.arch</a>
                            </li>
                            <li>
                                <a href="defaultentry.php?z=3">M.tech</a>
                            </li>
                            <li>
                                <a href="defaultentry.php?z=4">MCA</a>
                            </li>
                            </ul>
                    </li>
                       <li>
                        <a  href="staffalloc.php"><i class="fa fa-desktop fa-3x"></i> Staff Allocation</a>
                    </li>	
                        <li>
                        <a href="class.php"><i class="fa fa-qrcode fa-3x"></i> Class Selection</a>
                    </li>
                   
                     <li>
                        <a  href="seating.php?s=0"><i class="fa fa-edit fa-3x"></i> Gen. Seating Arrangment</a>
                    </li>				
					
					                   
                     <li>
                                  <a href="#"><i class="fa fa-sitemap fa-3x"></i> Database Management<span class="fa arrow"></span></a>
                                  <ul class="nav nav-second-level">
                                      <li>
                                          <a href="#">Faculty Database<span class="fa arrow"></span></a>
                                          <ul class="nav nav-third-level">
                                              <li>
                                                  <a href="facview.php">View Faculty</a>
                                              </li>
                                              <li>
                                                  <a href="facinsert.php">Insert Faculty</a>
                                              </li>
                                              <li>
                                                  <a href="facdelete.php">Delete Faculty</a>
                                              </li>
                                              <li>
                                                  <a href="facmodify.php">Modify Faculty</a>
                                              </li>

                                          </ul>
                                      </li>
                                      <li>
                                          <a href="#">Subject Database<span class="fa arrow"></span></a>
                                          <ul class="nav nav-third-level">
                                             <li>
                                                  <a href="subview.php">View Subjects</a>
                                              </li>
                                              <li>
                                                  <a href="subinsert.php">Insert Subject</a>
                                              </li>
                                              <li>
                                                  <a href="subdelete.php">Delete Subject</a>
                                              </li>
                                              <li>
                                                  <a href="submodify.php">Modify Subject</a>
                                              </li>

                                          </ul>
                                      </li>
                                      <li>
                                          <a href="#">Exam Hall Database<span class="fa arrow"></span></a>
                                          <ul class="nav nav-third-level">
                                             <li>
                                                  <a href="hallview.php">View Exam Hall</a>
                                              </li>
                                              <li>
                                                  <a href="hallinsert.php">Insert Exam Hall</a>
                                              </li>
                                              <li>
                                                  <a href="halldel.php">Delete Exam Hall</a>
                                              </li>
                                              <li>
                                                  <a href="hallmodify.php">Modify Exam Hall</a>
                                              </li>

                                          </ul>

                                      </li>
                                  </ul>
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
                    <form method="post" action="defaultentry.php?z=<?php $z=$_GET['z'];echo $z?>">
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
	require('database.php');
                if(isset($_POST['sub']))
				{   $flg=1;
				 $z=$_GET['z'];
					if($db->query("DELETE FROM `default` WHERE cr=$z"))
					{   
						$db->query("INSERT INTO `default` VALUES (0,0,0,0,0,0,0,0,0,0,$z)");
						for($i=1;$i<=10;$i++)
						{
							if(!(empty($_POST[$i])))
							{
								$m=$_POST[$i];
								if($db->query("UPDATE `default` SET `$i`=$m where cr=$z"))
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
					if($flg){echo "Insertion Successfull.";}
					
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
