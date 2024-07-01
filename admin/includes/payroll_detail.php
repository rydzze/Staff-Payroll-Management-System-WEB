<?php
include 'db.php';

$payroll_ID = $_GET['payroll_ID'];

if(!isset($payroll_ID)){
    echo "<script>alert('Payroll ID parameter not provided. Redirecting ...'); window.location.href = 'payrolls.php';</script>";
    exit;
}

$detail1 = [];
$detail2 = [];
$detail3 = [];

$sql_query = "SELECT * FROM payroll WHERE payroll_ID = ?";
$stmt = $conn->prepare($sql_query);
$stmt->bind_param("s", $payroll_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $detail1 = [
        'Payroll ID' => $row['payroll_ID'],
        'Staff ID' => $row['staff_ID'],
        'Payroll Date' => $row['payroll_date']
    ];

    $detail2 = [
        'Basic Salary' => "MYR " . number_format($row['payroll_basicsalary'], 2),
        'Allowance Pay' => "MYR " . number_format($row['payroll_allowancepay'], 2),
        'Overtime Pay' => "MYR " . number_format($row['payroll_overtimepay'], 2),
        'Total Salary' => "MYR " . number_format($row['payroll_basicsalary'] + $row['payroll_allowancepay'] + $row['payroll_overtimepay'], 2),
    ];

    $detail3 = [
        'EPF' => "MYR " . number_format($row['payroll_EPF'], 2),
        'SOCSO' => "MYR " . number_format($row['payroll_SOCSO'], 2),
        'Total Deduction' => "MYR " . number_format($row['payroll_EPF'] + $row['payroll_SOCSO'], 2)
    ];

    $netSalary = $row['payroll_basicsalary'] + $row['payroll_allowancepay'] + $row['payroll_overtimepay']
                    - ($row['payroll_EPF'] + $row['payroll_SOCSO']);
    $netSalary = "MYR " . number_format($netSalary, 2);
}

$stmt->close();
$conn->close();
?> 