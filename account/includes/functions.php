<?php
session_start();
//Database Connection
$conn = mysqli_connect('localhost', 'root', '', 'codecamp');
    function escape($val){
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
    }

    // Check if user is admin
    function isAdmin($email){
    	global $conn;
    	$user = false;
		$query = "SELECT * FROM users WHERE role_id = 1 AND email = '$email' LIMIT 1";
		$result = mysqli_query($conn,$query);
		while($ar = mysqli_fetch_assoc($result))
		{
			$ret[] = $ar;
		}
		return $ret;
    }

    //Registration

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
        session_destroy();
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
        $auth_url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';//replace sandbox with api for live
        $stk_push_url='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';//replace sandbox with api for live
        $stk_push_url='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';//replace sandbox with api for live
        $consumer_key='plGeftfZnLQezfbLcw4PPqH17O7xoitQ';
        $consumer_secret='Hu4U1l9JdBAA4fKJ';
        $credentials=base64_encode($consumer_key.':'.$consumer_secret);

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$auth_url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization: Basic '.$credentials));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER,false);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

        $curl_response=curl_exec($ch);
        $access_token=json_decode($curl_response)->access_token;

        curl_setopt($ch,CURLOPT_URL,$stk_push_url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json','Authorization:Bearer '.$access_token));

        $timestamp=date('YmdHis');
        $passkey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $shortCode=174379;
        $password=base64_encode($shortCode.$passkey.$timestamp);

        $curl_post_data=[
            'BusinessShortCode'      =>'174379',
            'Password'               =>$password,
            'Timestamp'              =>$timestamp,
            'TransactionType'        =>'CustomerPayBillOnline',
            'Amount'                 =>$amount,
            'PartyA'                 =>$phone,
            'PartyB'                 =>174379,
            'PhoneNumber'            =>$phone,
            'CallBackURL'            =>'https://nariontechacademy.co.ke/callback.php',
            'AccountReference'       =>'iEARN KENYA',
            'TransactionDesc'        =>'Fee Account'

        ];

        $data_string=json_encode($curl_post_data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch,CURLOPT_HEADER,0);

        $curl_res=curl_exec($ch);
        print_r($curl_res);
        if($curl_res){
            echo "<script>alert('Unlock your phone and enter your Mpesa Pin to finish the Transaction <br> Thank You');
                       window.location.href='../my-courses.php';</script>";
            $_SESSION['course_id']= escape($_POST['course_id']);
            $_SESSION['email']= escape($_POST['email']);
        }
    }

    //Update Payment
//    function updatePayment(){
//        global $conn;
//        $email = $_SESSION['email'];
//        $course_id = $_SESSION['course_id'];
//        $amount = $_SESSION['amount'];
//        $sql = "INSERT INTO course_payments(`course_id`,`email`,`amount`) VALUES('$course_id','$email','$amount')";
//        $query = mysqli_query($conn,$sql);
//        if ($query){
//            echo "<script>alert('Payment Saved Successfully');
//                       window.location.href='../my-courses.php';</script>";
//        }
//    }