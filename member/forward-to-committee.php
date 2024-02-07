<?php
session_start();
include('include/config.php');
include('include/PHPMailer.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];

$result = mysqli_query($bd,"SELECT count(*) as cnt FROM complaintremark WHERE complaintNumber='$complaintnumber'");
while($row=mysqli_fetch_array($result))
{
	$cnt = $row['cnt'];
	
if($cnt==0)
{
	// Create a new row
	$query=mysqli_query($bd,"insert into complaintremark(complaintNumber,status,remark) values('$complaintnumber','$status','$remark')");	
}
else 
{
	//update the existing complaint record 
	$query=mysqli_query($bd,"update complaintremark set complaintNumber='$complaintnumber', status='$status', remark='$remark' where complaintNumber='$complaintnumber'");
}
}

$sql=mysqli_query($bd,"update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

echo "<script>alert('Grievance details updated successfully');</script>";

$mail = new PHPMailer();

// Send email to the end-user regarding the updated status of their grievance
$query=mysqli_query($bd,"SELECT distinct u.fullName,u.userEmail, u.contactNo, g.complaintNumber,g.subject FROM users u, tblcomplaints g, complaintremark c 
WHERE u.id=g.userId and g.complaintNumber=c.complaintNumber and g.complaintNumber = '".$_GET['cid']."'");

while($row=mysqli_fetch_array($query))
{
	$email = $row['userEmail'];
	$name = $row['fullName'];
	$subject = 	$row['subject'];
	
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
    $mail->addAddress($email,$name);     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Your Grievance bearing the number: ' .$complaintnumber. ' is currently ' .$status. ' ';
    $mail->Body    = 'Dear ' .$name. ', <br/> <br/> Grievance Number: ' .$complaintnumber. '<br/> Subject of Grievance: ' .$subject. '<br/> Current Status: ' .$status. '<br/> Remarks: ' .$remark. '<br/> <br/> Please checkin your dashboard at the URL: http://localhost/gmrs/users/ for more details. <br/> <br/> Best regards, <br/> GMRS Admin';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent to the specified email address';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} //end catch 
} //end while  
  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Committee Action</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Grievance Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="under processing">Under Processing</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>

      <tr height="50">
      <td><b>Remarks</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>

        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>

       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   

</table>
 </form>
</div>

</body>
</html>

     <?php } ?>