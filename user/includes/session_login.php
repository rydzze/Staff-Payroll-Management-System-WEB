<?php
session_start();
include 'db.php';

if(isset($_POST["login"])){
    $usr = $_POST["usr_ID"];
    $pwd = $_POST["usr_pwd"];

    $sql = "SELECT u.usr_ID, u.usr_pwd, s.staff_ID, p.person_fname, p.person_lname
            FROM usr u
            INNER JOIN staff s ON u.staff_ID = s.staff_ID
            INNER JOIN person p ON u.staff_ID = p.staff_ID
            WHERE usr_ID = '$usr'
            AND usr_pwd = '$pwd'";
    
    $checkuser = mysqli_query($conn, $sql);
    $row_user = mysqli_fetch_assoc($checkuser);
    $rowcount = mysqli_num_rows($checkuser);

    if($rowcount != 0){
        $_SESSION["usr_ID"] = $row_user["usr_ID"];
        $_SESSION["usr_pwd"] = $row_user["usr_pwd"];
        $_SESSION["staff_ID"] = $row_user["staff_ID"];
        $_SESSION["person_name"] = $row_user["person_fname"]." ".$row_user["person_lname"] ;
        
        echo "<script>
                alert('Login successful.');
                window.location = '../dashboard.php'; 
              </script>";
        mysqli_close($conn);
    }
    else{
        echo "<script>
                alert('Wrong email or password. Please re-enter.');
                window.location = '../login.php';
              </script>";
    }
}
?>