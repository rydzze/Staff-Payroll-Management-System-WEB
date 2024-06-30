<?php
session_start();

if (!isset($_SESSION['usr_ID']) || empty($_SESSION['usr_ID'])) {
    header("Location: login.php");
    exit();
}
?>