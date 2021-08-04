<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'codecamp');

function escape($val){
    global $conn;
    return mysqli_real_escape_string($conn, trim($val));
}

if(isset($_POST['register-course'])){
    registerCourse();
}

function registerCourse(){
    global $conn;
    $fname = escape($_POST['fname']);
    $lname = escape($_POST['lname']);
    $email = escape($_POST['email']);
    $course = escape($_POST['course']);
    $age = escape($_POST['age']);
    $phone = escape($_POST['phone']);

    $sql = "INSERT INTO registration(fname,lname,email,course,age,phone) 
    VALUES('$fname','$lname','$email','$course','$age','$phone')";
    $result = mysqli_query($conn, $sql);
    
    if($result==true){
        $_SESSION['message'] = "Registration Successfull";
        header('Location:../courses.php?message');
    }else{
        $_SESSION['error'] = "Registration Failed. Please Try Again Later";
        header('Location:enroll.php?message');
    }
    
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