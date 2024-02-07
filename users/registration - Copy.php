<?php
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=mysqli_real_escape_string($bd,$_POST['fullname']);
	$email=mysqli_real_escape_string($bd,$_POST['email']);
	$usertype=mysqli_real_escape_string($bd,$_POST['usertype']);
	$contactno=mysqli_real_escape_string($bd,$_POST['contactno']);
	$usn=mysqli_real_escape_string($bd,$_POST['usn']); // This field contains USN for student or ID for Faculty
	$department=mysqli_real_escape_string($bd,$_POST['department']);
	$status=1;
	$query=mysqli_query($bd,"insert into users(fullName,userEmail,contactNo,status,usertype,usn,department) values('$fullname','$email','$contactno','$status','$usertype','$usn','$department')");
	$msg="Registration successful. Now You can Login !";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>GMRS | User Registration</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
<script>

function userAvailability() {
	alert("Hello");
alert($('#fullname'.val()));
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
	alert(data);
$("#user-availability-status").html(data);
},
error:function (){}
});
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
			  		Grievance Monitoring and Redressal System | User Registration
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
					<form class="form-vertical" method="post">
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
						<label class="control-label">Email:  </label>
					<div class="controls">
						<input class="span3" type="email" placeholder="Enter your Email ID" id="email" onBlur="userAvailability()" name="email" required>
						<span id="user-availability-status" style="font-size:12px;"></span>
					</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Type of User:</label>
						<div class="controls">
						<select name="usertype" class="span3" required>
							<option value="Student" selected>Student</option> 
							<option value="Parent">Parent</option>
							<option value="Faculty">Faculty</option>
							<option value="Other">Other</option>
						</select>
						</div>
					</div>

				<div class="control-group">
						<label class="control-label">USN (if student) or ID (if faculty): </label>
					<div class="controls">
						<input type="text" placeholder="Enter your USN / ID" id="usn" name="usn" class="span3" required>
					</div>
					</div>
					
				<div class="control-group">
				<label class="control-label" for="basicinput">Department: </label>
				<div class="controls">
				<select name="department" class="span3" required>
				<option value="Computer Science and Engineering">Computer Science and Engineering</option>
				<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
				<option value="Biotechnology">Biotechnology</option>
				<option value="Civil Engineering">Civil Engineering</option>
				<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
				<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
				<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>	
				<option value="Information Science and Engineering">Information Science and Engineering</option>
				<option value="Mechanical Engineering">Mechanical Engineering</option>
				<option value="Telecommunication Engineering">Telecommunication Engineering</option>
				<option value="Management Studies">Management Studies (MBA)</option>
				<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
				<option value="Other">Other</option>
				</select>
				</div>
				</div>

												
				<div class="control-group">
					<label class="control-label">Mobile Number: </label>
				<div class="controls">
					<input class="span3" type="text" maxlength="10" name="contactno" placeholder="Enter your Mobile Number" required="required">
				</div>
				</div>							
						
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-left" name="submit">Register</button>
									
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