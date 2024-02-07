<?php	
	function sendOTP($email,$otp) {
		require('includes/PHPMailer.php');
		$mail = new PHPMailer();          	
		$message_body = "One Time Password for GMRS login authentication is:<br/><br/>" . $otp;
		$mail->SMTPSecure = "tls";  
		$mail->Host='smtp.gmail.com';  
		$mail->Port=587;   

		$mail->Username = 'PhpMailerRao@gmail.com';
		$mail->Password = 'SSRao_123';
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->IsSMTP(); // telling the class to use SMTP  
		$mail->SMTPAuth   = true;                  // enable SMTP authentication  
		$mail->setFrom('PhpMailerRao@gmail.com','Admin GMRS');
		$mail->AddAddress($email);
		$mail->Subject = "OTP to Login";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		
		return $result;
	}
?>

