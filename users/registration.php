<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
// Check if the email is duplicate. If duplicate, dont register. 
$email=mysqli_real_escape_string($bd,$_POST['email']);	
$result =mysqli_query($bd,"SELECT userEmail FROM users WHERE userEmail='$email'");
$count=mysqli_num_rows($result);
if($count>0)
{
$msg="Email already exists. Please proceed towards Sign-In.";} 
else
{
$fullname=mysqli_real_escape_string($bd,$_POST['fullname']);
$contactno=mysqli_real_escape_string($bd,$_POST['contactno']);
$gender=mysqli_real_escape_string($bd,$_POST['gender']);
$password=mysqli_real_escape_string($bd,$_POST['password']);
$address=mysqli_real_escape_string($bd,$_POST['address']);

$query=mysqli_query($bd,"insert into users(fullName,userEmail,contactNo,gender,address,password) values('$fullname','$email','$contactno','$gender','$address','$password')");
$msg="Citizen registration successful. Now You can Login!";
} //end else
	
} //end submit
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>GMRS | Citizen Registration</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

<script language="javascript">	
function ValidateEmail(inputText)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputText.value.match(mailformat))  
{  
document.myForm.email.focus();  
return true;  
}  
else  
{  
alert("You have entered an invalid Email Address!");  
document.myForm.email.focus();  
return false;  
}  
}    
</script>	
	
  </head>

<body>

		<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand">
			  		<img src="http://localhost/gmrs/img/grievance.jpg" width="100" height="100" /> Grievance Monitoring and Redressal System | Citizen Registration
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
					<form class="form-vertical" name="myForm" method="post">
						<div class="module-head">
							<h3>Registration</h3>
						</div>
						<p style="padding-left: 1%; color: green">
		        	<?php if($msg){
					echo htmlentities($msg);
		        	}?> </p>
					
					<div class="module-body">
					
					<div class="control-group">
						<label class="control-label">Full Name: </label>
					<div class="controls">
						<input type="text" placeholder="Enter your Name" id="fullname" name="fullname" class="span3" required>
					</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Gender:</label>
						<div class="controls">
						<select name="gender" class="span3" required>
							<option value="Male" selected>Male</option> 
							<option value="Female">Female</option>
						</select>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Password: </label>
					<div class="controls">
						<input type="password" placeholder="Enter your Password" id="password" name="password" class="span3" required>
					</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Email:  </label>
					<div class="controls">
						<input class="span3" type="email" placeholder="Enter your Email ID" id="email" name="email" required>
						<span id="user-availability-status" style="font-size:12px;"></span>
					</div>
					</div>
					
				<div class="control-group">
					<label class="control-label">Mobile Number: </label>
				<div class="controls">
					<input class="span3" type="text" maxlength="10" name="contactno" placeholder="Enter your Mobile Number" required="required">
				</div>
				</div>		

				<div class="control-group">
						<label class="control-label">Address: </label>
					<div class="controls">
						<input type="text" placeholder="Enter your Address" id="address" name="address" class="span3" required>
					</div>
					</div>				
						
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-left" name="submit" onClick="ValidateEmail(document.myForm.email);">Register</button>
									
								</div>
							</div>
						</div>
						</div>
						
					<div class="registration">
		                <h4> &nbsp; &nbsp; Already Registered...<a class="" href="index.php"> Sign in </a> </h4>
		            </div>
					</form>
					
					</div>
			</div>
			
		</div>
	</div><!--/.wrapper-->

	<?php include('includes/footer.php');?>
	
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>