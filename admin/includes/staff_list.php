<?php
include 'db.php';

// Fetch staff data
$sql = "SELECT p.staff_ID, p.person_fname, p.person_lname, s.staff_department, s.staff_position
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>Staff ID</th><th>First Name</th><th>Last Name</th><th>Department</th><th>Position</th></tr>";
    $number = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$number}</td>
                <td><a href='staff_detail.php?staff_ID={$row['staff_ID']}'>{$row['staff_ID']}</a></td>
                <td>{$row['person_fname']}</td>
                <td>{$row['person_lname']}</td>
                <td>{$row['staff_department']}</td>
                <td>{$row['staff_position']}</td>
              </tr>";
        $number++;
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
