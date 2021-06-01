
	 <nav class='navbar navbar-light navbar-expand-lg fixed-top' id='mainNav'>
			
			<div class='container'><a class='navbar-brand' href='index.php'><?php echo($brand_name);?></a><button data-bs-toggle='collapse' data-bs-target='#navbarResponsive' class='navbar-toggler' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'><i class='fa fa-bars'></i></button>
				
				<div class='collapse navbar-collapse' id='navbarResponsive'>
					<ul class='navbar-nav ms-auto'>
						<?php require_once('get_nav_menu.php'); ?>
					</ul>
				</div>
			</div>
		</nav>