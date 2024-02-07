<?php
session_start();
error_reporting(0);
$success = "";
$error_message = "";

include('includes/config.php');

if(!empty($_POST["submit_email"])) {
	$result = mysqli_query($bd,"SELECT * FROM users WHERE userEmail='" . $_POST["email"] . "'");
	$num = mysqli_num_rows($result);
	
	while($row=mysqli_fetch_array($result))
	{
		$_SESSION['id']=$row['id'];
	}
	
	if($num>0)
	{
		// generate OTP
		$otp = rand(100000,999999);
		// Send OTP
		require_once("send-email.php");
		$mail_status = sendOTP($_POST["email"],$otp);
				
		if($mail_status == 1) {
			$result = mysqli_query($bd,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($bd);
			
			if(!empty($current_id)) {
				$success=1;
			}
		} 
		$_SESSION['login']=$_POST["email"];
		$success=1; 
	} else {
		$error_message = "Email does not exist!";
	}
}

if(isset($_POST['otp_submit']))
{
	$result = mysqli_query($bd,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");  
	$count  = mysqli_num_rows($result);
    
	if(!empty($count)) 
	{
		$result = mysqli_query($bd,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success=2;	
		$extra="register-grievance.php";
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();   
				
	} 
	else 
	{
		$success=1;
		$error_message = "Invalid OTP!";
	}	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GMRS | User login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>

		<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>
				
			  	<a class="brand">
			  	<img src="http://localhost/gmrs/img/logo.png" width="150" height="150" /> Grievance Monitoring and Redressal System | User
			    </a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="http://localhost/gmrs/">
						Back to Portal
						
						</a></li>
						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->


	<!-- Main Content -->
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form name="frmUser" class="form-vertical" method="post" action="">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<?php
							if(!empty($error_message)) {
							?>
								<div class="message error_message"><?php echo $error_message; ?></div>
						<?php
							}
						?>
						
						<?php 
									if(!empty($success == 1)) { 
						?>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
																
								<p style="color:#31ab00;">Check your Email for the OTP</p>
								<input class="span12" type="text" id="otp" name="otp" placeholder="Enter your OTP" required>
																	
								</div>
							</div>
						</div>
						
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
								
								<button type="submit" class="btn btn-primary pull-right" name="otp_submit" Value="Login">Login</button>
								</div>
							</div>
						</div>
						
						<?php 
							} else if ($success == 2) {  ?>
												
						<?php
							}
						else { 
						?>
							
							<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
																
							<input class="span12" type="text" id="email" name="email" placeholder="Enter your Email Id" required>
																				
								</div>
							</div>
						</div>
						
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit_email" value="Submit">Submit</button>
								</div>
							</div>
						</div>
										
						<?php 
							}
						?>										
					</form>
					
					<div class="registration">
		               <h4> &nbsp;&nbsp; Not yet registered?....<a class="" href="registration.php">Register Now!</a>  </h4>
		            </div>
					</br>

		          </form>
								

			</div>
			</div>
			
		</div>
	</div><!--/.wrapper-->
	


<div class="footer">
		<div class="container">
			 <p>Copyright &copy; <a href="http://www.sirmvit.edu/">Sir MVIT</a> | GMRS 2018</p>
			 <p> Developed by the Department of Computer Science & Engineering, Sir MVIT </p>
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body></html>