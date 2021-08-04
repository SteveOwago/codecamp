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
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
                                <?php
                                if(isset($_GET['message'])){
                                    ?>
                                    <div class="alert alert-success text-center">
                                        <p class="lead">Registration Successfull! Use your created Credential to login.</p>
                                    </div>
                                    <?php
                                }
                                if(isset($_GET['error'])){
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <p class="lead">Please check your credentials and try again!.</p>
                                    </div>
                                    <?php
                                }
                                if(isset($_GET['errornouser'])){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <p class="lead">User does not exist in our system!.</p>
                                </div>
                                <?php
                                }
                                if(isset($_GET['errordetails'])){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <p class="lead">Wrong Credentials! Please check your logins and try again.</p>
                                </div>
                                <?php
                                }
                                ?>
								<!-- Form -->
								<form method="post" action="includes/functions.php">
									<div class="form-group">
										<input class="form-control" name="email" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name="password" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" name="account-login" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password.php">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="register.php">Register</a></div>
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

<!-- Mirrored from mentoring-html.dreamguystech.com/template-1/account/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jul 2021 09:53:37 GMT -->
</html>