<?php
	require_once( "db_connect.php" );
	
	if(isset($_POST['image_upload'])){
		
		$uploads_dir = '../assets/img';
		
		$titulo = addslashes($_POST['file_name']);
		$file_name = $_FILES['file_upload']['name'];
		$tempFile = $_FILES['file_upload']['tmp_name'];
		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
	
		$sql = "INSERT INTO ficheiro VALUES ( null, '".$titulo."', 'no_name' )";
		mysqli_query($connection, $sql) or die($sql);
		
		if ( mysqli_connect_errno() ) {
			printf("Connect failed: %s\n", mysqli_connect_error() );
			exit();
		}
		
		$id = mysqli_insert_id($connection);
		$file_new_name = $id.".".$extension;
		$file_path = $uploads_dir."/".$file_new_name;
		
		$sql =  "UPDATE ficheiro SET nome_ficheiro = '".$file_path."' WHERE id = ".$id."";
		mysqli_query($connection, $sql);
		
		if ( mysqli_connect_errno() ) {
			printf("Connect failed: %s\n", mysqli_connect_error() );
			exit();
		}
		
		$move_success = move_uploaded_file( $tempFile , $file_path );
		if(!$move_success){
			
			echo "Failed to move file";
		}
	
		header("Location:page_new_post.php?sucesso");
		exit();
	}
?>