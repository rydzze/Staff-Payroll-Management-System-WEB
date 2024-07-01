<?php
session_start();
include 'db.php';

if(isset($_POST["login"])){
    $admin_ID = $_POST["admin_ID"];
    $admin_pwd = $_POST["admin_pwd"];

    $sql_query = "SELECT admin_ID, admin_pwd, admin_name
                  FROM admin
                  WHERE admin_ID = '$admin_ID'
                  AND admin_pwd = '$admin_pwd'";
    
    $checkadmin = mysqli_query($conn, $sql_query);
    $row_admin = mysqli_fetch_assoc($checkadmin);
    $row_count = mysqli_num_rows($checkadmin);

    if($row_count != 0){
        $_SESSION["admin_ID"] = $row_admin["admin_ID"];
        $_SESSION["admin_pwd"] = $row_admin["admin_pwd"];
        $_SESSION["admin_name"] = $row_admin["admin_name"];
        
        echo "<script>
                alert('Login successful!');
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