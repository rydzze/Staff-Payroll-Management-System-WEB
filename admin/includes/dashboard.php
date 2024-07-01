<?php
include 'db.php';

$sql_query = "SELECT COUNT(*) as total_active FROM staff WHERE staff_status='1'";
$result = $conn->query($sql_query);
$total_staff = $result->fetch_assoc()['total_active'];

$current_month = date('Y-m');
$sql_query = "SELECT COUNT(*) as total_payrolls 
              FROM payroll p 
              INNER JOIN staff s ON p.staff_ID = s.staff_ID 
              WHERE p.payroll_date LIKE '$current_month%' AND s.staff_status='1'";
$result = $conn->query($sql_query);
$total_complete_payroll = $result->fetch_assoc()['total_payrolls'];

$total_pending_payroll = $total_staff - $total_complete_payroll;

$sql_query = "SELECT staff_department, COUNT(*) as num_staff FROM staff WHERE staff_status = 1 GROUP BY staff_department";
$staff_by_dept = $conn->query($sql_query);

$sql_query = "SELECT payroll_ID, staff_ID, payroll_date FROM payroll ORDER BY payroll_ID DESC LIMIT 5";
$recent_payroll = $conn->query($sql_query);
?>