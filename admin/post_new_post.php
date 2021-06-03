<?php

	if(isset($_POST['username'])){
		
		require_once("../connect.php");
		$username = addslashes($_POST['username']);
		$password = sha1($_POST['psw']);
		
		$avaible_chars = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJIKLMNOPQRSTUVWXYZ';
		$avaible_chars_len = strlen($avaible_chars)-1;
		$token = '';
		for ($i = 0; $i < 40; $i++){
			$token .= $avaible_chars[mt_rand(0, $avaible_chars_len)];
		}
		
		$table = "user_name";
		$sql = "SELECT id FROM $table WHERE user_name = '$username'";
		$result = mysqli_query($connection, $sql);
		$total_rows = mysqli_num_rows($result);
		
		if($total_rows == 0){
			
			$sql = "CALL p_registar_user_name('$username','$password', '$token')";
			$result = mysqli_query($connection, $sql) or die($sql);
			
			if(!$result){
				
				echo("Error message: ".mysqli_error($connection));
				
				$path = "login.html?msg0=erro";
				
			}else{
				
				$path = "mail/activation_email.php?username=$username&token=$token";
				
			}
			
		
		}else{
			
			$path = "login.html?msg2=repetido";
			
		}
		
		
	}else{
		
		$path = "register.html";
	}

	header("Location:$path");
	
?>