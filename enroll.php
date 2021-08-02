<?php
	include('includes/functions.php');
?>
<!DOCTYPE html> 
<html lang="en">
	
<?php
    include ('includes/head.php');
?>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			
			<!-- Page Content -->
			<div class="bg-pattern-style bg-pattern-style-register">
				<div class="content">
								
					<!-- Register Content -->
					<div class="account-content">
						<div class="account-box">
							<div class="login-right">
								<div class="login-header">
									<h3><span>ENROLL</span> INNOVATION ACADEMY</h3>
									<p class="text-muted">Sign Up for a Learning Course</p>
								</div>
								<?php
								if(isset($_SESSION['error'])){
									?>
									<div class="alert alert-danger">
										<?php
											echo $_SESSION['error'];
										?>
									</div>
								<?php
								}
								?>
								<!-- Register Form -->
								<form method="POST" action="includes/functions.php">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label">First Name</label>
												<input id="fname" type="text" required class="form-control" name="fname" autofocus="">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label">Last Name</label>
												<input id="lname" required type="text" class="form-control" name="lname">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="form-control-label">Course</label>
										<select name="course" required id="course" class="form-control" required>
											<option value="" deselected>Select Course</option>
											<?php
											 $results = get_courses();
											 foreach($results as $result)
											 {
												$id = $result['id'];
												$name = $result['name']; 
												 ?>
												<option value="<?php echo $id ?>"><?php echo $name; ?></option>
											<?php
											 }
											?>
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Email Address</label>
										<input id="email" name="email" type="email" required class="form-control">
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label">Phone</label>
												<input type="text" required class="form-control" name="phone">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="form-control-label">Age</label>
												<input type="number" required class="form-control" name="age">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="custom-control custom-control-xs custom-checkbox">
											<input type="checkbox" class="custom-control-input" required name="agreeCheckboxUser" id="agree_checkbox_user">
											<label class="custom-control-label" for="agree_checkbox_user">I agree to iEARN Innovation Academy</label> <a tabindex="-1" href="javascript:void(0);">Privacy Policy</a> &amp; <a tabindex="-1" href="javascript:void(0);"> Terms.</a>
										</div>
									</div>
									<button name="register-course" class="btn btn-primary login-btn" type="submit">Sign Up</button>
									<!-- <div class="account-footer text-center mt-3">
										Already have an account? <a class="forgot-link mb-0" href="login.php">Login</a>
									</div> -->
								</form>
								<!-- /Register Form -->
								
							</div>
						</div>
					</div>
					<!-- /Register Content -->

				</div>

			</div>		
			<!-- /Page Content -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>
</html>