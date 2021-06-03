<?php

	if(isset($_POST['user_name'])){
		
		require_once("db_connect.php");
		$username = addslashes($_POST['user_name']);
		$useremail = addslashes($_POST['user_email']);
		$password = sha1($_POST['user_password']);
		
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
			
			$sql = "CALL p_registar_user_name('$username', '$useremail', '$password', '$token')";
			$result = mysqli_query($connection, $sql) or die($sql);
			
			if(!$result){
				
				echo("Error message: ".mysqli_error($connection));
				
				$path = "page_register.php?msg=error_connection";
				
			}else{
				
				$path = "mail/activation_email.php?username=$username&token=$token";
				
			}
			
		
		}else{
			
			$path = "page_register.php?msg=already_exists";
			
		}
		
		
	}else{
		
		$path = "page_register.php?msg=error_syntax";
	}

	header("Location:$path");
	
?>