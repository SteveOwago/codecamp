<!DOCTYPE html>
<html lang="en">
<?php
    include ('includes/head.php');
?>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
                            <a href="../index.php"><img class="img-fluid" src="assets/img/iearnlogosmall1.png" alt="Logo"></a>
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>
                                <?php
                                if(isset($_GET['error'])){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <p class="lead">Registration Failed! Please Check your Details again or Contact Us!</p>
                                </div>
                                <?php
								}
								?>
								<!-- Form -->
								<form method="POST" action="includes/functions.php">
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Name">
									</div>
									<div class="form-group">
										<input class="form-control" name="email"  type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name="password" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<input class="form-control" name="confirm_password" type="password" placeholder="Confirm Password">
									</div>
                                    <div class="form-group">
                                        <input class="form-control" name="phone"  type="text" placeholder="Phone Number">
                                    </div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" name="register-account" type="submit">Register</button>
									</div>

								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="login.php">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from mentoring-html.dreamguystech.com/template-1/account/enroll.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 09:53:46 GMT -->
</html>