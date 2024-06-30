<?php
include 'db.php';

$staff_ID = $_GET['staff_ID'];

// Debug: Check if $staff_ID is set
if (isset($staff_ID)) {
    echo "Staff ID: " . $staff_ID . "<br>";
} else {
    echo "Staff ID not set";
    exit;
}

// Fetch the current staff details
$sql = "SELECT p.person_IC, p.person_fname, p.person_lname, p.person_age, p.person_birthdate, p.person_email, p.person_phonenum, p.person_homeaddr, s.staff_department, s.staff_position, s.staff_basicsalary, s.staff_hireddate, s.staff_status
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE p.staff_ID = ?";
$stmt = $conn->prepare($sql);

// Debug: Check if SQL statement is prepared
if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

// Bind parameters and execute
$stmt->bind_param("i", $staff_ID);
$stmt->execute();
$result = $stmt->get_result();

// Debug: Check if result has rows
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Prepare the details array for display
    $details = [
        'Staff ID' => $staff_ID,
        'IC' => $row['person_IC'],
        'First Name' => $row['person_fname'],
        'Last Name' => $row['person_lname'],
        'Age' => $row['person_age'],
        'Birthdate' => $row['person_birthdate'],
        'Email' => $row['person_email'],
        'Phone Number' => $row['person_phonenum'],
        'Address' => $row['person_homeaddr'],
        'Department' => $row['staff_department'],
        'Position' => $row['staff_position'],
        'Basic Salary' => number_format($row['staff_basicsalary'], 2),
        'Hire Date' => $row['staff_hireddate'],
        'Status' => $row['staff_status'] ? 'Active' : 'Inactive'
    ];
} else {
    $details = [];
    echo "No details found for this staff member.";
}

$conn->close();
?>
