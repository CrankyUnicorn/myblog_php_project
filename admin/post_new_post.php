<?php
	require_once("get_restrict_access.php");

	if(isset($_POST['post_form'])){
		
		require_once("db_connect.php");
		$post_title = addslashes($_POST['post_title']);
		$post_subtitle = addslashes($_POST['post_subtitle']);
		$post_body = addslashes($_POST['post_body']);
		$post_image = addslashes($_POST['post_image']);
		$post_user_id = $_SESSION['user_id'];
		
		$sql = "INSERT INTO page_post (user_id, post_title, post_subtitle, post_body, post_image) VALUES ('$post_user_id','$post_title','$post_subtitle','$post_body','$post_image')";
		$result = mysqli_query($connection, $sql) or die($sql);
		
	
		if(!$result){
			
			echo("Error message: ".mysqli_error($connection));
			
			$path = "page_new_post.php?msg=erro";
			
		}else{
			
			$path = "page_new_post.php?msg=post_success";
			
		}
		
		
	}else{
		
		$path = "page_new_post.php?msg=no_action";
	}

	header("Location:$path");
	
?>