<?php
	
	$to = $_GET['username'];
	$token = $_GET['token'];
	
	$root_path = "http://localhost:8081/myblog";
	
	$temp = mailtoemail($to, $token);
	
	if($temp){
		header("Location:".$root_path."/admin/page_register.php?msg=verification_sended");
	}
	else{
		echo "Unable to send e-mail.";
	}
		
	function mailtoemail($to, $token){
		global $root_path;
		
		#modify later
		$test_to = "cettpsi12@gmail.com";
		
		require("class.phpmailer.php");
		
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Port = 465;
		$mail->Username = "cettpsi12@gmail.com";
		$mail->Password = "s#wFD5yH_Lk89";
		$mail->From = "cettpsi12@gmail.com";
		$mail->FromName = "CET TPSI 12";
		$mail->AddAddress($test_to);
		$mail->IsHTML(true);
		$mail->Subject = utf8_decode("User account activation.");
		$mail->Body = utf8_decode("<a href='".$root_path."/admin/mail/activate_register_user.php?username=$to&token=$token'>Click here to activate.</a>");    
		$mail->Send();
		return 1;
	}
?>