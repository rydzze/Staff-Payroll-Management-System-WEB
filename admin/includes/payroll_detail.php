<?php
include 'db.php';

$detail1 = [];
$detail2 = [];
$detail3 = [];

if (isset($_GET['payroll_ID'])) {
    $payroll_ID = $_GET['payroll_ID'];

    $sql = "SELECT * FROM payroll WHERE payroll_ID = ?";
    $stmt = $conn->prepare($sql);
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
}

$stmt->close();
$conn->close();
?> 