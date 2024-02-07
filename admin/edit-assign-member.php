
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
	$id=intval($_GET['id']);
	$role=$_POST['role']; 
	
$sql=mysqli_query($bd,"update `committee-member-mapping` set role='$role' where id='$id'");
$_SESSION['msg']="Role updated !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Role updation</title>
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
								<h3>Role Updation</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<br />

			<form class="form-horizontal row-fluid" name="Workflow" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($bd,"select c.committeeName, m.name, a.role from committee c, member m, `committee-member-mapping` a where a.id='$id' and c.id=a.committeeId and m.id=a.memberId");
while($row=mysqli_fetch_array($query))
{
	$committeeName=$row['committeeName']; 
	$memberName=$row['name'];
    $role=$row['role']; 	
?>									

<div class="control-group">
<label class="control-label" for="basicinput">Committee Name</label>
<div class="controls">
<input type="text" name="committeeName" value="<?php echo  htmlentities($committeeName);?>" class="span8 tip" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Member Name</label>
<div class="controls">
<input type="text" name="memberName" value="<?php echo  htmlentities($memberName);?>" class="span8 tip" readonly>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Role</label>
<div class="controls">
<select name="role" class="span8 tip">

<?php if($role == 'Chairperson'): { ?>
<option value="Chairperson" selected>Chairperson</option> 
<option value="Convenor">Convenor</option>
<option value="Member">Member</option>
<?php } ?>

<?php elseif($role == 'Convenor'): { ?>
<option value="Chairperson">Chairperson</option> 
<option value="Convenor" selected>Convenor</option>
<option value="Member">Member</option>
<?php  } ?>

<?php else: { ?>
<option value="Chairperson">Chairperson</option> 
<option value="Convenor">Convenor</option>
<option value="Member" selected>Member</option>
<?php  } ?>
<?php endif; ?>
</select>
</div>
</div>

<?php } ?>	

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Update</button>
											</div>
										</div>
									</form>
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