<?php
	if(!isset($_SESSION)){
		session_start();
		
	}
	
	if(!isset($_GET['token'])){
		
		header("Location:index.php?msg=access_disable");
	}
	
	#first call from email 
	$_SESSION['user_token'] = $_GET['token'];
	$_SESSION['user_name'] = $_GET['username'];
	

	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	



<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'>
			
			<div class="container" style="background-color:#f1f1f1">
						<span class="psw">Hello <?php echo( $_SESSION['user_name'] );?>. Please insert your new password</span>
			</div>
			<br>
			<form action="./mail/set_new_password.php" method="post" id="setPasswordForm" name="set_password" >
						
						<div class="control-group">
							<div class="form-floating controls mb-3"><input class="form-control" type="password" id="password" name="user_password" required="" placeholder="Password"><label class="form-label">New Password</label><small class="form-text text-danger help-block"></small></div>
						</div>
						
						<div class="mb-3"><button class="btn btn-primary" id="setPasswordButton" name="set_password" type="submit">Change Password</button></div>
					</form>
			
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>