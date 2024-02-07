
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
        
if(isset($_POST['submit']))
{
	$salutation=$_POST['salutation'];
	$name=$_POST['name'];
	$designation=$_POST['designation'];
	$department=$_POST['department'];
	$contactNo=$_POST['contactNo'];
	$emailId=$_POST['emailId'];
			
$sql=mysqli_query($bd,"insert into member(salutation,name,designation,department,contactNo,emailId) values('$salutation','$name','$designation','$department','$contactNo','$emailId')");
$_SESSION['msg']="Member added Successfully !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($bd,"delete from member where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Member deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Member</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Member</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="Member" method="post" >

<div class="control-group">
<label class="control-label" for="basicinput">Salutation</label>
<div class="controls">
<select name="salutation" class="span8 tip" required>
<option value="Prof" selected>Prof</option> 
<option value="Dr">Dr</option>
<option value="Mr">Mr</option>
<option value="Ms">Ms</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Name</label>
<div class="controls">
<input type="text" placeholder="Enter Member Name" id="name" name="name" class="span8 tip" required autofocus>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Designation</label>
<div class="controls">
<select name="designation" class="span8 tip" required>
<option value="Professor">Professor</option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor" selected>Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Department</label>
<div class="controls">
<select name="department" class="span8 tip" required>
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
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Contact Number</label>
<div class="controls">
<input type="text" placeholder="Enter Contact Number" id="contactNo" maxlength="10" name="contactNo" class="span8 tip">
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Email Id</label>
<div class="controls">
<input type="text" placeholder="Enter Email Address" id="emailId" name="emailId" class="span8 tip">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Submit</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Manage Members</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display">
									<thead>
										<tr>
											<th>#</th>
											<th>Salutation</th>
											<th>Name</th>
											<th>Designation</th>
											<th>Department</th>
											<th>Contact Number</th>
											<th>Email ID</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($bd,"select * from member");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['salutation']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['designation']);?></td>
											<td><?php echo htmlentities($row['department']);?></td>
											<td><?php echo htmlentities($row['contactNo']);?></td>
											<td><?php echo htmlentities($row['emailId']);?></td>
										<td>
											<a href="edit-member.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											<a href="member.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>