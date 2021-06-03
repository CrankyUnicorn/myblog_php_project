<?php
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
			
			<div class="container" style="background-color:#f1f1f1">
						<span class="psw">I will send you a new request to your mailing box.</span>
			</div>
			<br>
			<form action="post_forgot_password.php" method="post" id="forgotForm" name="forgot_password" >
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="email" id="email" name="user_email" required="" placeholder="Email Address"><label class="form-label">Email Address</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="mb-3"><button class="btn btn-primary" id="logoutButton" name="forgot_password" type="submit">Send</button></div>
					</form>
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>