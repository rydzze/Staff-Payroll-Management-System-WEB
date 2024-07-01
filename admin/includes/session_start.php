<?php
session_start();

if (!isset($_SESSION['admin_ID'])) {
    header("Location: login.php");
    exit();
}
?>