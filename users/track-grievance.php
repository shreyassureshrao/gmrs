
<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($bd,"delete from tblcomplaints where complaintNumber = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Grievance deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Track Grievances </title>
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
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
								<h3>Track Grievances</h3>
							</div>
							<div class="module-body table">
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									<thead>
										<tr>
											<th>Grievance Number</th>
											<th>Grievance Category</th>
											<th>Subject of the Grievance</th>
											<th>Description of the Grievance</th>
											<th>Reg Date</th>
											<th>Status</th>
											<th>Remarks</th>
											<th>Action</th>											
										</tr>
									</thead>
								
<tbody>
<?php 
$query=mysqli_query($bd,"select g.complaintNumber, c.categoryName,g.subject,g.description,g.status,g.regDate, cr.remark FROM tblcomplaints g LEFT JOIN complaintremark cr ON g.complaintNumber=cr.complaintNumber INNER JOIN users u ON g.userId=u.id INNER JOIN category c ON g.category=c.id WHERE u.userEmail='".$_SESSION['login']."'");

while($row=mysqli_fetch_array($query))
{
	$timestamp = strtotime($row['regDate']);
	$date = date('d-m-Y', $timestamp);
?>										
										<tr>
											<td><?php echo htmlentities($row['complaintNumber']);?></td>
											<td><?php echo htmlentities($row['categoryName']);?></td>
											<td><?php echo htmlentities($row['subject']);?></td>
											<td><?php echo htmlentities($row['description']);?></td>
											<td><?php echo htmlentities($date);?></td>
										    											
											<?php if($row['status'] == "under processing"): { ?>
											<td><button type="button" class="btn btn-warning">Under Processing</button></td>
											
											<?php } ?>
											
											<?php elseif($row['status'] == "closed"): { ?>
											<td><button type="button" class="btn btn-success">Closed</button></td>
											
											<?php } ?>
											
											<?php elseif($row['status'] == "rejected"): { ?>
											<td><button type="button" class="btn btn-danger">Rejected</button></td>
											
											<?php } ?>
											
											<?php else: { ?>
											<td><button type="button" class="btn btn-danger">Unprocessed (Pending)</button></td>
											
											<?php } endif; ?>
											
											<td><?php echo htmlentities($row['remark']);?></td>
											
											<td>
											<a href="track-grievance.php?id=<?php echo $row['complaintNumber']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
											</td>
											
										</tr>

										<?php  } ?>
										</tbody>
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