<?php
session_start();
include('include/config.php');
include('include/PHPMailer.php');

$id=$_GET['cid'];

?>	

<?php
$mail = new PHPMailer();

// Query to get the Principal Email Id
$query=mysqli_query($bd,"SELECT principalEmail FROM `configure-escalation`");

while($row=mysqli_fetch_array($query))
{
$principalEmail = $row['principalEmail'];
}

// Send email to the principal regarding the grievance.
// Note that the Committee Name is sent separately and is not part of the query
$query=mysqli_query($bd,"SELECT name, email, mobileNumber, stakeholder_type, subject, feedback, date FROM `feedback_curriculum` WHERE id='$id'");

while($row=mysqli_fetch_array($query))
{
		$name = $row['name'];
		$email = $row['email'];
		$mobileNumber = $row['mobileNumber'];
		$stakeholder_type = $row['stakeholder_type'];
		$subject = $row['subject'];
		$feedback = $row['feedback'];
				
		$timestamp = strtotime($row['date']);
		$regDate = date('d-m-Y', $timestamp);	
				
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
    $mail->addAddress($principalEmail,'Principal');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Feedback information';
    $mail->Body    = 'Respected Sir, <br/> <br/> Please find below the feedback details for your kind perusal <br/> <br/> 
		
	<h3>Feedback details </h3>
	<h4>Name of the stakeholder: ' .$name. '<br/> <br/>
	Stakeholder type: ' .$stakeholder_type. '<br/> <br/>
	Subject: ' .$subject. '<br/> <br/>
	Feedback on the curriculum: ' .$feedback. '<br/> <br/>
	Date of the feedback: ' .$regDate.  '<br/>  <br/>
	Email of the stakeholder: ' .$email.  '<br/>  <br/>
	Mobile number of the stakeholder: ' .$mobileNumber.  '<br/>  <br/>
	
	</h4>
	
	<br/> <br/> Best regards, <br/> GMRS Admin';
    $mail->send();
	
  $mail->send();
  echo "<script>alert('The Feedback details have been forwarded to the Principal');</script>";
    // Send the Email sent details encoded in JSON format
   /* $form_data = array();
    $form_data['success'] = true;
	echo json_encode($form_data); */
} catch (Exception $e) {
   /* $form_data['success'] = false;
	echo json_encode($form_data); */
} //end catch 
} //end while  

  ?>

    