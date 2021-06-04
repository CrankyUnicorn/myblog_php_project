<?php 
	require_once("get_restrict_access.php");
	
	if(isset($_GET['editAction'])){
		
		require_once('db_connect.php');
		$post_id = $_GET['id'];
		$post_title = $_GET['post_title'];
		$post_subtitle = $_GET['post_subtitle'];
		$post_body = addslashes($_GET['post_body']);
		$post_image = $_GET['post_image'];
		$sql = "UPDATE page_post SET post_title = '$post_title', post_subtitle = '$post_subtitle', post_body = '$post_body', post_image = '$post_image' WHERE id = '$post_id'";
		$result = mysqli_query($connection, $sql) or die($sql);
		header("Location:?edited");
		
	}else if(isset($_GET['deleteAction'])){
		
		require_once('db_connect.php');
		$post_id = $_GET['id'];
		$sql = "DELETE FROM page_post WHERE id = '$post_id' LIMIT 1";
		$result = mysqli_query($connection, $sql) or die($sql);
		header("Location:?deleted");
	}else if(isset($_GET['page_forward'])){
		
		require_once('db_connect.php');
		$page_num = $_GET['page_num'];
		$page_num += 10;
	}else if(isset($_GET['page_backward'])){
		
		require_once('db_connect.php');
		$page_num = $_GET['page_num'];
		$page_num -= 10;
		
	}
	
?>


<?php
	
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8' style="width:100% !important;">
			
			
			<?php
					require_once('db_connect.php');
					$sql = "SELECT count(*) as total FROM page_post";
					$result = mysqli_query($connection, $sql);
					$total_row = mysqli_fetch_assoc($result);
					$total = $total_row['total'];
					
					
					if(!isset($page_num)){
						
						$page_num = 1;
					}else{
						
						if( $page_num < 1 ){
							$page_num = 1;
						}else if ($page_num > $total){
							$page_num = $total;
						}	
					}
					
					$page_num_limit = $page_num+10;
					
					if($page_num_limit > $total){
						$page_num_limit = $total;
					}
					
			
					if((!isset($_GET['edit'])) && (!isset($_GET['delete']))){
						echo("
						<table class='table table-striped'>
							<thead>
								<tr>
									<th scope='col'>#</th>
									<th scope='col'>Title</th>
									<th scope='col'>Subtitle</th>
									<th scope='col'>Body</th>
									<th scope='col'>Image</th>
									<th scope='col'>Edit</th>
									<th scope='col'>Delete</th>
								</tr>
							</thead>
							<tbody>
							");
							
							require_once('db_connect.php');
							//$sql = "SELECT * FROM page_post WHERE user_id = '".$_SESSION['user_id']."' LIMIT 0,10"; #option for limiting the ownership of the posts
							$sql = "SELECT * FROM page_post LIMIT $page_num, $page_num_limit";
							$result = mysqli_query($connection, $sql);
							
							if((mysqli_num_rows($result))==0){
								echo("No results!");
							}else{
								$count = 1;
								while($row = mysqli_fetch_assoc($result)){
									$limited_subtitle = substr($row['post_subtitle'], 0, 50);
									$limited_body = substr($row['post_body'], 3, 50);
									echo("
									<tr>
									<th scope='row'>".$row['id']."</td>
									<td>".$row['post_title']."</td>
									<td>$limited_subtitle</td>
									<td>$limited_body</td>
									<td>".$row['post_image']."</td>
									
									<td><a href='?edit&id=".$row['id']."'>edit</a></td>
									<td><a href='?delete&id=".$row['id']."'>delete</a></td>
									
									</tr>
									");
									$count++;
								}
							}
					echo("
						</tbody>
						</table>
						<br>
						
						<button onclick = 'window.location.href = \"?page_backward=page_backward&page_num=$page_num\";' class='btn btn-primary' style='display:inline; margin: 5px; padding: 5px;'>Backward</button>
						
						<span>$page_num to $page_num_limit of $total</span>
						
						<button onclick = 'window.location.href = \"?page_backward=page_backward&page_num=$page_num\";' class='btn btn-primary' style='display:inline; margin: 5px; padding: 5px;'>Forward</button>
					");		
					}else{
						
						require_once('db_connect.php');
						$id = $_GET['id'];
						$sql = "SELECT * FROM page_post WHERE id = $id";
						$result = mysqli_query($connection, $sql) or die($sql);
						$row = mysqli_fetch_assoc($result);
						
						if(isset($_GET['edit'])){
							$new = htmlspecialchars($row['post_body'], ENT_QUOTES);
							
							echo("
							<form>
								
								<div class='form-group'>
									<label>Title<input type='text' class='form-control' placeholder='Title' name='post_title' required value='".$row['post_title']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Subtitle<input type='text' class='form-control' placeholder='Subtitle' name='post_subtitle' required value='".$row['post_subtitle']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Body<input type='text' class='form-control' placeholder='Body' name='post_body' required value='$new'></label>
								</div>
								
								<div class='form-group'>
									<label>Image<input type='text' class='form-control' placeholder='Image' name='post_image' required value='".$row['post_image']."'></label>
								</div>
								
								
								
								<input type='hidden' name='id' value='".$row['id']."'>
								<br>
								<button type='submit' class='btn btn-primary' name='editAction'>Edit</button>
							</form>
							");
						}else if(isset($_GET['delete'])){
							echo("
							<form>
							
								<div class='form-group'>
									<label>Title<input type='text' class='form-control' placeholder='Title' name='post_title' readonly value='".$row['post_title']."'></label>
								</div>
								
								<input type='hidden' name='id' value='".$row['id']."'>
								<br>
								<button type='submit' class='btn btn-primary' name='deleteAction'>Delete</button>
							</form>
							");
						}
					}
					?>
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>