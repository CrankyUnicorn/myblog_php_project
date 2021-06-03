	<?php
		
		$file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
		$header_title = $file_name;
		$header_subtitle = $file_name;
		
		if($file_name == 'index'){
			$header_title = 'Welcome';
			if(isset($_SESSION['user_name'])){
				
				$header_subtitle = $_SESSION['user_name'];
			}else{
				$header_subtitle = 'Please enter your E-mail and Password.';
			}
		}else if($file_name == 'page_register'){
			$header_title = 'New Resgistry';
			$header_subtitle = 'Please pick your E-mail and Password.';
		}else if($file_name == 'page_forgot_password'){
			$header_title = 'Forgot Password?';
			$header_subtitle = 'Don\'t worry I got your back.';
		}else if($file_name == 'page_logout'){
			$header_title = 'Logout';
			$header_subtitle = 'Going so soon?';
		}else if($file_name == 'page_new_post'){
			$header_title = 'New Post';
			$header_subtitle = 'Create your new post.';
		}else if($file_name == 'page_edit_post'){
			$header_title = 'Edit Post';
			$header_subtitle = 'Do you want to edit your post?';
		}else if($file_name == 'page_change_password'){
			$header_title = 'Change Password';
			$header_subtitle = 'Tierd of your old password?';
		}else
	?>

		<header class='masthead' >
			<div class='overlay'></div>
			<div class='container'>
				<div class='row'>
					<div class='col-md-10 col-lg-8 mx-auto position-relative'>
						<div class='site-heading'>
							<h1><?php echo($header_title); ?></h1><span class='subheading'><?php echo($header_subtitle); ?></span>
						</div>
					</div>
				</div>
			</div>
		</header>