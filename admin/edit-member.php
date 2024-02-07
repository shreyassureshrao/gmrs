
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
	$salutation=$_POST['salutation'];
	$name=$_POST['name'];
	$designation=$_POST['designation'];
	$department=$_POST['department'];
	$contactNo=$_POST['contactNo'];
	$emailId=$_POST['emailId'];
	$url=$_POST['url'];
	
$sql=mysqli_query($bd,"update member set salutation='$salutation',name='$name',designation='$designation',department='$department',contactNo='$contactNo',emailId='$emailId',url='$url' where id='$id'");
$_SESSION['msg']="Member information updated !!";

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


									<br />

			<form class="form-horizontal row-fluid" name="Member" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($bd,"select * from member where id='$id'");
while($row=mysqli_fetch_array($query))
{
	$salute=$row['salutation']; 
	$desig=$row['designation'];
    $dept=$row['department']; 	
	

?>									

<div class="control-group">
<label class="control-label" for="basicinput">Salutation</label>
<div class="controls">
<select name="salutation" class="span8 tip">

<?php if($salute == 'Prof'): { ?>
<option value="Prof" selected>Prof</option> 
<option value="Dr">Dr</option>
<option value="Mr">Mr</option>
<option value="Ms">Ms</option>
<?php } ?>

<?php elseif($salute == 'Dr'): { ?>
<option value="Dr" selected>Dr</option>
<option value="Prof">Prof</option> 
<option value="Mr">Mr</option>
<option value="Ms">Ms</option>
<?php  } ?>

<?php elseif($salute == 'Mr'): { ?>
<option value="Mr" selected>Mr</option>
<option value="Prof">Prof</option> 
<option value="Dr">Dr</option>
<option value="Ms">Ms</option>
<?php  } ?>

<?php else: { ?>
<option value="Ms" selected>Ms</option>
<option value="Prof">Prof</option> 
<option value="Dr">Dr</option>
<option value="Mr">Mr</option>
<?php  } ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Name</label>
<div class="controls">
<input type="text" placeholder="Edit Name"  name="name" value="<?php echo  htmlentities($row['name']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Designation</label>
<div class="controls">
<select name="designation" class="span8 tip">

<?php if($desig == 'Professor'): { ?>
<option value="Professor" selected>Professor</option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php } ?>

<?php elseif($desig == 'Assistant Professor'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor" selected>Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Associate Professor'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor" selected>Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Support Staff'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff" selected>Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Principal'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal" selected>Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Manager'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager" selected>Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Assistant Manager'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager" selected>Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($desig == 'Librarian'): { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian" selected>Librarian</option>
<option value="Other">Other</option>
<?php  } ?>

<?php else: { ?>
<option value="Professor"></option> 
<option value="Assistant Professor">Assistant Professor</option>
<option value="Associate Professor">Associate Professor</option>
<option value="Support Staff">Support Staff</option>
<option value="Principal">Principal</option>
<option value="Manager">Manager</option>
<option value="Assistant Manager">Assistant Manager</option>
<option value="Librarian">Librarian</option>
<option value="Other" selected>Other</option>
<?php  } ?>
<?php endif; ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Department</label>
<div class="controls">
<select name="department" class="span8 tip">

<?php if($dept == 'Computer Science and Engineering'): { ?>
<option value="Computer Science and Engineering" selected>Computer Science and Engineering</option>
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
<?php } ?>

<?php elseif($dept == 'Basic Science and Humanities'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities" selected>Basic Science and Humanities</option> 
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
<?php  } ?>

<?php elseif($dept == 'Biotechnology'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology" selected>Biotechnology</option>
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
<?php  } ?>

<?php elseif($dept == 'Civil Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering" selected>Civil Engineering</option>
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
<?php  } ?>

<?php elseif($dept == 'Electrical and Electronics Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering" selected>Electrical and Electronics Engineering</option>
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
<?php  } ?>

<?php elseif($dept == 'Electronics and Communication Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
<option value="Electronics and Communication Engineering" selected>Electronics and Communication Engineering</option>
<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>	
<option value="Information Science and Engineering">Information Science and Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Telecommunication Engineering">Telecommunication Engineering</option>
<option value="Management Studies">Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Industrial Engineering and Management'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
<option value="Industrial Engineering and Management" selected>Industrial Engineering and Management</option>	
<option value="Information Science and Engineering">Information Science and Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Telecommunication Engineering">Telecommunication Engineering</option>
<option value="Management Studies">Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Information Science and Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>	
<option value="Information Science and Engineering" selected>Information Science and Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Telecommunication Engineering">Telecommunication Engineering</option>
<option value="Management Studies">Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Mechanical Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>	
<option value="Information Science and Engineering">Information Science and Engineering</option>
<option value="Mechanical Engineering" selected>Mechanical Engineering</option>
<option value="Telecommunication Engineering">Telecommunication Engineering</option>
<option value="Management Studies">Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Telecommunication Engineering'): { ?>
<option value="Computer Science and Engineering">Computer Science and Engineering</option>
<option value="Basic Science and Humanities">Basic Science and Humanities</option> 
<option value="Biotechnology">Biotechnology</option>
<option value="Civil Engineering">Civil Engineering</option>
<option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
<option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
<option value="Industrial Engineering and Management">Industrial Engineering and Management</option>	
<option value="Information Science and Engineering">Information Science and Engineering</option>
<option value="Mechanical Engineering">Mechanical Engineering</option>
<option value="Telecommunication Engineering" selected>Telecommunication Engineering</option>
<option value="Management Studies">Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Management Studies'): { ?>
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
<option value="Management Studies" selected>Management Studies (MBA)</option>
<option value="Master of Computer Applications">Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Master of Computer Applications'): { ?>
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
<option value="Master of Computer Applications" selected>Master of Computer Applications (MCA)</option>
<option value="Library">Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Library'): { ?>
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
<option value="Library" selected>Library</option>
<option value="Not Applicable">Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>

<?php elseif($dept == 'Not Applicable'): { ?>
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
<option value="Not Applicable" selected>Not Applicable</option>
<option value="Other">Other</option>
<?php  } ?>


<?php else: { ?>
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
<option value="Other" selected>Other</option>
<?php  } ?>
<?php endif; ?>
</select>
</div>
</div>
										
<div class="control-group">
<label class="control-label" for="basicinput">Contact Number</label>
<div class="controls">
<input type="text" placeholder="Edit Contact Number" id="contactNo" maxlength="10" name="contactNo" value="<?php echo  htmlentities($row['contactNo']);?>" class="span8 tip">
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Email Id</label>
<div class="controls">
<input type="text" placeholder="Edit Email Id"  name="emailId" value="<?php echo  htmlentities($row['emailId']);?>" class="span8 tip">
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">URL</label>
<div class="controls">
<input type="text" placeholder="Edit URL"  name="url" value="<?php echo  htmlentities($row['url']);?>" class="span8 tip">
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