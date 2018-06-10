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
   <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
</head>
<body>
   <?php
	require_once("database.php");
	session_start();
	//$user=$_SESSION['name'];
	$user="mm";
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
                <a class="navbar-brand" href="#"><?php echo $user;?></a> 
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
				
					
                 
                      <li  >
                        <a  href="timetablee.php?z=0"><i class="fa fa-table fa-3x"></i> Time Table</a>
                    </li>
                      <li>
                        <a  class="active-menu" href="#"><i class="fa fa-bar-chart-o fa-3x"></i> Upload Portal<span class="fa arrow"></span></a>
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
						 </ul>
                    </li>
                        <li  >
                        <a  href="defaultentry.php"><i class="fa fa-square-o fa-3x"></i> Default Entry</a>
                    </li>
                       <li>
                        <a  href="staffalloc.php"><i class="fa fa-desktop fa-3x"></i> Staff Allocation</a>
                    </li>	
                        <li>
                        <a  href="class.php"><i class="fa fa-qrcode fa-3x"></i> Class Selection</a>
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
                     <h2></h2>   
                        <h5></h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                  
						  
                   <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#gt" data-toggle="tab">Genearal Tab</a>
                                </li>
                                <?php 
								
								$rp=$db->query("select branch,abb from dept");
								while($ep=$rp->fetch_assoc())
								{
									$bnam=$ep['branch'];
									$abnam=$ep['abb'];
								?>
                               <li class=""><a href="#<?php echo $abnam;?>" data-toggle="tab"><?php echo $bnam;?></a>
                                </li>
                                <?php
								}
								?>
                              <!--  <li class=""><a href="#ee" data-toggle="tab">Electrical</a>
                                </li>
                                <li class=""><a href="#ec" data-toggle="tab">Electronics</a>
                                </li>
                                <li class=""><a href="#ce" data-toggle="tab">Civil</a>
                                </li>
                                <li class=""><a href="#me" data-toggle="tab">Mechanical</a>
                                </li>
                                <li class=""><a href="#bar" data-toggle="tab">B.Arch</a>
                                </li> -->
                                
                            </ul>

                            <div class="tab-content">
							<h4>Staff Selector</h4>
                                <div class="tab-pane fade active in" id="gt">
                                    <h4>General Information</h4>
                                    <?php 
									if(1==1)
									{
										echo "<div class=\"form-control\" style=\"color:blue\">* Select the names of available staffs in each department.</div></br>";
										echo "<div class=\"form-control\" style=\"color:blue\">* Each time submit button is pressed the selected staffs are made available and others not available.</div></br>";
										echo "<div class=\"form-control\" style=\"color:blue\">* Press the submit button after selecting staff from all departments.</div></br>";
									}
									/*else{
										$s=$s*-1;
										$e=$_GET['e'];
										$br=$_GET['dept'];
										if($e>0)
										{
											echo "<div class=\"form-control\" style=\"color:blue\">Students Details have been successfully uploaded for Semester ".$s." and Dept ".$br."</div></br>";
										}
										else{
											echo "<div class=\"form-control\" style=\"color:red\">Failed to upload,please try again.Verify the excel document for proper Syntax</div></br>";
										}
									}
                                    */
                                echo "</div>";
                                
								$rp=$db->query("select abb from dept");
								while($ep=$rp->fetch_assoc())
								{
									
									$CS=$ep['abb'];
								
                              echo "<div class=\"tab-pane fade\" id=".$CS.">
                                   <h4>Subjects.</h4>
                                 <form method=\"post\" action=\"staffinsertion.php\">
                                    
                                <table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">";
                                         
                                         
									     
									if($res=$db->query("SELECT name,id,desig FROM TEACHER WHERE dept='$CS'"))
									{
									while($ary=$res->fetch_assoc())
									{ $nan=$ary['name']." , ".$ary['desig'];
								echo "<tr>
                                           <td><div class=\"form-group input-group\">
      <span class=\"input-group-addon\">
        <input type=\"checkbox\" name=".$ary['id']." value=1/>
      </span>
										<div class=\"form-control\">".$nan."</div>
    </div></td>
		
	</tr>";
										}}
									
											echo  " </table>  
											   <hr />
                          
                                </div>";
								}
								?>
                              
                            </div>
                        </div>
                        <hr />
                          <input type="submit" value="Submit" style="margin-left: 42%" class="btn btn-primary"/>  
										</form>
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
