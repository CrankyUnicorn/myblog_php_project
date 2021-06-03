<?php 
	require_once("restrict_access.php");
	require_once('../connect.php');

	$sql = "SELECT state FROM system_status WHERE id IN (SELECT MAX(id) FROM system_status)";
	$result = mysqli_query($connection, $sql) or die($sql);
	$row = mysqli_fetch_assoc($result);

	$system_state = $row['state'];
	
	if(isset($_GET['change_status'])){
			
		$system_state = $system_state == 0 ? 1: 0;
	
		$user_id = $_SESSION['user_id'];
		$sql = "INSERT INTO system_status (user_id, state) VALUES ($user_id , $system_state)";
		$result = mysqli_query($connection, $sql) or die($sql);
	
	}
		
		
	if($system_state == 0){
		
		echo("O sistema esta Offline");
	}else{
		
		echo("O sistema esta Online");
	}
	
	exit();
	
?>