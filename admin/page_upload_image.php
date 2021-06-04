<?php
	require_once('get_restrict_access.php');
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
		
			
				<form action="post_upload_image.php" method="post" enctype="multipart/form-data" id="registerForm" name="postForm" >
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="file_name" name="file_name" required="" placeholder="Title"><label class="form-label" for="file_name">Title</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="file" id="file_upload" name="file_upload" required="" placeholder="Image"><label class="form-label" for="file_upload">Image</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div id="success"></div>
						<div class="mb-3"><button class="btn btn-primary" id="postButton" name="image_upload" type="submit">Upload</button></div>
					</form>
					
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>