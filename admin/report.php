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
	if(isset($_POST['committeeFilter']))
	{
		$committeeFilter = $_POST['committeeFilter'];
		echo $committeeFilter;
	}
	
	if(isset($_POST['dateFilter']))
	{
		$dateFilter = $_POST['dateFilter'];
		echo $dateFilter;
	}
	
	if(isset($_POST['chartList']))
	{
		$chartList = $_POST['chartList'];
		echo $chartList;
	}
	
	if(isset($_POST['yearList']))
	{
		$yearList = $_POST['yearList'];
		echo $yearList;
	}	

	if(isset($_POST['monthList']))
	{
		$monthList = $_POST['monthList'];
		echo $monthList;
	}

	if(isset($_POST['fromdate']))
	{
		$fromdatepicker = $_POST['fromdate'];
		echo $fromdatepicker;
	}

	if(isset($_POST['todate']))
	{
		$todatepicker = $_POST['todate'];
		echo $todatepicker;
	}

$_SESSION['msg']="Report filter Created !!";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Reports</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="report.js"></script>
	
	<!-- Code for Date Picker control in jQuery -->
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 <link rel="stylesheet" href="/resources/demos/style.css">
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
			$( function() {
				$( "#fromdatepicker" ).datepicker();
				$( "#todatepicker" ).datepicker();
			} );
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
								<h3>Choose Filter</h3>
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

<form name="Report" method="post" >

<div class="module">
							<div class="module-head">
								<h3>Committee Filter</h3>
							</div>
							<div class="module-body">
							<label class='radio-inline'>
								<input type='radio' name='committeeFilter' value='all' />&nbsp;All</label>
								<label class='radio-inline'>
								<input type='radio' name='committeeFilter' value='singlecommittee' checked/>&nbsp;Select a Committee</label>
								<select name="committeeList" class="span4 tip" required>
									<?php
										$query=mysqli_query($bd,"select * from committee");
										while($row=mysqli_fetch_array($query))
										{
										?>		
										<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['committeeName']);?></option>
									<?php } ?>
								</select>
							</div>
</div>    

<div class="module">
							<div class="module-head">
								<h3>Date Filter</h3>
							</div>
							<div class="module-body">
								<label class='radio-inline'>
								<input type='radio' name='dateFilter' value='monthly' checked/>&nbsp;Monthly</label>
								
								<select name="yearList" class="span1 tip" required>
									<option value="2018" checked>2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
								</select>
								
								<select name="monthList" class="span2 tip" required>
									<option value="January" checked>January</option>
									<option value="Febraury">Febraury</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>
								
								<label class='radio-inline'>
								<input type='radio' name='dateFilter' value='datePeriod'/>&nbsp;Select a date period</label>
								<p>From Date: <input type="text" name="fromdate" id="fromdatepicker"></p>
								<p>To Date: <input type="text" name="todate" id="todatepicker"></p>
							</div>
</div>   

<div class="module">
							<div class="module-head">
								<h3>Chart Type Filter</h3>
							</div>
							<div class="module-body">
								<select name="chartList" class="span2 tip" required>
								<option value = "Table" checked>Tabular</option>
								<option value = "PieChart">Pie Chart</option>
								<option value = "BarChart">Bar Chart</option>	
								<option value = "LineChart">Line Chart</option>
								</select>
							</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Generate Report</button>
											</div>
										</div>
									</form>
							</div>
						</div>

<div class="module">
							<div class="module-head">
								<h3>View Report</h3>
							</div>
							<div class="module-body">
								
							</div>
</div>

	
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