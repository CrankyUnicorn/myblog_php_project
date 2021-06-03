<?php
	
	$to = 'dasd';
	$token = 'dasda';
	
	$root_path = "http://localhost:8081/myblog";
	
	mailtoemail($to, $token);
	
	
		
	function mailtoemail($to, $token){
		
		echo utf8_decode("<a href='".$root_path."/admin/mail/activate_register_user.php?username=$to&token=$token'>Click here to activate.</a>");    
		
	}
?>