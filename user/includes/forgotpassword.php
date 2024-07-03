<?php
session_start();

include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$usr_ID = $_POST['usr_ID'];

$sql ="SELECT p.person_email, p.person_fname, p.person_lname
       FROM person p
       INNER JOIN usr u ON p.staff_ID = u.staff_ID
       WHERE usr_ID ='$usr_ID'";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$email = $data['person_email'];
$name = $data["person_fname"]." ".$data["person_lname"];

$conn->close();

if (isset($email)) {
    $otp = random_int(100000, 999999);
    $mail = new PHPMailer(true);
    
    $_SESSION['otp'] = $otp;
    $_SESSION['usr_ID'] = $usr_ID;

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'REDACTED@gmail.com';
        $mail->Password = 'REDACTED';
        $mail->Port = 587;

        $mail->setFrom('admin@gmail.com', 'SPMS Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body = 'Dear '.$name.'<br><br>To complete <b>SPMS reset password process</b>, please use <b>6</b> digits OTP code provided as below.<br><br><b>'.$otp.'</b>';

        $mail->send();
        echo "<script>
                window.location = '../validateOTP.php'; 
                alert('An email has been sent with instructions to reset your password.');
              </script>";
    } catch (Exception $e) {
        echo "<script>
                  window.location = '../forgotpassword.php'; 
                alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}. Please contact the admins.');
              </script>";
    }  
}
else{
  echo "<script>
          alert('User ID does not exist in system. Redirecting ...');
          window.location = '../forgotpassword.php'; 
        </script>";
}
?>