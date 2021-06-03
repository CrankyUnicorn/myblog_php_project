<?php
	if(isset($_POST['user_password'])){
		
		if(!isset($_SESSION)){
		session_start();
		
		}
		
		require_once("../db_connect.php");
		
		$token = $_SESSION['user_token'];
		$user_name = $_SESSION['user_name'];
		
		$sql = "SELECT user_name.id FROM user_token JOIN user_name ON user_name.id = user_token.user_name_id WHERE user_token = '$token' AND user_name = '$user_name'";
		$result = mysqli_query($connection, $sql) or die($sql);
		$total_rows = mysqli_num_rows($result);
		
		if($total_rows == 1){
			
			$password = sha1($_POST['user_password']);
			
			$row = mysqli_fetch_assoc($result);
			$user_name_id = $row['id'];
			
			$sql = "INSERT INTO user_password (user_name_id, user_password) VALUES ($user_name_id,'$password')";
			$result = mysqli_query($connection, $sql) or die($sql);
			
			$sql = "DELETE FROM user_token WHERE user_token = '$token' AND user_name_id = '$user_name_id' LIMIT 1";
			
			session_destroy();
			
			$result = mysqli_query($connection, $sql) or die($sql);
			
			$path = "../index.php?msg=password_changed_success";
		}else{
			
			$path = "../index.php?msg=token_invalid";
		}
	}else{
		
		$path = "../index.php?msg=password_invalid";
	}
	
	header("Location:$path");
?>