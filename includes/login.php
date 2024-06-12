<?php
session_start();

include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required";
        header("Location: ../pages/login_page.php");
        exit();
    } else {
        if (validateAdminLogin($username, $password)) {
            $_SESSION['admin'] = $username;
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid username or password";
            header("Location: ../pages/login_page.php");
            exit();
        }
    }
}
?>
