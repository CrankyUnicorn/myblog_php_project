<?php

	require_once('db_connect.php');

	$sql = "SELECT * FROM page_nav_menu ORDER BY page_nav_menu.id ASC";
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		while($row = mysqli_fetch_assoc($result)){
		
			echo "<li class='nav-item'><a class='nav-link' href='".$row['nav_target_path']."'>".$row['nav_menu_name']."</a></li>";
			
			
					
		}
	}

    
?>
