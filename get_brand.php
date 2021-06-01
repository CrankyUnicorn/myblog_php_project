<?php

	$brand_name = "";
	$brand_logo = "";
	$brand_update = "";

	require_once('db_connect.php');
	

	$sql = "SELECT * FROM page_brand WHERE page_brand.id = 1";
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		$row_num = mysqli_num_rows($result);
		
		if($row_num == 1){
			$row = mysqli_fetch_assoc($result);
			
			$brand_name = $row['brand_name'];
			$brand_logo = $row['brand_logo'];
			$brand_update = $row['brand_update'];
		}
	}

    
?>
