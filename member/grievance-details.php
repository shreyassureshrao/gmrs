<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	// Get the passed Complaint Number as Get variable
$grievanceId=intval($_GET['cid']);

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

function popUpWindow1(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+450+',height='+450+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

// Function to escalate to principal 
 function escalateToPrincipal() {
	 $.ajax({
      url: 'escalate-to-principal.php',
      type: 'POST',
      success: function(data) {
	  var msg = $.parseJSON(data);
	  if(msg.success='true') 
       alert("The grievance has been escalated to the CMO Office."); 
       else 
	   alert("There is some problem in sending email. Please try later.");	
       }
});
   
 } // end escalateToPrincipal function
 
 
// Function to escalate to Management 
 function escalateToManagement() {
	  $.ajax({
      url: 'escalate-to-management.php',
      type: 'POST',
      success: function(data) {
	  var msg = $.parseJSON(data);
	  if(msg.success='true') 
       alert("The grievance has been escalated to the CMO office."); 
       else 
	   alert("There is some problem in sending email. Please try later.");	
       }
});
   
 } // end escalateToManagement function

 
</script>

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
								<h3>Grievance Details</h3>
							</div>
							<div class="module-body table">
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									
									<tbody>

<?php 
$query=mysqli_query($bd,"SELECT g.complaintNumber,u.fullName,g.subject,g.description,g.file,g.status,g.regDate FROM tblcomplaints g,`committee-category-mapping` m, committee com, users u where com.id='".$_SESSION['id']."' and m.committeeId=com.id and m.categoryId=g.category and u.id = g.userId and g.complaintNumber='$grievanceId'");
while($row=mysqli_fetch_array($query))
{
	$timestamp = strtotime($row['regDate']);
	$date = date('d-m-Y', $timestamp);
	// Set the grievance number as a session variable
	$_SESSION['cid'] = $row['complaintNumber'];
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
											<td><b>Subject of Grievance</b></td>
											<td colspan="5"> <?php echo htmlentities($row['subject']);?></td>
										</tr>	
											
										<tr>
											<td><b>Description of Grievance</b></td>
											<td colspan="5"> <?php echo htmlentities($row['description']);?></td>
										</tr>
										
										<tr>
											<td><b>Date of Grievance</b></td>
											<td colspan="5"><?php echo htmlentities($date);?> </td>
										</tr>
										
																			
										<tr>
											<td><b>File(if any) </b></td>
											
											<td colspan="5"> <?php $cfile=$row['file'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="javascript:void(0);" onClick="popUpWindow('../users/grievancedocs/<?php echo htmlentities($row['file']);?>');" title="View File">View File </a>
<?php } ?></td>
</tr>

<?php $ret=mysqli_query($bd,"select cr.remark,cr.remarkDate from complaintremark cr WHERE cr.complaintNumber='$grievanceId'");

while($rw=mysqli_fetch_array($ret))
{
	$timestamp = strtotime($rw['remarkDate']);
	$date = date('d-m-Y', $timestamp);
?>
<tr>
<td><b>Remarks</b></td>
<td colspan="5"><?php echo  htmlentities($rw['remark']); ?> <b>(Remark Date: <?php echo  htmlentities($date); ?>)</b></td>
</tr>

<?php }?>

<tr>
<td><b>Status</b></td>
											
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
											<?php if($row['status']=="closed" || $row['status']=="rejected"){

												} else { ?>
<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/gmrs/member/updategrievance.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button>
											</a></td>
											
											
										<?php  } ?>			
										</tr>
										
										<tr>
										<td><b>Escalate</b></td>
										<td>
										<?php if($row['status']=="closed" || $row['status']=="rejected"){

												} else { ?>
										
										 <a href="javascript:void(0);" onClick="popUpWindow1('http://localhost/gmrs/member/escalate-to-cmo.php?cid=<?php echo htmlentities($row['complaintNumber']);?>');" title="Send as email to cmo">
											 <button type="button" class="btn btn-escalate">Escalate to CMO</button>
											</a>
										</td>
										
															
										<?php  } ?>
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