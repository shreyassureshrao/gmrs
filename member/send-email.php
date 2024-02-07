<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
include('include/PHPMailer.php');

//Load composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
	//$mail->SMTPDebug = 4; // very expressive debug messages
    //$mail->SMTPSecure = "ssl";  
	$mail->SMTPSecure = "tls";  
	$mail->Host='smtp.gmail.com';  
	$mail->Port=587;   
	//$mail->Port=465;   
	//$mail->SMTPSecure = "tls";  
	//$mail->Username   = 'shreyassureshrao@gmail.com'; // SMTP account username
	//$mail->Password   = 'Chintu_123';  
	$mail->Username = 'raophpmailer@gmail.com';
	$mail->Password = 'Ganesha_789';
	$mail->SMTPKeepAlive = true;  
	$mail->Mailer = "smtp"; 
	$mail->IsSMTP(); // telling the class to use SMTP  
	$mail->SMTPAuth   = true;                  // enable SMTP authentication  
	//$mail->CharSet = 'utf-8';  
	//$mail->SMTPDebug  = 0;   

    //Recipients
    $mail->setFrom('raophpmailer@gmail.com','Admin GMRS');
    $mail->addAddress('shreyassureshrao@gmail.com', 'Shreyas Rao');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'Test Email body!</b>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}