<?php
session_start();

include 'db.php';

$input = $_POST['otpinput'];
$otp = $_SESSION['otp'];

if($input == $otp){
    echo "<script>
            window.location = '../resetpassword.php'; 
          </script>";
}
else{
    echo "<script>
            alert('Invalid OTP. Please try again.');  
            window.location = '../validateOTP.php'; 
          </script>";
}
?>