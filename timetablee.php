<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Exam Cell Automation</title>
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
                     <h2>Time Table For Btech</h2>   
                        <h5>Fill the slots with correspoonding subject code. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <?php
					 {
					 $z=$_GET['z'];
					 if($z==-1)
					 {
						 echo "<img style=\"margin-left: 35%;margin-top:10%\" src=\"assets/img/error.jpg\"/>";
						echo "<div class=\"panel-heading\" style=\"color:red\">**".$_GET['err']."</div>";
					 }
					 else if($z==1)
					 {
					  echo "<img style=\"margin-left: 25%;margin-top:10%\" src=\"assets/img/done.jpg\"/>"; 
					 }
					 else{
						 
					 ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table Viewer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <form method="post" action="table-evalmodified.php?c=1">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <?php 
						                     $h=8;
						                     
						            
                                            echo "<th>Date</th>";
                                            for($b=1;$b<=$h;$b++)
											{$br="S".$b;                                            echo "<th>".$br."</th>";
											}
						 ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
						            $f=2*$h;
                                    for($i=1;$i<=12;$i++)
                                    {
                                    echo "<tr>";
	echo "	<td rowspan=\"2\"><input type=\"date\" class=\"form-control\" name=\"day[".$i."]\" placeholder=\"YYYY-MM-DD\"/></td>";
										for($j=1;$j<=$f;$j++)
										{
											if($j>$h)
											{
												$it=$j-$h;
											}
											else{$it=$j;}
	echo "	<td><select class=\"form-control\" name=\"".$j."[".$i."]\">
	<option value=\"NULL\">Subject</option>";
	 $ot=$db->query("select distinct slot from subject where sem=$it");
		while($res=$ot->fetch_assoc())
		{
	echo "<option value=".$res['slot'].">".$res['slot']."</option>";
		}
	echo "</select></td>";
		if($j==$h)
		echo"</tr><tr>";}
										/*
	echo "	<td><select class=\"form-control\" name=\"2[".$i."]\">
	<option value=\"NULL\">Subject</option>
	<option value=\"a\">A</option>
	<option value=\"b\">B</option>
	<option value=\"c\">C</option>
	<option value=\"d\">D</option>
	<option value=\"e\">E</option>
	<option value=\"f\">F</option></select>
	</td>";
		echo "	<td><select class=\"form-control\" name=\"3[".$i."]\">
	<option value=\"NULL\">Subject</option>
	<option value=\"a\">A</option>
	<option value=\"b\">B</option>
	<option value=\"c\">C</option>
	<option value=\"d\">D</option>
	<option value=\"e\">E</option>
	<option value=\"f\">F</option></select>
	</td>";
		echo "	<td><select class=\"form-control\" name=\"4[".$i."]\">
	<option value=\"NULL\">Subject</option>
	<option value=\"a\">A</option>
	<option value=\"b\">B</option>
	<option value=\"c\">C</option>
	<option value=\"d\">D</option>
	<option value=\"e\">E</option>
	<option value=\"f\">F</option></select>
	</td>";
		echo "	<td><select class=\"form-control\" name=\"5[".$i."]\">
	<option value=\"NULL\">Subject</option>
	<option value=\"a\">A</option>
	<option value=\"b\">B</option>
	<option value=\"c\">C</option>
	<option value=\"d\">D</option>
	<option value=\"e\">E</option>
	<option value=\"f\">F</option></select>
	</td>";
		echo "	<td><select class=\"form-control\" name=\"6[".$i."]\">
	<option value=\"NULL\">Subject</option>
	<option value=\"a\">A</option>
	<option value=\"b\">B</option>
	<option value=\"c\">C</option>
	<option value=\"d\">D</option>
	<option value=\"e\">E</option>
	<option value=\"f\">F</option></select>
	</td>";
		echo "	<td><input type=\"text\" class=\"form-control\" name=\"7[".$i."]\" placeholder=\"FN\"/></td>";
		echo "	<td><input type=\"text\"  class=\"form-control\" name=\"8[".$i."]\" placeholder=\"FN\"/></td>";
   echo"</tr><tr>";
   	    echo "<td><input type=\"text\" class=\"form-control\" name=\"9[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"10[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"11[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"12[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"13[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"14[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"15[".$i."]\" placeholder=\"AN\"/></td>";
		echo "<td><input type=\"text\" class=\"form-control\" name=\"16[".$i."]\" placeholder=\"AN\"/></td>";
	echo "</tr>";*/
                                    }
                          ?>
                                   
									</tbody>
								   </table>
                         <hr />
                          <button type="submit" style="margin-left: 42%" class="btn btn-primary">Submit Button</button>

								</form>
							
                 
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
       <?php } }?>
        
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
