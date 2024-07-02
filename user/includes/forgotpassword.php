<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$_POST['email'] = "___@gmail.com";

if (isset($_POST['email'])) {

    $email = $_POST['email']; 
    $token = bin2hex(random_bytes(16));
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '___@gmail.com';
        $mail->Password = 'REDACTED';
        $mail->Port = 587;

        $mail->setFrom('admin@gmail.com', 'SPMS Admin');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body = 'Click the link below to reset your password:<br><a href="http://localhost/twt/user/resetpassword.php?token=' . $token . '">Reset Password</a>';

        $mail->send();
        echo 'An email has been sent with instructions to reset your password.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>