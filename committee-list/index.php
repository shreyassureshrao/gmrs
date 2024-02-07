
<?php
session_start();
include('include/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>List of Committees</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
	<!-- jsPDF to convert DIV to PDF -->
	<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

	<script language="javascript">
	function openPopUp() {
		//popUpWindow('http://localhost/gmrs/committee-list/committee_pdf.php');
		window.print();
	} 
	
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
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
		
			<div class="span10">
					<div class="content">

	<div id="report">
	
	<div class="module">
							<div class="module-head">
								<h3>List of Committees
								 </h3>   
							</div>
							<div class="module-body table">
							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
									
								
<tbody>
<?php 
$query=mysqli_query($bd,"SELECT c.committeeName, m.salutation,m.name,cm.role, m.designation,m.department,m.contactNo,m.emailId FROM committee c, member m, `committee-member-mapping` cm WHERE c.id=cm.committeeId and cm.memberId=m.id ORDER BY c.committeeName, cm.role ASC");

$previousCommitteeName='OLD';

while($row=mysqli_fetch_array($query))
{
	$currentCommitteeName = $row['committeeName'];
	//New Committee Name - Add a new row for the committee 
	if($currentCommitteeName != $previousCommitteeName) 
	{
?>																				
										<tr> 
											<td colspan="7" style="color:blue"><?php echo htmlentities($currentCommitteeName); ?></td>
										</tr>
										<tr>
											<th>Salutation</th>
											<th>Name</th>
											<th>Role in the Committee</th>
											<th>Designation</th>
											<th>Department</th>
											<th>Contact Number</th>
											<th>Email Id</th>
																					
											</tr>
										<tr>
											<td><?php echo htmlentities($row['salutation']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['role']);?></td>
											<td><?php echo htmlentities($row['designation']);?></td>
											<td><?php echo htmlentities($row['department']);?></td>
											<td><?php echo htmlentities($row['contactNo']);?></td>
											<td><?php echo htmlentities($row['emailId']);?></td>
																			    											
											</tr>

										<?php  $previousCommitteeName = $row['committeeName']; } 
										
										else { ?>
										<tr>
											<td><?php echo htmlentities($row['salutation']);?></td>
											<td><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['role']);?></td>
											<td><?php echo htmlentities($row['designation']);?></td>
											<td><?php echo htmlentities($row['department']);?></td>
											<td><?php echo htmlentities($row['contactNo']);?></td>
											<td><?php echo htmlentities($row['emailId']);?></td>
																			    											
											</tr>
										
										<?php } ?>
										<?php } ?>
										</tbody>
								</table>
							</div>
							<button type="button" id="generateReportAsPDF" name="generateReportAsPDF" class="btn btn-primary" onClick="openPopUp();">Print</button>
						</div>			

</div> <!-- report div -->						
				
						
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
