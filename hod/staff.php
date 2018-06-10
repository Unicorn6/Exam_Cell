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
                     <h2></h2>   
                        <h5></h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <div class="panel panel-default">
                        <div class="panel-heading">
                            Staff Selection Window
                        </div>
                        <div class="panel-body">
                            

                          <form method="post" action="staffinsertion.php?d=<?php echo $deptt;?>">
                            <div class="tab-content">
                                
                               
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<div class="panel-heading"> Check Available Staffs    </div>
                                         
                                         <?php
									if($res=$db->query("SELECT id,desig,name FROM teacher WHERE dept like '$deptt'"))
									{
									while($ary=$res->fetch_assoc())
									{
								
											echo "<table class=\"table table-striped table-bordered table-hover\" id=\"dataTables-example\">";
                                         
                                         
									if($res=$db->query("SELECT id,name,desig FROM teacher WHERE dept like '$deptt'"))
									{
										
										
									while($ary=$res->fetch_assoc())
									{
										
										$class=$ary['id'];
								echo "<tr>
                                           <td><div class=\"form-group input-group\">
      <span class=\"input-group-addon\">
        <input type=\"checkbox\" name=\"".$class."\" value=1 />
      </span>
										<div class=\"form-control\">".$ary['name'].",".$ary['desig']."</div>
    </div></td>
		
	</tr>";
										}}echo "</table>
											   <hr />";
									}}
									?>
                          <input type="submit" value="Insert" style="margin-left: 42%" class="btn btn-primary"/>  
										</form>
                        </div>
                    </div>
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
