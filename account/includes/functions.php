<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'codecamp');
use Safaricom\Mpesa;
function escape($val){
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}

if(isset($_POST['register-account'])){
    registerAccount();
}

function registerAccount(){
    global $conn;
    $name = escape($_POST['name']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);
    $confirm_password = escape($_POST['password']);
    $phone = escape($_POST['phone']);
    if ($password == $confirm_password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(`name`,`email`,`password`,`phone`) 
        VALUES('$name','$email','$password','$phone')";
        $result = mysqli_query($conn, $sql);

        if($result==true){
            $_SESSION['message'] = "Registration Successfull";
            header('Location:../login.php?message');
        }else{
            $_SESSION['error'] = "Registration Failed. Please Try Again Later";
            header('Location:../register.php?error');
        }
    }
}

if(isset($_POST['account-login'])){
    accountLogin();
}

function accountLogin(){
    global $conn;
    if(empty($_POST['email'])||empty($_POST['password'])){
        echo '<script>alert("All the fields are required!");
        window.location.href=\'../login.php\';</script>';
    }else{
        $email = escape($_POST['email']);
        $password = escape($_POST['password']);
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                if(password_verify($password, $row['password'])){
                    $_SESSION['email'] = $email;
                    header('Location:../index.php');
                }else{
                    header('Location:../login.php?errordetails');
                }
            }
        }else{
            header('Location:../login.php?errornouser');
        }
    }
}
if (isset($_POST['logout'])){
    accountLogout();
}
function accountLogout(){
    session_unset();
    header('Location:../login.php');
}
function get_courses()
{
    global $conn;
    $ret = array();
    $sql = "SELECT * FROM courses ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);

    while($ar = mysqli_fetch_assoc($result))
    {
        $ret[] = $ar;
    }
    return $ret;
}
$error="";

function get_data($sql){
    global $conn;
    $ret = array();
    $result = mysqli_query($conn,$sql);
    while($ar = mysqli_fetch_assoc($result)){
        $ret[] = $ar;
    }
    return $ret;
}

// Function Enroll student to a course
if(isset($_POST['enroll-course'])){
    enrollCourse();
}

function enrollCourse(){
    global $conn;
    $course_id = escape($_POST['course_id']);
    $user_id = escape($_POST['user_id']);
    
    $sql= "INSERT INTO course_enroll(`course_id`,`user_id`) VALUES('$course_id','$user_id')";
    $result=mysqli_query($conn,$sql);
    if($result == true){
        header('Location:../my-courses.php');
    }else{
        echo "<script>
              alert('Error Please Try Again Later');
              window.location.href='../index.php'; 
        </script>";
    }
}

//MPESA STK PUSH

if(isset($_POST['submit-payment'])){
    processMpesaStk();
}

function processMpesaStk(){

    $amount = escape($_POST['amount']);
    $phone = escape($_POST['phone']);

    $BusinessShortCode=174379;
    $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $TransactionType= 'CustomerPayBillOnline';
    $Amount= $amount;
    $PartyA= $phone;
    $PartyB=174379;
    $PhoneNumber= $phone;
    $CallBackURL='https://innovationacademy.africa/account/includes/callback2343sdteo0P.php';
    $AccountReference='iEARN Innovation Academy';
    $TransactionDesc='FEEPayment';
    $Remarks='Thank You';

    $mpesa= new Mpesa();

    $stkPushSimulation=$mpesa->STKPushSimulation(
                                            $BusinessShortCode,
                                            $LipaNaMpesaPasskey,
                                            $TransactionType,
                                            $Amount,
                                            $PartyA,
                                            $PartyB,
                                            $PhoneNumber,
                                            $CallBackURL,
                                            $AccountReference,
                                            $TransactionDesc,
                                            $Remarks
                                    );
}