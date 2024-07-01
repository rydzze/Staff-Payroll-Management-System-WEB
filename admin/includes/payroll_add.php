<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $staff_ID = $_POST['staff_ID'];
    $payroll_date = $_POST['payroll_date'];
    $payroll_basicsalary = $_POST['payroll_basicsalary'];
    $payroll_allowancepay = $_POST['payroll_allowancepay'];
    $payroll_overtimepay = $_POST['payroll_overtimepay'];
    $payroll_epf = $_POST['payroll_epf'];
    $payroll_socso = $_POST['payroll_socso'];

    $sql_query = "SELECT * FROM payroll WHERE staff_ID = '$staff_ID' AND YEAR(payroll_date) = YEAR('$payroll_date') AND MONTH(payroll_date) = MONTH('$payroll_date')";
    $result = $conn->query($sql_query);

    if($result->num_rows > 0){
        echo "<script>alert('Payroll record already exists for this staff for that month!'); window.location.href='../payroll_add.php'</script>";
    }
    else{
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
    }

    $conn->close();
}
?>
