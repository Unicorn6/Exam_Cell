<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Window</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet" type='text/css' />
   <script type="text/javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>


</head>
<body>
   <?php
	require_once("../database.php");
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
                <a class="navbar-brand" href=""><?php echo $name;?></a>
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
                 <div class="table-responsive">
                               <form method="post" action="table-evalmodified.php?c=1">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="text-align: center">
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
		echo"</tr><tr>";}}
                          ?>
                                   
									</tbody>
								   </table>
                         <hr />
                          <button type="submit" style="margin-left: 42%" class="btn btn-primary">Submit Button</button>

								</form>
							
                 
               
    </div>
                </div>
                 <!-- /. ROW  -->

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
