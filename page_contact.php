<?php
	require_once('html_start.php');
	require_once('html_nav.php');
	require_once('html_header.php');
?>	


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                
				<form action="post_message.php" method="post" id="contactForm" name="sentMessage" novalidate="novalidate">
                    
					<div class="control-group">
                        <div class="form-floating controls mb-3"><input class="form-control" type="text" id="name" name="user_name" required placeholder="Name"><label class="form-label" for="name">Name</label><small class="form-text text-danger help-block"></small></div>
                    </div>
                    
					<div class="control-group">
                        <div class="form-floating controls mb-3"><input class="form-control" type="email" id="email" name="user_email" required placeholder="Email Address"><label class="form-label">Email Address</label><small class="form-text text-danger help-block"></small></div>
                    </div>
                    
					<div class="control-group">
                        <div class="form-floating controls mb-3"><input class="form-control" type="tel" id="phone" name="user_phone" required placeholder="Phone Number"><label class="form-label">Phone Number</label><small class="form-text text-danger help-block"></small></div>
                    </div>
                    
					<div class="control-group">
                        <div class="form-floating controls mb-3"><textarea class="form-control" id="message" data-validation-required-message="Please enter a message." name="user_message" required placeholder="Message" style="height: 150px;"></textarea><label class="form-label">Message</label><small class="form-text text-danger help-block"></small></div>
                    </div>
                    
					<div id="success"><?php if(isset($_GET['success'])) echo "<p>Your message have been send with success.</p>"; if(isset($_GET['fail'])) echo "<p>Message failed to reach its destination!</p>"; ?></div>
                    <div class="mb-3"><button class="btn btn-primary" id="sendMessageButton" type="submit">Send</button></div>
                </form>
            </div>
        </div>
    </div>
    <hr>
   
	
<?php
	require_once('html_footer.php');
	require_once('html_script.php');
	require_once('html_end.php');
	
?>