<?php

	require_once('db_connect.php');
	
	
	if(!isset($_POST['sentMessage'])){
		
		$message_name = addslashes($_POST['user_name']);
		$message_phone = addslashes($_POST['user_phone']);
		$message_email = addslashes($_POST['user_email']);
		$message_content = addslashes($_POST['user_message']);
		
		$sql = "INSERT INTO contact_request (name, email, telephone, message) VALUES ('$message_name', '$message_email', '$message_phone', '$message_content' )";
					
	
		$result = mysqli_query($connection, $sql);
		
		if(!$result){
			
			echo("ERR: ".mysqli_error($connection));
			
			header('Location: page_contact.php?fail');
		}else{
			
			
			header('Location: page_contact.php?success');
		}
		
		
	}
?>

 