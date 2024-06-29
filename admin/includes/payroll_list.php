<?php
include 'db.php';

// Fetch payroll data including payroll_date, ordered by payroll_ID ASC
$sql = "SELECT payroll_ID, staff_ID, payroll_date
        FROM payroll
        ORDER BY payroll_ID ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>Payroll ID</th><th>Staff ID</th><th>Payroll Date</th></tr>";
    $number = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$number}</td>
                <td><a href='payroll_detail.php?payroll_ID={$row['payroll_ID']}'>{$row['payroll_ID']}</a></td>
                <td><a href='staff_detail.php?staff_ID={$row['staff_ID']}'>{$row['staff_ID']}</a></td>
                <td>{$row['payroll_date']}</td>
              </tr>";
        $number++;
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
