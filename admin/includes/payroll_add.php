<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $staff_ID = $_POST['staff_ID'];
    $payroll_date = date('Y-m-d');
    $payroll_basicsalary = $_POST['payroll_basicsalary'];
    $payroll_allowancepay = $_POST['payroll_allowancepay'];
    $payroll_overtimepay = $_POST['payroll_overtimepay'];
    $payroll_epf = $_POST['payroll_epf'];
    $payroll_socso = $_POST['payroll_socso'];

    $sql_query = "INSERT INTO payroll (staff_ID, payroll_date, payroll_basicsalary, payroll_allowancepay, payroll_overtimepay, payroll_EPF, payroll_SOCSO)
                  VALUES ('$staff_ID', '$payroll_date', '$payroll_basicsalary', '$payroll_allowancepay', '$payroll_overtimepay', '$payroll_epf', '$payroll_socso')";

    if($conn->query($sql_query) === TRUE){
        $payroll_ID = $conn->insert_id;

        echo "<script>alert('Payroll transaction completed!'); window.location.href='../payroll_detail.php?payroll_ID=$payroll_ID';</script>";
        exit();
    }
    else{
        echo "<script>alert('Error inserting into payroll table: " . $conn->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
