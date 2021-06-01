<?php

	$head_title="";
	$page="";
	$page_id="";
	
	require_once('db_connect.php');

	$sql = "SELECT * FROM page_info";
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		//get page file name with extension
		$page = basename($_SERVER['PHP_SELF']); 
		
		while($row = mysqli_fetch_assoc($result)){
		
			if($page == $row['page_file_name']){
				$head_title = $row['page_title'];
				$page_id = $row['id'];
			}
			
		}
	}

    
?>
