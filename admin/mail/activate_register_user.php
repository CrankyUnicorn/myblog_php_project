<?php
	if(isset($_GET['token'])){
		$username = $_GET['username'];
		$token = $_GET['token'];
		
		require_once("../db_connect.php");
		
		#$table = "v1_user_token"; #isto não é seguro
		$sql = "SELECT user_token.id AS 'token_id', user_name.id AS 'user_id' FROM user_token JOIN user_name ON user_name.id = user_token.user_name_id WHERE user_name.user_name = '$username' AND user_name.estado = 0 AND user_token.user_token = '$token'";
		$result = mysqli_query($connection, $sql) or die($sql);
		$num_rows = mysqli_num_rows($result);
		
		
		
		if($num_rows == 1){
			$row = mysqli_fetch_assoc($result);

			$user_id = $row['user_id'];
			$token_id = $row['token_id'];
			
			$sql = "CALL p_validar_user_name('$user_id','$token_id')";
			$result = mysqli_query($connection, $sql) or die($sql);
			
			$path = "../index.php?msg=account_activated";
		}else{
			
			$path = "../index.php?msg=account_failed_activation";
		}
		
	}else{
		
		$path = "../index.php";
	}
	


	header("Location:$path");
?>