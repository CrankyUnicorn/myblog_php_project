<?php

	
	require_once('db_connect.php');

	if(isset($_GET['all_posts'])){
		
		$sql = "SELECT * FROM page_post ORDER BY page_post.reg_date DESC";
	}else {
		
		$sql = "SELECT * FROM page_post ORDER BY page_post.reg_date DESC LIMIT 3";
	}	
	
	$result = mysqli_query($connection, $sql);
	if(!$result){
		
		echo("ERR: ".mysqli_error($connection));
	}else{
		
		
		while($row = mysqli_fetch_assoc($result)){
			
			$date = $row['reg_date'];
			$string_date  = date("F j, Y", strtotime(str_replace('-','/', $date)));
			
			$sql = "SELECT user_name.user_name FROM user_name WHERE user_name.id = '".$row['user_id']."'";
			$result_b = mysqli_query($connection, $sql);
			$user_result = mysqli_fetch_assoc($result_b);
			$user_name = $user_result['user_name'];
		
			echo "
				<div class='post-preview'><a href='page_blog.php?id=".$row['id']."'>
					<h2 class='post-title'>".$row['post_title']."</h2>
					<h3 class='post-subtitle'>".$row['post_subtitle']."</h3>
					</a>
					<p class='post-meta'>Posted by&nbsp;<a href='#'>$user_name on $string_date</a></p>
				</div>
				<hr>
			";
		}
		
	}


?>
