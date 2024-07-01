<?php
include 'db.php';

// Total active staff
$active_staff_query = "SELECT COUNT(*) as total_active FROM staff WHERE staff_status='1'";
$active_staff_result = $conn->query($active_staff_query);
$active_staff_count = $active_staff_result->fetch_assoc()['total_active'];

// Total payrolls made this month
$current_month = date('Y-m');
$payroll_made_query = "SELECT COUNT(*) as total_payrolls FROM payroll WHERE payroll_date LIKE '$current_month%'";
$payroll_made_result = $conn->query($payroll_made_query);
$payroll_made_count = $payroll_made_result->fetch_assoc()['total_payrolls'];

// Pending payrolls
$pending_payrolls = $active_staff_count - $payroll_made_count;

// Staff count by department
$staff_by_dept_query = "SELECT staff_department, COUNT(*) as num_staff FROM staff GROUP BY staff_department";
$staff_by_dept_result = $conn->query($staff_by_dept_query);

// Recent 5 payroll records
$recent_payrolls_query = "SELECT payroll_ID, staff_ID, payroll_date FROM payroll ORDER BY payroll_date DESC LIMIT 5";
$recent_payrolls_result = $conn->query($recent_payrolls_query);
?>