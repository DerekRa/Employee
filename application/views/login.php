	<body>
		<div class="login-card">
			<h1>Employee</h1><br>
			<!-- to display successfully regestered -->
			<?php if (!empty($this->session->flashdata('message'))) { ?>
				<div class="alert alert-success fade in" id="success-alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->session->flashdata('message'); ?>
				</div>
			<?php } ?>
			<!-- To Display if Credential are NOT on Database -->
			<?php if(isset($_POST['login'])){ ?>
			<div class="alert alert-danger fade in" id="error-alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Invalid Credentials!
			</div>
			<?php } ?>
			<!-- Form -->
			<form action="login" method="POST" enctype="multipart/form-data">
				<!-- To Display IF Username Did Not Meet the Rules -->
				<?php if(isset($_POST['login'])){ 
							$err=form_error('username');
						  	if(!empty($err)) {
				?>
				<div class="alert alert-danger fade in" id="error-alert1">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php  echo $err; ?>
				</div>
				<?php } else {} } ?>
				<!-- Username Input -->
				<input type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
				<!-- To Display IF Username Did Not Meet the Rules -->
				<?php if(isset($_POST['login'])){ 
							$errp=form_error('password');
					  		if(!empty($errp)) {

				?>
				<div class="alert alert-danger fade in" id="error-alert2">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $errp; ?>
				</div>
				<?php }} ?>
				<!-- Password Input -->
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="login" id="loginn" class="login login-submit" value="Enter">
			</form>
			<div class="login-help">
				<a href="<?php echo site_url(); ?>login/loginreg">New Employee? Register</a>
			</div>
		</div>	


