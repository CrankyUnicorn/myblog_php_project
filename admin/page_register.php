<?php
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
			
			
			<form action="post_register.php" method="post" id="registerForm" name="registerForm" >
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="text" id="name" name="user_name" required="" placeholder="Name"><label class="form-label" for="name">Name</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="email" id="email" name="user_email" required="" placeholder="Email Address"><label class="form-label">Email Address</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="password" id="password" name="user_password" required="" placeholder="Password"><label class="form-label">Password</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						
						<div id="success"></div>
						<div class="mb-3"><button class="btn btn-primary" id="registerButton" type="submit">Register</button></div>
					</form>
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>