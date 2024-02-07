<?php
session_start();
include('include/config.php');
include('include/PHPMailer.php');

if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {

$complaintnumber=$_GET['cid'];	
$committeeId = $_SESSION['id'];

// Query to get the Committee Name
$query=mysqli_query($bd,"SELECT committeeName FROM committee WHERE id='$committeeId'");

while($row=mysqli_fetch_array($query))
{
$committeeName = $row['committeeName'];
}

// Query to get the Key members of the committee - chairperson or convenor
$query=mysqli_query($bd,"SELECT m.salutation, m.name, m.designation,m.department,m.contactNo, m.emailId, cm.role FROM committee c, `committee-member-mapping` cm, member m WHERE c.id='$committeeId' and cm.committeeId=c.id and cm.memberId=m.id and (cm.role='Chairperson' or cm.role='Convenor')");

while($row=mysqli_fetch_array($query))
{
if($row['role'] == 'Chairperson') 
{
$salutationCP = $row['salutation'];
$membernameCP = $row['name'];
$designationCP = $row['designation'];
$memberdeptCP = $row['department'];
$contactNoCP = $row['contactNo'];
$emailIdCP = $row['emailId'];
$roleCP = $row['role'];
}
else if ($row['role'] == 'Convenor')  // he is the Convenor for the Committee
{
$salutationCon = $row['salutation'];
$membernameCon = $row['name'];
$designationCon = $row['designation'];
$memberdeptCon = $row['department'];
$contactNoCon = $row['contactNo'];
$emailIdCon = $row['emailId'];
$roleCon = $row['role'];
	
}
}

// Query to get the Principal Email Id
$query=mysqli_query($bd,"SELECT cmoEmail FROM `configure-escalation`");

while($row=mysqli_fetch_array($query))
{
$principalEmail = $row['cmoEmail'];
}

?>	

<?php
$mail = new PHPMailer();

// Send email to the principal regarding the grievance.
// Note that the Committee Name is sent separately and is not part of the query
$query=mysqli_query($bd,"select g.complaintNumber,u.fullName,g.subject,g.description,g.status,g.regDate,cr.remark,c.categoryName
FROM tblcomplaints g 
LEFT JOIN complaintremark cr ON g.complaintNumber=cr.complaintNumber 
INNER JOIN users u ON g.userId=u.id 
INNER JOIN category c ON g.category=c.id 
WHERE g.complaintNumber='$complaintnumber'");

while($row=mysqli_fetch_array($query))
{
		$fullName = $row['fullName'];
		$subject = $row['subject'];
		$description = $row['description'];
		$status = $row['status'];
		$remark = $row['remark'];
		$categoryName = $row['categoryName'];
		
		$timestamp = strtotime($row['regDate']);
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
    $mail->addAddress($cmoEmail,'CMO');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'The Grievance bearing the number: ' .$complaintnumber. ' has been escalated for your kind perusal';
    $mail->Body    = 'Respected Sir, <br/> <br/> Please find below the grievance details escalated for your kind perusal <br/> <br/> 
	Committee in which the grievance was lodged: ' .$committeeName. ' <br/>  ------------------------------------------------------------------------------------------------------------------------<br/>
	<h3>Griever details  </h3>
	<h4> Griever Name: ' .$fullName. '<br/> <br/>
			
	<br/>-------------------------------------------------------------------------------------------------------------------------<br/>
	
	<h3>Grievance details </h3>
	<h4>Subject of the grievance: ' .$subject. '<br/> <br/>
	Description of the grievance: ' .$description. '<br/> <br/>
	Date of filing the grievance: ' .$regDate.  '<br/>  <br/>
	Current status of the grievance: ' .$status. '<br/> <br/>
	Remarks from the grievance committee (if any): ' .$remark. '<br/>  <br/>
	Grievance category: ' .$categoryName. '<br/> </h4>
	
	<br/>-------------------------------------------------------------------------------------------------------------------------<br/>
	Please get in touch with the following committee members to discuss and resolve the grievance <br/> 

	<h4>' .$roleCP. ' </h4>'
	.$salutationCP. ' ' .$membernameCP. ', ' .$designationCP. ', having contact no as: ' .$contactNoCP. ' and email Id as: ' .$emailIdCP.  
	 		
	'<h4>' .$roleCon. ' </h4>'
	.$salutationCon. ' ' .$membernameCon. ', ' .$designationCon. ', Dept. of ' .$memberdeptCon. ', having contact no: ' .$contactNoCon. ' and email Id: ' .$emailIdCon. 
	
	'<br/> <br/> Best regards, <br/> GMRS Admin';
    $mail->send();
	echo "<script>alert('Escalated the Grievance details to the CMO');</script>";
	
   // Send the Email sent details encoded in JSON format
    /*$form_data = array();
    $form_data['success'] = true;
	echo json_encode($form_data); */
} catch (Exception $e) {
   /*$form_data['success'] = false;
	echo json_encode($form_data); */
} //end catch 
} //end while  

 

} ?>

    