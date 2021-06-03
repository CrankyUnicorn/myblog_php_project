<?php
	require_once('get_restrict_access.php');
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
			
			
				<form action="post_new_post.php" method="post" id="registerForm" name="postForm" >
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="title" name="post_title" required="" placeholder="Title"><label class="form-label" for="title">Title</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="subtitle" name="post_subtitle" required="" placeholder="Subtitle"><label class="form-label" for="subtitle">Subtitle</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="body" name="post_body" required="" placeholder="Body"><label class="form-label" for="body">Body</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="image" name="post_image" required="" placeholder="Image URL"><label class="form-label" for="image">Image URL</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div id="success"></div>
						<div class="mb-3"><button class="btn btn-primary" id="postButton" type="submit">Post</button></div>
					</form>
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>