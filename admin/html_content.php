		<div class='container'>
			<div class='row'>
				<div class='col-md-10 col-lg-8'>
					
					
					
					<!---->
					<form action="login.php" method="get" id="loginForm" name="login" >
						
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
						<div class="mb-3"><button class="btn btn-primary" id="sendMessageButton" type="submit">Login</button></div>
					</form>
					
					
					<div class="container" style="background-color:#f1f1f1">
						<span class="psw">Forgot <a href="#">password?</a></span>
					</div>
				</div>
			</div>
		</div>

