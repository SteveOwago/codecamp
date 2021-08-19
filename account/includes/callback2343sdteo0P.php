<?php
include ('functions.php');
//global $conn;
$stkCallbackResponse = file_get_contents('php://input');
//$logFile = "stkPushCallbackResponse.txt";
//$log = fopen($logFile, "a");
//fwrite($log, $stkCallbackResponse);
//fclose($log);
////change the Database settings
//$conn = mysqli_connect('localhost', 'root', '', 'codecamp');

$data = json_decode($stkCallbackResponse);

$result_desc = $data->Body->stkCallback->ResultDesc;
$result_code = $data->Body->stkCallback->ResultCode;
$merchant_request_id = $data->Body->stkCallback->MerchantRequestID;
$checkout_request_id = $data->Body->stkCallback->CheckoutRequestID;
$amount = $data->Body->stkCallback->CallbackMetadata->Item[0]->Value;
$mpesa_receipt_number = $data->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$transaction_date = $data->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$phone_number = $data->Body->stkCallback->CallbackMetadata->Item[4]->Value;

$sqlinsert ="INSERT INTO mpesa_payments(result_desc,result_code,merchant_request_id
     ,checkout_request_id,amount,mpesa_receipt_number,transaction_date,phone_number)
     VALUES('$result_desc','$result_code','$merchant_request_id','$checkout_request_id',
     '$amount','$mpesa_receipt_number','$transaction_date','$phone_number')";

$query = mysqli_query($conn,$sqlinsert);
if($query){
    updatePayment();
}else{
    echo "<script>alert('Payment Not Saved! Please Contact Us on 0700063323');
                   window.location.href='../index.php';</script>";
}
function updatePayment(){
    global $conn;
    $email = $_SESSION['email'];
    $course_id = $_SESSION['course_id'];
    $amount = $_SESSION['amount'];
    $sql = "INSERT INTO course_payments(`course_id`,`email`,`amount`) VALUES('$course_id','$email','$amount')";
    $query = mysqli_query($conn,$sql);
    if ($query){
        header('Location:../index.php?payment');
    }
}