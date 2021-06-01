<?php

	$post_title = "";
	$post_subtitle = "";
	$post_background = "";
	$selected_post = "";
	$post_content = "";
	
	//require_once('db_connect.php');
	
	
	if(!isset($_GET['id'])){
		$sql = "SELECT * FROM page_post WHERE page_post.id = (SELECT MAX(page_post.id) FROM page_post)";
	}else{
		$selected_post = $_GET['id'];
		$sql = "SELECT * FROM page_post WHERE page_post.id = '$selected_post'";
	}				
	
	
	$result = mysqli_query($connection, $sql);
	
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		$row_num = mysqli_num_rows($result);
		
		if($row_num == 1){
			$row = mysqli_fetch_assoc($result);
			
			$post_title = $row['post_title'];
			$post_subtitle = $row['post_subtitle'];
			$post_background = $row['post_image'];
			$post_content = $row['post_body'];
			
			echo "<script> document.getElementById('header_background').style.backgroundImage = \"url('./assets/img/".$post_background."')\"; </script>";
			
			echo "<script>document.getElementById('header_title').innerText ='".$post_title."'; </script>";
			
			echo "<script>document.getElementById('header_subtitle').innerText ='".$post_subtitle."'; </script>";
			
			echo "$post_content";
		}
		
	}

?>

 