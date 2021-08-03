<?php
include('includes/functions.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .="<script>alert('Invalid email address please type a valid email address!');
                    window.location.href='forgot-password.php';</script>";
    }else{
        $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
        $results = mysqli_query($conn,$sel_query);
        $row = mysqli_num_rows($results);
        if ($row==""){
            $error .= "<script> alert('No is registered with this email address!');
                        window.location.href='forgot-password.php';</script> ";
        }
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div>
   <br /><a href='javascript:history.go(-1)'>Go Back</a>";
    }else{
        $expFormat = mktime(
            date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
        );
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5(2418*2+2021);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
// Insert Temp Table
        mysqli_query($conn,
            "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="https://localhost/php/codecamp/account/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">
https://localhost/php/codecamp/account/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser.
                        The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action 
                    is needed, your password will not be reset. However, you may want to log into 
                    your account and change your security password as someone may have guessed it.</p>';
        $output.='<p>Thanks,</p>';
        $output.='<p>iEARN Innovation Academy Team</p>';
        $body = $output;
        $subject = "Password Recovery - Innovation Academy";

        $email_to = $email;
        $fromserver = "studentregister@iearn.africa";
        require("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "iearn.africa"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "studentregister@iearn.africa"; // Enter your email here
        $mail->Password = "4yxiM8A%KNGL"; //Enter your password here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "studentregister@iearn.africa";
        $mail->FromName = "iEARN Innovation Academy";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "<script> alert('An email has been sent to you with instructions on how to reset your password.');
                        window.location.href='forgot-password.php';</script> ";
        }
    }
}else{
?>
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
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form action="" method="post" name="reset">
									<div class="form-group">
										<input class="form-control" type="text" name="email" placeholder="Email">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" name="reset" type="submit">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="login.php">Login</a></div>
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

</html>
<?php
}
?>