
<!DOCTYPE html>
<html>
<head>
<title>Rit Examcell</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Ribbon Login Form Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="css/style.css" rel= "stylesheet" type="text/css" />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel="stylesheet" type='text/css'>
  <link href="assets\css\animate.css" rel="stylesheet"/>
<!--/webfonts-->
</head>
<body>
<!--start-main-->
 

<h1 class="animated slideInDown">Welcome To RIT Examcell!</h1>
<div class="login-box">
		<form method="post" action="login.php">
			<input type="text" name="us" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
			<input type="password" name="ps" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
		
		<div class="remember">
			<a href="#"><p>Remember me</p></a>
			<h4>Forgot your password?<a href="#">Click here.</a></h4>
		</div>
		<div class="clear"> </div>
		<div class="btn">
		<?php
			require_once("database.php");
		if(isset($_POST['submit']))
		{$flag=0;
			if(!(isset($_POST['us']))||!(isset($_POST['ps'])))
			{$flag=1;}
		    else{
				$u=$_POST['us'];
				$p=$_POST['ps'];
				$res=$db->query("SELECT name,dept,cat FROM login WHERE user='$u' AND pass='$p'");
				$out=$res->fetch_assoc();
				if(!empty($out))
				{
					$dp=$out['dept'];
					session_start();
					$_SESSION['name']=$out['name'];
					$_SESSION['dept']=$out['dept'];
					if($out['cat']=='admin')
					{
						header('Location:timetablee.php?z=0');
					}
					elseif($out['cat']=='HOD')
					{
						$pn=$out['dept'];
						header('location:hod/staff.php?d='.$pn.'');

					}
					else
					{   $crs=1;
							if($dp=='BA')
							{$crs=2;}
							else if($dp=='MT')
							{$crs=3;}
							else if($dp=='MC')
							{$crs=4;}
						$_SESSION['cr']=$crs;
						
						
						
						header('Location:srs/sertimetable.php');}
				}
				else{$flag=1;}
			}
		 if($flag)
		 {
			 echo "<h4 style=\"color:red\">Invalid Username or Password</h4>";
		 }
		 
		}
		?>
			<input type="submit" name="submit" value="LOG IN" >
		</div>
		</form>
		<div class="clear"> </div>
</div>
<!--//End-login-form-->
<!--start-copyright-->

<!--//end-copyright-->
</body>
</html>
