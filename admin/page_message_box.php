<?php 
	require_once("get_restrict_access.php");
	
	if(isset($_GET['checkAction'])){
		
		require_once('db_connect.php');
		
		$id_value = $_GET['id'];
		$id_user = $_SESSION['user_id'];
		$sql = "INSERT INTO message_processing ( id_message, id_user_name ) VALUES ('$id_value','$id_user')";
		$result = mysqli_query($connection, $sql) or die($sql);
		header("Location:?checked_success");
		
	}else if(isset($_GET['deleteAction'])){
		
		require_once('db_connect.php');
		
		$id_value = $_GET['id'];
		$sql = "DELETE FROM message_contact WHERE id = '$id_value' LIMIT 1";
		$result = mysqli_query($connection, $sql) or die($sql);
		header("Location:?deleted_success");
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
					$sql = "SELECT count(*) as total FROM message_contact";
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
					
					$page_num_limit = $page_num + 10;
					
					if($page_num_limit > $total){
						$page_num_limit = $total;
					}
					
				
					if((!isset($_GET['check'])) && (!isset($_GET['delete']))){
						echo("
						<table class='table table-striped'>
							<thead>
								<tr>
									<th scope='col'>#</th>
									<th scope='col'>Name</th>
									<th scope='col'>Email</th>
									<th scope='col'>Telephone</th>
									<th scope='col'>Message</th>
									<th scope='col'>Read</th>
									<th scope='col'>Delete</th>
								</tr>
							</thead>
							<tbody>
							");
							
							require_once('db_connect.php');
							$sql = "SELECT * FROM message_contact LIMIT $page_num, $page_num_limit";
							$result = mysqli_query($connection, $sql);
							
							if((mysqli_num_rows($result))==0){
								echo("No results!");
							}else{
								$count = 1;
								while($row = mysqli_fetch_assoc($result)){
									echo("
									<tr>
									<th scope='row'>".$row['id']."</td>
									<td>".$row['name']."</td>
									<td>".$row['email']."</td>
									<td>".$row['telephone']."</td>
									<td>".$row['message']."</td>
									");
									
									$sql = "SELECT * FROM message_processing WHERE id_message = '".$row['id']."'";
									$result_b = mysqli_query($connection, $sql);
									$row_numb = mysqli_num_rows($result_b);
									
									if($row_numb == 1){
										
										echo("
										<td>checked</td>
										");
										
									}else if($row_numb == 0){
									
										echo("
										<td><a href='?check&id=".$row['id']."'>check</a></td>
										");
										
									}
									
									echo("
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
						
						<button onclick = 'window.location.href = \"?page_forward=page_forward&page_num=$page_num\";' class='btn btn-primary' style='display:inline; margin: 5px; padding: 5px;'>Forward</button>
					");		
					}else{
						
						require_once('db_connect.php');
						$id = $_GET['id'];
						$sql = "SELECT * FROM message_contact WHERE id = $id";
						$result = mysqli_query($connection, $sql);
						$row = mysqli_fetch_assoc($result);
						
						if(isset($_GET['check'])){
							echo("
							<form>
								
								<div class='form-group'>
									<label>ID<input type='text' class='form-control' placeholder='ID' name='message_id' readonly value='".$row['id']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Name<input type='text' class='form-control' placeholder='Name' name='message_name' readonly value='".$row['name']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Message<input type='text' class='form-control' placeholder='Ordem' name='message_content' readonly value='".$row['message']."'></label>
								</div>
								
								<input type='hidden' name='id' value='".$row['id']."'>
								<br>
								<button type='submit' class='btn btn-primary' name='checkAction'>Check</button>
							</form>
							");
						}else if(isset($_GET['delete'])){
							echo("
							<form>
								<div class='form-group'>
									<label>ID<input type='text' class='form-control' placeholder='ID' name='message_id' readonly value='".$row['id']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Name<input type='text' class='form-control' placeholder='Name' name='message_name' readonly value='".$row['name']."'></label>
								</div>
								
								<div class='form-group'>
									<label>Message<input type='text' class='form-control' placeholder='Ordem' name='message_content' readonly value='".$row['message']."'></label>
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