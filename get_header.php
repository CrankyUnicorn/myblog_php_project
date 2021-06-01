<?php

	$header_title = "";
	$header_subtitle = "";
	$body = "";
	$header_background = "";
	
	require_once('db_connect.php');

	$sql = "SELECT * FROM page_header WHERE page_header.page_id = '$page_id'";
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		$row_num = mysqli_num_rows($result);
		
		if($row_num == 1){
			$row = mysqli_fetch_assoc($result);
			
			$header_title = $row['header_title'];
			$header_subtitle = $row['header_subtitle'];
			$body = $row['body'];
			$header_background = "./assets/img/".$row['header_background'];
		}
		
	}

?>

