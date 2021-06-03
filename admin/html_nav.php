
	 <nav class='navbar navbar-light navbar-expand-lg fixed-top' id='mainNav'>
			
			<div class='container'><a class='navbar-brand' href='index.php'>Admin Sys</a><button data-bs-toggle='collapse' data-bs-target='#navbarResponsive' class='navbar-toggler' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'><i class='fa fa-bars'></i></button>
				
				<div class='collapse navbar-collapse' id='navbarResponsive'>
					<ul class='navbar-nav ms-auto'>
						<?php 
						
						
						if(isset($_SESSION['user_name'])){
		
							echo "
							<li class='nav-item'><a class='nav-link' href='#'>".$_SESSION['user_name']."</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_new_post.php'>New Post</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_edit_post.php'>Edit Post</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_change_password.php'>Change Password</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_message_box.php'>Message Box</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_logout.php'>Logout</a></li>
							";
							
						}else{
							
							echo "
							<li class='nav-item'><a class='nav-link' href='index.php'>Login</a></li>
							
							<li class='nav-item'><a class='nav-link' href='page_register.php'>New Registry</a></li>
							";
						} 
						
						?>
					</ul>
				</div>
			</div>
		</nav>