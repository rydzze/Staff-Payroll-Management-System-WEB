<?php
include 'db.php';

$staff_ID = $_SESSION['staff_ID'];

if(!isset($staff_ID)){
    echo "<script>alert('Staff ID not provided.'); window.location.href = 'staffs.php';</script>";
    exit;
}

$sql = "SELECT  p.person_phonenum, p.person_homeaddr, p.person_email, s.staff_department, s.staff_position, s.staff_basicsalary, s.staff_hireddate, s.staff_status
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE p.staff_ID = '$staff_ID'"; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$residential =  $row["person_homeaddr"];
$contact = $row["person_phonenum"];
$department = $row["staff_department"];
$position = $row["staff_position"];
$email = $row["person_email"];
$salary = $row["staff_basicsalary"];
$hireddate = $row["staff_hireddate"];
?>
    