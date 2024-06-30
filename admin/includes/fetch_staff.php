<?php
include 'db.php';

$sql = "SELECT p.staff_ID, p.person_fname, p.person_lname
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE s.staff_status = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["staff_ID"] . "'>" . $row["staff_ID"] . " - " . $row["person_fname"] . " " . $row["person_lname"] . "</option>";
    }
} else {
    echo "<option value=''>No staff available</option>";
}

$result->close();
$conn->close();
?>
