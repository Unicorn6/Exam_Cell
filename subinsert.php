<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Subject Insertion</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
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
                    <div class="col-md-12 ">
                     <h2 class="und">Subject Details Insertion</h2>
                     <hr>
                        <br><br>

                        <form class="form-horizontal box" action="subinsert.php" method="post">
                           <div class="form-group">
                             <label class="control-label col-sm-2" for="Adno">Subject Id:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="adn" placeholder="Enter Sub Id with no spaces">
                                  <br>
                                </div>
                                
                                <label class="control-label col-sm-2" for="Name">Name:</label>
                                   <div class="col-sm-10">
                                     <input type="text" class="form-control" name="name" placeholder="Enter Subject Name">
                                     <br>
                                   </div>
								   
								   
                  <label  class="control-label col-sm-2" for="dept">Department Name:</label>
                   <div class="col-sm-10">
             <select class="form-control" name="dept">
              <?php 
				 if($qw=$db->query("select * from `dept`"))
				 {
					 while($out=$qw->fetch_assoc())
					 {
						 echo "<option value=\"".$out['abb']."\">".$out['branch']."</option>";
					 }
				 }
				 ?>
              
             </select>
             <br>
           </div>

                                   <label  class="control-label col-sm-2" for="sem">Semester:</label>
                                    <div class="col-sm-10">
                              <select class="form-control" name="sem" type="number">
                                <option value=1>S1</option>
                                <option value=2>S2</option>
                                <option value=3>S3</option>
                                <option value=4>S4</option>
                                <option value=5>S5</option>
                                <option value=6>S6</option>
                                <option value=7>S7</option>
                                <option value=8>S8</option>
                                <option value=9>S9</option>
                                <option value=10>S10</option>
                              </select>
                              <br>
                            </div>
							 <label  class="control-label col-sm-2" for="slot">Slot:</label>
                                    <div class="col-sm-10">
                              <input type="text" class="form-control" name="slot" placeholder=" Slot Name ">
                              <br>
                            </div>
                                      <label class="control-label col-sm-2" for="avail">Drawing Hall needed:</label>
                           <label class="radio-inline">
                              <input type="radio" name="optradio" value="1">Yes
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="optradio" value="0">No
                            </label>
                        <br><br>


                        <br><br>
                        <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" name="sub" class="btn btn-default"></input>
                              </div>
                        </div>
                        </form>
                        <?php
                        if(isset($_POST['sub']))
                        {
                         require('database.php');
                        $servername = "localhost";
                        $username = "Examcell";
                        $password = "";

                        // Create connection
                        $adn=$_POST["adn"];
							$adn=strtoupper($adn);
                        $sem=$_POST['sem'];
						$slot=$_POST['slot'];
							$slot=strtoupper($slot);
                        $name=$_POST['name'];
                        $dept=$_POST['dept'];
                        $aval=$_POST['optradio'];
							$crs=1;
							if($dept=='BA')
							{$crs=2;}
							else if($dept=='MT')
							{$crs=3;}
							else if($dept=='MC')
							{$crs=4;}
							$tt=$db->query("select * from `subject` where subid like '$adn'");
							if($tt->num_rows!=0)
							{
								echo "Subject Id not valid";
							}
							
                            else{if ($t=$db->query("INSERT INTO subject(drawhall,sname,dept,slot,sem,subid,course) VALUES ($aval,'$name','$dept','$slot','$sem','$adn',$crs)")) {
                                echo " record inserted successfully";
                            } else {
                                echo "Error:  <br>" ;
                            }}
                          }

                          
                            ?>
     </div>
 </div>

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
