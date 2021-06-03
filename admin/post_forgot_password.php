<?php
if(!isset($_SESSION)){
		session_start();
	}
	
if(isset($_POST['forgot_password']) || isset($_POST['change_password'])){	
	
	if(isset($_POST['forgot_password'])){
		
		$user_email = addslashes($_POST['user_email']);
		
		$path = "page_forgot_password.php?msg=invalid_email";

	}else if(isset($_POST['change_password'])){
		
		$user_email = $_SESSION['user_email'];
		
		$path = "page_change_password.php?msg=invalid_email";
	}				
				
		require_once("db_connect.php");
		
		
		$sql = "SELECT id, user_name FROM user_name WHERE user_email = '$user_email'";
		$result = mysqli_query($connection, $sql) or die($sql);
		$total_rows = mysqli_num_rows($result);
		
		if($total_rows == 0){
			
			#will use $path as a definer of this rule 
		}else{
			
			$avaible_chars = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHJIKLMNOPQRSTUVWXYZ';
			$avaible_chars_len = strlen($avaible_chars)-1;
			$token = '';
			for ($i = 0; $i < 40; $i++){
				$token .= $avaible_chars[mt_rand(0, $avaible_chars_len)];
			}
			
			$row = mysqli_fetch_assoc($result);
			$user_name = $row['user_name'];
			$user_name_id = $row['id'];
			
			$sql = "INSERT INTO user_token (user_name_id, user_token) VALUES ($user_name_id,'$token')";
			$result = mysqli_query($connection, $sql) or die($sql);
		
			$path = "mail/confirm_change_password.php?username=$user_name&token=$token";
		}
}else{
	
	$path = "post_forgot_password.php?msg=no_email";
}

header("Location:$path");
?>