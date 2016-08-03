	<body>
		<div class="login-card">
			<h1>Register</h1><br>
			
			<form action="validate_logregister" method="POST" enctype="multipart/form-data">
<!-- ====================== -->
				<!-- To Display IF FIRST NAME Did Not Meet the Rules -->
				<?php if(isset($_POST['logreg'])){ 
							$errfn=form_error('firstname');
						  	if(!empty($errfn)) { ?>
								<div class="alert alert-warning fade in" id="error-alert3">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php  echo $errfn; ?>
								</div>
				<?php }} ?> 
				<!-- End Firstname Display Error -->
				<!-- Input Firstname -->
				<input type="text" name="firstname" placeholder="First Name">
				<!-- End of Firstname Input -->
<!-- ====================== -->				
				<!-- To Display IF LAST NAME Did Not Meet the Rules -->
				<?php if(isset($_POST['logreg'])){ 
							$errln=form_error('lastname');
						  	if(!empty($errln)) { ?>
								<div class="alert alert-warning fade in" id="error-alert4">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php  echo $errln; ?>
								</div>
				<?php }} ?> 
				<!-- End Lastname Display Error -->
				<!-- Input Lastname -->
				<input type="text" name="lastname" placeholder="Last Name">
				<!-- End of Lastname Input -->
<!-- ====================== -->
				<!-- To Display IF USER NAME Did Not Meet the Rules -->
				<?php if(isset($_POST['logreg'])){ 
							$errun=form_error('username');
						  	if(!empty($errun)) { ?>
								<div class="alert alert-warning fade in" id="error-alert5">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php  echo $errun; ?>
								</div>
				<?php }} ?> 
				<!-- End Username Display Error -->
				<!-- Input Username -->
				<input type="text" name="username" placeholder="Username">
				<!-- End of Username Input -->
<!-- ====================== -->				
				<!-- To Display IF PASSWORD Did Not Meet the Rules -->
				<?php if(isset($_POST['logreg'])){ 
							$errpw=form_error('password');
						  	if(!empty($errpw)) { ?>
								<div class="alert alert-warning fade in" id="error-alert6">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php  echo $errpw; ?>
								</div>
				<?php }} ?> 
				<!-- End Password Display Error -->
				<!-- Input Password -->
				<input type="password" name="password" placeholder="Password">
				<!-- End of Password Input -->
<!-- ====================== -->				
				<!-- To Display IF PASSWORD CONFIRM Did Not Meet the Rules -->
				<?php if(isset($_POST['logreg'])){ 
							$errpc=form_error('passwordconf');
						  	if(!empty($errpc)) { ?>
								<div class="alert alert-warning fade in" id="error-alert7">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<?php  echo $errpc; ?>
								</div>
				<?php }} ?> 
				<!-- End Password Confirm Display Error -->
				<!-- Input Password Confirm -->
				<input type="password" name="passwordconf" placeholder="Pass Confirm">
				<!-- End of Password Confirm Input -->
				<input type="submit" name="logreg" id="logreg" class="login login-submit" value="Register">
			</form>
			<div class="login-help">
				<a href="<?php echo site_url(); ?>login">Login</a> 
			</div>
		</div>

 


