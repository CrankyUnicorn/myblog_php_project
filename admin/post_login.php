<?php

	if(isset($_POST['user_email'])){
		
		//$username=addslashes($_POST['user_name']);
		$useremail=addslashes($_POST['user_email']);
		$userpassword=sha1($_POST['user_password']);
		
		require_once("db_connect.php");
		
		#again dont use view that retrieve all passwords that is a great security risk
		$sql="SELECT user_name.id, user_name.user_name, user_name.user_email, pass_select.user_password FROM user_name JOIN (SELECT pass_rel.user_name_id, pass_rel.user_password FROM (SELECT * FROM user_password WHERE user_name_id IN (SELECT user_name.id FROM user_name WHERE user_email = '$useremail') ORDER BY id DESC LIMIT 0,1) as pass_rel WHERE user_password = '$userpassword') AS pass_select ON user_name.id = pass_select.user_name_id WHERE user_name.estado = 1 AND user_name.user_email = '$useremail'";
		
		$result = mysqli_query($connection, $sql) or die($sql);
		
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows == 0){

			$path = "index.php?msg=invalid_login";
			
		}else{
			
			session_start();
			$row = mysqli_fetch_assoc($result);
			$_SESSION['user_id']=$row['id'];
			$_SESSION['user_name']=$row['user_name'];
			$_SESSION['user_email']=$row['user_email'];
			
			$user_name_id = $_SESSION['user_id'];
			
			$sql ="SELECT * FROM `user_access_level` JOIN access_level on access_level.id = user_access_level.access_level_id and user_access_level.id IN ( SELECT MAX(id) FROM user_access_level GROUP BY user_access_level.user_name_id ) and user_access_level.user_name_id IN (SELECT id FROM user_name WHERE user_name.id = '$user_name_id')";
			
			$result = mysqli_query($connection, $sql) or die($sql);
			if(!$result){
			
				echo("ERR: ".mysqli_error($connection));
			}
			
			$row = mysqli_fetch_assoc($result);
			$_SESSION['access_level_id']=$row['access_level_id'];
			
			$sql ="SELECT * FROM `access_level` WHERE id = '".$row['access_level_id']."'";
			
			$result = mysqli_query($connection, $sql) or die($sql);
			if(!$result){
			
				echo("ERR: ".mysqli_error($connection));
			}
			
			$row = mysqli_fetch_assoc($result);
			
			$_SESSION['access_level_name']=$row['access_level'];
			
			$path = "index.php?msg=login_success";
		}
		
		
	}else{
		
		$path = "index.php?msg=login_fail";
	}

	header("Location:$path");
?>