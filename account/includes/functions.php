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
	
	
	// Function Create Course
	if(isset($_POST['add-course'])){
		addCourse();
	}
	
	function addCourse(){
		global $conn;
		$name = escape($_POST['name']);
		$description = escape($_POST['description']);
		$startdate = escape($_POST['date']);
		$price = escape($_POST['price']);

        $targetDir = "uploads/courses/";
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileName = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["file"]["name"])){
                $allowTypes = array('pptx','docx','doc','ppt','pdf');
                if(in_array($fileType, $allowTypes)){
                // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
		
                        $sql= "INSERT INTO courses(`name`,`description`,`date`,`price`,`course_outline`) VALUES('$name','$description','$startdate','$price','$fileName')";
                        $result=mysqli_query($conn,$sql);
                        if($result == true){
                            echo "<script>
                            alert('Course Created Succefully');
                            window.location.href='../index.php';
                            
                        </script>";
                        }else{
                            echo "<script>
                            alert('Error Please Try Again Later');
                            window.location.href='../index.php';
                        </script>";
                        }
                    }else{
                        echo "<script>
                        alert('File not Uploaded');
                        window.location.href='../index.php';
                    </script>";
                    }
                }else{
                    echo "<script>
                        alert('Incorect File Type..consider pdf,doc,dox,pptx,ppt');
                        window.location.href='../index.php';
                    </script>";
                }
        }else{
            $sql= "INSERT INTO courses(`name`,`description`,`date`,`price`) VALUES('$name','$description','$startdate','$price')";
            $result=mysqli_query($conn,$sql);
            if($result == true){
                echo "<script>
                alert('Course Created Succefully');
                window.location.href='../index.php';
                
            </script>";
            }else{
                echo "<script>
                alert('Error Please Try Again Later');
                window.location.href='../index.php';
            </script>";
            }
        }
	}
	
	// Function Update Session
	if(isset($_POST['update-course'])){
		updateCourse();
	}
	
	function updateCourse(){
		global $conn;
		$course_id = escape($_POST['id']);
		$name = escape($_POST['name']);
		$description = escape($_POST['description']);
		$startdate = escape($_POST['date']);
		$price = escape($_POST['price']);

        //Fetch and Delete existing file before editing
        $getdata = "SELECT * FROM courses WHERE id=".$course_id;
        $results = get_data($getdata);
        foreach ($results as $result) {
            $targetDir1 = "uploads/courses/";
            $fileName = $result['course_outline'];

            unlink($targetDir1.$fileName);
        }

        $targetDir = "uploads/courses/";
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileNameEdit = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $fileNameEdit;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["file"]["name"])){
                $allowTypes = array('pptx','docx','doc','ppt','pdf');
                if(in_array($fileType, $allowTypes)){
                // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $sql= "UPDATE courses SET `name`='$name',`description`='$description',`date`='$startdate',`price`='$price', `course_outline`='$fileNameEdit' WHERE id =".$course_id;
                        $result=mysqli_query($conn,$sql);
                        if($result == true){
                            echo "<script>
                            alert('Course Edited Succefully');
                            window.location.href='../view-course.php?course=$course_id';
                            
                        </script>";
                        }else{
                            echo "<script>
                            alert('Error Please Try Again Later');
                            window.location.href='../view-course.php?course=$course_id';
                        </script>";
                        }
                    }else{
                        echo "<script>
                            alert('Course Outline File Not Uploaded');
                            window.location.href='../view-course.php?course=$course_id';
                        </script>";
                    }
                }else{
                    echo "<script>
                        alert('Incorect File Type..consider pdf,doc,dox,pptx,ppt');
                        window.location.href='../index.php';
                    </script>";
                }
            }else{
                $sql= "UPDATE courses SET `name`='$name',`description`='$description',`date`='$startdate',`price`='$price' WHERE id =".$course_id;
                        $result=mysqli_query($conn,$sql);
                        if($result == true){
                            echo "<script>
                            alert('Course Edited Succefully');
                            window.location.href='../view-course.php?course=$course_id';
                            
                        </script>";
                        }else{
                            echo "<script>
                            alert('Error Please Try Again Later');
                            window.location.href='../view-course.php?course=$course_id';
                        </script>";
                        }
            }
	}
	
	
	// Function Create Session
	if(isset($_POST['add-session'])){
		addSession();
	}
	
	function addSession(){
		global $conn;
		$course_id = escape($_POST['course_id']);
		$name = escape($_POST['name']);
		$description = escape($_POST['description']);
		$startdatetime = escape($_POST['startdatetime']);
		$link = escape($_POST['link']);
                // File upload path
        $targetDir = "uploads/sessions/";
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileName = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["file"]["name"])){
                $allowTypes = array('pptx','docx','doc','ppt','pdf');
                if(in_array($fileType, $allowTypes)){
                // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    $sql= "INSERT INTO sessions(`course_id`,`name`,`description`,`startdatetime`,`link`,`file`) VALUES('$course_id','$name','$description','$startdatetime','$link','$fileName')";
                    $result=mysqli_query($conn,$sql);
                    if($result == true){
                    echo "<script>
                    alert('Session Created Succefully');
                    window.location.href='../view-course.php?course=$course_id';</script>";
                    }else{
                    echo "<script>
                    alert('Error Please Try Again Later');
                    window.location.href='../add-session.php?course=$course_id';
                </script>";
		            }
                }
            }
        }else{
            $sql= "INSERT INTO sessions(`course_id`,`name`,`description`,`startdatetime`,`link`) VALUES('$course_id','$name','$description','$startdatetime','$link')";
            $result=mysqli_query($conn,$sql);
            if($result == true){
                echo "<script>
                alert('Session Created Succefully');
                window.location.href='../view-course.php?course=$course_id';
                
            </script>";
            }else{
                echo "<script>
                alert('Error Please Try Again Later');
                window.location.href='../add-session.php?course=$course_id';
            </script>";
		}
        }
		
		
	}
	
	// Function Update Session
	if(isset($_POST['update-session'])){
		updateSession();
	}
	
	function updateSession(){
		global $conn;
		$session_id = escape($_POST['id']);
        $getdata = "SELECT * FROM sessions WHERE id=".$session_id;
        $results = get_data($getdata);
        foreach ($results as $result) {
            $targetDir1 = "uploads/sessions/";
            $fileName = $result['file'];

            unlink($targetDir1.$fileName);
        }
		$name = escape($_POST['name']);
		$description = escape($_POST['description']);
		$startdatetime = escape($_POST['startdatetime']);
		$link = escape($_POST['link']);
		$videolink = escape($_POST['video_link']);

        $targetDir = "uploads/sessions/";
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileNameEdit = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $fileNameEdit;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(!empty($_FILES["file"]["name"])){
                $allowTypes = array('pptx','docx','doc','ppt','pdf','csv');
                if(in_array($fileType, $allowTypes)){
                // Upload file to server
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                        $sql= "UPDATE sessions SET `name`='$name',`description`='$description',`startdatetime`='$startdatetime',`link`='$link',`video_link`='$videolink',`file`='$fileNameEdit' WHERE id =".$session_id;
                        $result=mysqli_query($conn,$sql);
                        if($result == true){
                            echo "<script>
                            alert('Session Edited Succefully');
                            window.location.href='../view-session.php?session=$session_id';
                            
                        </script>";
                        }else{
                            echo "<script>
                            alert('Error Please Try Again Later');
                            window.location.href='../view-session.php?session=$session_id';
                        </script>";
                        }
                    }else{
                        echo "<script>
                        alert('Check Your file type!');
                        window.location.href='../view-session.php?session=$session_id';
                    </script>";
                    }
                }else{
                    echo "<script>
                    alert('Check Your file type!');
                    window.location.href='../view-session.php?session=$session_id';
                </script>";
                }
            }
	}
	
	//Delete Session
	if (isset($_GET['deleteCourse'])){
		$id = $_GET['deleteCourse'];
        //Fetch and Delete existing file before editing
        $getdata = "SELECT * FROM courses WHERE id=".$id;
        $results = get_data($getdata);
        foreach ($results as $result) {
            $targetDir1 = "uploads/courses/";
            $fileName = $result['course_outline'];

            unlink($targetDir1.$fileName);
        }
        // Delete Associated Sessions
        $getdata = "SELECT * FROM sessions WHERE course_id=".$id;
        $results = get_data($getdata);
        foreach ($results as $result) {
            $targetDir2 = "uploads/sessions/";
            $fileName2 = $result['file'];

            $deletefile=unlink($targetDir2.$fileName2);
            if($deletefile == true){
                $sql = "DELETE FROM sessions WHERE course_id=".$id;
                $delete = delete($sql);
            }
        }
		$sql = "DELETE FROM courses WHERE id=".$id;
		$delete = delete($sql);
		if($delete == true){
			echo "<script>
              alert('Course Deleted Succefully');
              window.location.href='../index.php';
              
        </script>";
		}else{
			echo "<script>
              alert('Course Not Deleted');
              window.location.href='../index.php';
        </script>";
		}
		
	}
	//Delete Session
	if (isset($_GET['deleteSession'])){
		$id = $_GET['deleteSession'];
        $getdata = "SELECT * FROM sessions WHERE id=".$id;
        $results = get_data($getdata);
        foreach ($results as $result) {
            $targetDir1 = "uploads/sessions/";
            $fileName = $result['file'];

            $deletefile=unlink($targetDir1.$fileName);
        }
            if($deletefile == true){
                $sql = "DELETE FROM sessions WHERE id=".$id;
                $delete = delete($sql);
                if($delete == true){
                    echo "<script>
                    alert('Session Deleted Succefully');
                    window.location.href='../index.php';
                    
                </script>";
                }else{
                    echo "<script>
                    alert('Session Not Deleted');
                    window.location.href='../index.php';
                </script>";
                }
            }
        
		
	}
//Delete Function
	function delete($sql){
		global  $conn;
		$result=mysqli_query($conn,$sql);
		if($result){
			return true;
		}else{
			return false;
		}
	}
//MPESA STK PUSH

    if(isset($_POST['submit-payment'])){
        processMpesaStk();
    }

    function processMpesaStk(){
        $course_id= escape($_POST['course_id']);
        $email= escape($_POST['email']);
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
            'CallBackURL'            =>"https://innovationacademy.africa/account/includes/callback2343sdteo0P.php?email=$email&courseID=$course_id&amount=$amount",
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


//Change user access Levels to Admin.

if (isset($_GET['userID']))
{
    $user_id = $_GET['userID'];
    updateUserToAdmin($user_id);
}

function updateUserToAdmin($user_id){
    global $conn;
    $sql= "UPDATE users SET `role_id`= 1 WHERE id =".$user_id;
	$result=mysqli_query($conn,$sql);
    if ($result){
        echo "<script>alert('User Role Updated Successfully');
        window.location.href='../add-tutor.php';</script>";
    }
}
//Change user access Levels to Admin.

if (isset($_GET['tutorID']))
{
    $tutor_id = $_GET['tutorID'];
    updateUserToStudent($tutor_id);
}

function updateUserToStudent($tutor_id){
    global $conn;
    $sql= "UPDATE users SET `role_id`= 2 WHERE id =".$tutor_id;
	$result=mysqli_query($conn,$sql);
    if ($result){
        echo "<script>alert('User Role Updated Successfully');
        window.location.href='../tutors.php';</script>";
    }
}

//Change user access Levels to Admin.

if (isset($_POST['enroll-student']))
{
    addStudentToCourse();
}

function addStudentToCourse(){
    global $conn;
    $email = escape($_POST['email']);
    $course_id = escape($_POST['course_id']);
    $amount = escape($_POST['amount']);
    $sql= "INSERT INTO course_payments(`course_id`,`email`,`amount`) VALUES('$course_id','$email','$amount')";
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo "<script>alert('Student Enrolled Successfully');
        window.location.href='../index.php';</script>";
    }else{
        echo "<script>alert('Failed! Unable to Enroll Student');
        window.location.href='../add-student-to-course.php';</script>";
    }
}