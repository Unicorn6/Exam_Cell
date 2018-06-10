 <!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Class Selection</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<?php
	require_once("../database.php");
    session_start();
	$name=$_SESSION['name'];
   $dept=$_SESSION['dept'];
	$crs=$_SESSION['cr'];
   $tt=$dept."tt";
	
   ?>
<script>

function Select(idname)
		{
			if(document.getElementById(idname).checked)
				{
					
					
					<?php
					$out=$db->query("SELECT COUNT(distinct date) FROM timetable WHERE course=$crs");
					$o=$out->fetch_assoc();
					$n=$o['COUNT(distinct date)'];
					for($i=1;$i<=$n;$i++){
						echo "var name=idname+\"[".$i."]\";";
						
						
					echo "document.getElementById(name).checked = true;";}
					?>
			

		}
			else
				{
					<?php
		for($i=1;$i<=$n;$i++){
					echo "var name=idname+\"[".$i."]\";
					
		  document.getElementById(name).checked = false;";}
					?>

		}
		}

	
	

</script>
<body>
   
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
                <div class="row">
                    <div class="col-md-12">
                     <h2>Exam Hall Selection</h2>

                    </div>
                </div>
                 <!-- /. ROW  -->
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            Exam Hall Selection Window
                        </div>
                        <div class="panel-body">
                            <form method="post" action="seriesclassinsertion.php">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="cs">
                               
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<div class="panel-heading"> Default Selector     </div>
                                         
                                         <?php
									if($res=$db->query("SELECT rno FROM ehall WHERE rno like '$dept%' AND avail=1"))
									{
									while($ary=$res->fetch_assoc())
									{
								echo "<tr>
                                           <td><div class=\"form-group input-group\">
      <span class=\"input-group-addon\">
        <input type=\"checkbox\" id=".$ary['rno']." onClick=\"Select(this.id)\"/>
      </span>
										<div class=\"form-control\">".$ary['rno']."</div>
    </div></td>
		
	</tr>";
										}}
									?>
											   </table>  
											   <hr />
                         <?php
									if($dat=$db->query("SELECT distinct date FROM timetable WHERE course=$crs"))
									{
										$i=0;
										while($date=$dat->fetch_assoc())
										{
											++$i;
											echo "<table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">";
                                         
                                         
									if($res=$db->query("SELECT rno FROM ehall WHERE rno like '$dept%'"))
									{
										echo "<h4>".$date['date']."</h4>";
										
									while($ary=$res->fetch_assoc())
									{
										
										$class=$ary['rno'];
								echo "<tr>
                                           <td><div class=\"form-group input-group\">
      <span class=\"input-group-addon\">
        <input type=\"checkbox\" name=\"".$class."[".$i."]\"id=".$class."[".$i."] value=1 />
      </span>
										<div class=\"form-control\">".$class."</div>
    </div></td>
		
	</tr>";
										}}echo "</table>";
											
										}
									}
									?>
      
                                </div>
                    </div>
                    <div style="padding-left: 46%;">
                     <input type="Submit" name="sub" value="Submit" class="btn  pmd-btn-raised pmd-ripple-effect btn-info .btn-block."/>
                        </div>
							</form>

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
