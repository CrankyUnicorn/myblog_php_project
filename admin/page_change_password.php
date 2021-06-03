<?php
	require_once('get_restrict_access.php');
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
			
			<div class="container" style="background-color:#f1f1f1">
						<span class="psw">I will send you a password change request to your mailing box.</span>
						
			</div>
			<br>
			<form action="post_forgot_password.php" method="post" id="changeForm" name="change_password" >
						
						
						<div class="mb-3"><button class="btn btn-primary" id="logoutButton" name="change_password" type="submit">Send</button></div>
					</form>
			
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>