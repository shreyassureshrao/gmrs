
<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{

$complaintnumber=$_GET['cid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Grievance Details</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>
<body>
<?php include('includes/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('includes/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Grievance Details</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<tbody>

<?php 
$query=mysqli_query($bd,"SELECT g.complaintNumber,u.fullName,u.userType,u.usn,u.department,g.subject,g.description,g.file,g.status,g.regDate FROM tblcomplaints g,`committee-category-mapping` m, committee com, users u where com.id='".$_SESSION['id']."' and m.committeeId=com.id and m.categoryId=g.category and u.id=g.userId and g.complaintNumber='".$complaintnumber."'");
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><b>Grievance Number</b></td>
											<td colspan="5"><?php echo htmlentities($row['complaintNumber']);?></td>
										</tr>
										
										<tr>
											<td><b>Griever Name</b></td>
											<td colspan="5"> <?php echo htmlentities($row['fullName']);?></td>
										</tr>
										
										<tr>
											<td><b>Griever Type</b></td>
											<td colspan="5"> <?php echo htmlentities($row['userType']);?></td>
										</tr>
										
										<tr>
											<td><b>USN / Faculty Id</b></td>
											<td colspan="5"> <?php echo htmlentities($row['usn']);?></td>
										</tr>
										
										<tr>
											<td><b>Department</b></td>
											<td colspan="5"> <?php echo htmlentities($row['department']);?></td>
										</tr>	
											
										<tr>		
											<td><b>Subject of Grievance</b></td>
											<td colspan="5"> <?php echo htmlentities($row['subject']);?></td>
										</tr>	
											
										<tr>
											<td><b>Description of Grievance</b></td>
											<td colspan="5"> <?php echo htmlentities($row['description']);?></td>
										</tr>
										
										<tr>
											<td><b>Date of Grievance</b></td>
											<td colspan="5"><?php echo htmlentities($row['regDate']);?> </td>
										</tr>
										
																			
										<tr>
											<td><b>File(if any) </b></td>
											
											<td colspan="5"> <?php $cfile=$row['file'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="complaintdocs/<?php echo htmlentities($row['file']);?>" ?> View File</a>
<?php } ?></td>
</tr>

<?php $ret=mysqli_query($bd,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$complaintnumber."'");

while($rw=mysqli_fetch_array($ret))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>Remark Date <?php echo  htmlentities($rw['rdate']); ?></b></td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan="5"><?php echo  htmlentities($rw['sstatus']); ?></td>
</tr>
<?php }?>

<tr>
<td><b>Final Status</b></td>
											
											<td colspan="5"><?php if($row['status']=='unprocessed')
											{ 
											echo "Not Processed Yet";
} else {
										 echo htmlentities($row['status']);
										 }?></td>
											
										</tr>

										<tr>
											<td><b>Action</b></td>
											
											<td> 
											<?php if($row['status']=="closed"){

												} else {?>
<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/gmrs/member/updategrievance.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button></td>
											</a><?php } ?></td>
											
										</tr>
										<?php  } ?>
										
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('includes/footer.php');?>

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