<?php
session_start();

include 'db.php';

$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$usr_ID = $_SESSION['usr_ID'];

if(isset($new_password) && isset($usr_ID)){
    $sql = "UPDATE usr
            SET usr_pwd = '$new_password'
            WHERE usr_ID = '$usr_ID'";
            
    if($conn->query($sql) === TRUE){
        echo "<script>
            alert('Reset password successfully. Redirecting to login page ...');  
            window.location = '../login.php'; 
        </script>";    
    }
    else{
        echo "<script>alert('Error resetting password ... " . $conn->error . "');</script>";
    }

    session_unset();
    session_destroy();
}
?>