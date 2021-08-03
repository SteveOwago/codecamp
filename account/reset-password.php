<?php
include ('includes/head.php');
include('includes/functions.php');
if (isset($_GET['key']) && isset($_GET['email']) && isset($_GET['action'])
    && ($_GET['action']=='reset') && !isset($_POST['action']))
{
            $key = $_GET["key"];
            $email = $_GET["email"];
            $curDate = date("Y-m-d H:i:s");
            $query = mysqli_query($conn,
                "SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';"
            );
            $row = mysqli_num_rows($query);
            if ($row==""){
                $error .= '<div class="container">
                                <div class="row text-center">
                                    <div class="col-md-6 offset-3 mt-5">
                                        <div class="card">
                                            <div class="card-title bg-danger"><h2>Invalid Link</h2></div>
                                            <div class="card-body">
                                                <p>The link is invalid/expired. Either you did not copy the correct link
                                    from the email, or you have already used the key in which case it is 
                                    deactivated.</p>
                                    <p><a href="forgot-password.php">
                                                Click here</a> to reset password.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }else{
                $row = mysqli_fetch_assoc($query);
                $expDate = $row['expDate'];
                if ($expDate >= $curDate){
                    ?>
                    <br />
                    <!-- Main Wrapper -->
                    <div class="main-wrapper login-body">
                        <div class="login-wrapper">
                            <div class="container">
                                <div class="loginbox">
                                    <div class="login-left">
                                        <img class="img-fluid" src="assets/img/iearnlogosmall1.png" alt="Logo">
                                    </div>
                                    <div class="login-right">
                                        <div class="login-right-wrap">
                                            <h1>Forgot Password?</h1>
                                            <p class="account-subtitle">Change your password</p>

                                            <!-- Form -->
                                            <form action="" method="post" name="update">
                                                <input type="hidden" name="action" value="update" />
                                                <br /><br />
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="pass1" maxlength="15" placeholder="New Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password" name="pass2" maxlength="15" placeholder="New Password" required>
                                                </div>
                                                <input type="hidden" name="email" value="<?php echo $email;?>"/>
                                                <div class="form-group mb-0">
                                                    <button class="btn btn-primary btn-block" name="reset" type="submit">Reset Password</button>
                                                </div>
                                            </form>
                                            <!-- /Form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }else{
                    $error .= '<div class="container">
                                <div class="row text-center">
                                    <div class="col-md-6 offset-3 mt-5">
                                        <div class="card">
                                            <div class="card-title bg-success"><h2>Link Expired</h2></div>
                                            <div class="card-body">
                                                 <p>The link is expired. You are trying to use the expired link which 
                                                    as valid only 24 hours (1 days after request).<br /><br /></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
       ';

                }
            }
            if($error!=""){
                echo "<div class='error'>".$error."</div><br />";
            }
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"]=="update")){
    $error="";
    $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1!=$pass2){
        $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
    }else{
        $pass1 = password_hash($pass1,PASSWORD_DEFAULT);
        $updatePass = mysqli_query($conn,
            "UPDATE `users` SET `password`='".$pass1."', `trn_date`='".$curDate."' 
WHERE `email`='".$email."';"
        );
        if($updatePass){
            mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");

            echo '
<div class="container">
    <div class="row text-center">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-title bg-success">Reset Confirmation</div>
                <div class="card-body">
                    <div class="error"><p>Congratulations! Your password has been updated successfully.</p>
                        <p><a href="https://localhost/php/codecamp/account/login.php">
                                Click here</a> to Login.</p></div><br />
                </div>
            </div>
        </div>
    </div>
</div>';
        }else{
            echo "Password not updated";
        }

    }
}
?>

<!-- jQuery -->
<script src="assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

</html>
