<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/PHPMailer.php');

if(strlen($_SESSION['login'])==0)
{ 
header('location:index.php');
} 
else{ 

if(isset($_POST['submit']))
{
$uid=mysqli_real_escape_string($bd,$_SESSION['id']);
$category=mysqli_real_escape_string($bd,$_POST['category']); // The value of category shall be the corresponding Id of the selected category name
$subject=mysqli_real_escape_string($bd,$_POST['subject']);
$description=mysqli_real_escape_string($bd,$_POST['description']);
$status = "unprocessed";
$file=$_FILES["fileToUpload"]["name"];

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"grievancedocs/".$_FILES["fileToUpload"]["name"]);

$query=mysqli_query($bd,"insert into tblcomplaints(userId,category,subject,description,file,status) values('$uid','$category','$subject','$description','$file','$status')");
// code for showing grievance number
$sql=mysqli_query($bd,"select complaintNumber from tblcomplaints order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complaintno=$cmpn;

// Code to send Email to the committee that a grievance has been lodged
$query=mysqli_query($bd,"select distinct com.email, com.committeeName from committee com, `committee-category-mapping` map, tblcomplaints cpl
where cpl.category='$category' and map.categoryId = cpl.category and com.id = map.committeeId");

//Fetch the email address for which the grievance details has to be send
while($row=mysqli_fetch_array($query))
{
$committeeEmail = $row['email'];	
$committeeName = $row['committeeName'];
}

// Compose the body of the Email

$mail = new PHPMailer();

try {
	$mail->SMTPSecure = "tls";  
	$mail->Host='smtp.gmail.com';  
	$mail->Port=587;   
	$mail->Username = 'raophpmailer@gmail.com';
	$mail->Password = 'Ganesha_789';
	$mail->SMTPKeepAlive = true;  
	$mail->Mailer = "smtp"; 
	$mail->IsSMTP(); // telling the class to use SMTP  
	$mail->SMTPAuth   = true;                  // enable SMTP authentication  

    //Recipients
    $mail->setFrom('raophpmailer@gmail.com','Admin GMRS');
    $mail->addAddress($committeeEmail,$committeeName);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'A new grievance bearing the number: ' .$complaintno. ' has been lodged';
    $mail->Body    = 'Dear ' .$committeeName. ' committee member, <br/> <br/> Please find below the newly lodged grievance details <br/>
	
	<h4> Grievance Number: ' .$complaintno. '<br/> <br/> Subject of the Grievance: ' .$subject. '<br/> <br/> Description of the Grievance: ' .$description. '<br/> <br/> Please checkin your dashboard at the URL: http://localhost/gmrs/member/ for more details. </h4> <br/> 
	
	Best regards, <br/> GMRS Admin';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent to the specified email address';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} //end catch 

echo '<script> alert("Your grievance has been successfully filed and your grievance no is  "+"'.$complaintno.'")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GMRS | Register Grievance</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
								<h3>Lodge Grievance</h3>
							</div>
							<div class="module-body">

<form class="form-horizontal row-fluid" name="LodgeGrievance" method="post" enctype="multipart/form-data">
									
<div class="control-group">
<label class="control-label" for="basicinput">Grievance Category</label>
<div class="controls">
<select name="category" class="span8 tip" required>
<?php
$query=mysqli_query($bd,"select * from category");
while($row=mysqli_fetch_array($query))
{
?>		
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['categoryName']);?></option>
<?php } ?>
</select>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Subject of the Grievance</label>
<div class="controls">
<input type="text" placeholder="Provide the subject of grievance"  name="subject" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Description of the Grievance (maximum 2000 words)</label>
<div class="controls">
<textarea class="span8" name="description" rows="5"></textarea>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Grievance Related Document (if any)</label>
<div class="controls">
<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Submit Grievance</button>
											</div>
										</div>
									</form>
							</div>
						</div>


<?php include('includes/footer.php');?>

</body>
<?php } ?>