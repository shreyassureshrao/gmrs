
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
	$committee=$_POST['committee'];
	$description=$_POST['description'];
	$loginname=$_POST['loginname'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	
$sql=mysqli_query($bd,"insert into committee(committeeName,committeeDescription,loginName,password,email,mobile) values('$committee','$description','$loginname','$password','$email','$mobile')");
$_SESSION['msg']="Committee added Successfully !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($bd,"delete from committee where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Committee deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Committee</title>
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
								<h3>Committee</h3>
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

			<form class="form-horizontal row-fluid" name="Committee" method="post" >
									 
<div class="control-group">
<label class="control-label" for="basicinput">Committee Name</label>
<div class="controls">
<input type="text" placeholder="Enter Committee Name"  name="committee" class="span8 tip" required autofocus>
</div>
</div>

<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<textarea class="span8" name="description" rows="3"></textarea>
											</div>
										</div>


<div class="control-group">
											<label class="control-label" for="basicinput">Login Name</label>
											<div class="controls">
												<input type="text" placeholder="Enter Login Name"  name="loginname" class="span8 tip" >
											</div>
										</div>
										
				<div class="control-group">
											<label class="control-label" for="basicinput">Password</label>
											<div class="controls">
												<input type="password" placeholder="Enter Password"  required="required" name="password" class="span8 tip">
											</div>
				</div>
										
				<div class="control-group">
											<label class="control-label" for="basicinput">Email Id</label>
											<div class="controls">
												<input type="text" placeholder="Enter Committee Email"  required="required" name="email" class="span8 tip">
											</div>
				</div>
				
				<div class="control-group">
											<label class="control-label" for="basicinput">Mobile No</label>
											<div class="controls">
												<input type="text" placeholder="Enter Committee Mobile No"  required="required" name="mobile" class="span8 tip">
											</div>
				</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
							</div>
						</div>


	<div class="module">
							<div class="module-head">
								<h3>Manage Committees</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Committee Name</th>
											<th>Description</th>
											<th>Email Id</th>
											<th>Mobile No</th>
											<th>Creation date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($bd,"select * from committee");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['committeeName']);?></td>
											<td><?php echo htmlentities($row['committeeDescription']);?></td>
											<td><?php echo htmlentities($row['email']);?></td>
											<td><?php echo htmlentities($row['mobile']);?></td>
											<td> <?php echo htmlentities($row['postingDate']);?></td>
											
											<td>
											<a href="edit-committee.php?id=<?php echo $row['id']?>" ><i class="icon-edit"></i></a>
											<a href="committee.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
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