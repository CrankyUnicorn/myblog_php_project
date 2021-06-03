<?php
	require_once('get_restrict_access.php');
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	

<div class='container'>
	<div class='row'>
		<div class='col-md-10 col-lg-8'  style='width:100%'>
			
			<form action="get_logout.php" method="get" id="logoutForm" name="logoutForm" >
						
						<div class="mb-3"><button class="btn btn-primary" id="logoutButton" name="logout" type="submit" style='display:block; margin-right:auto; margin-left:auto;'>Logout</button></div>
					</form>
			
			
		</div>
	</div>
</div>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>