<?php
include 'db.php';

$staff_ID = $_GET['staff_ID'];

if (!isset($staff_ID)) {
    echo "<script>alert('Staff ID not provided.'); window.location.href = 'staffs.php';</script>";
    exit;
}

$sql = "SELECT p.person_IC, p.person_fname, p.person_lname, p.person_age, p.person_birthdate, p.person_email, p.person_phonenum, p.person_homeaddr, s.staff_department, s.staff_position, s.staff_basicsalary, s.staff_hireddate, s.staff_status
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE p.staff_ID = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param("i", $staff_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if ($row['staff_status'] == 0) {
        echo "<script>alert('Staff with ID $staff_ID does not exist in records.'); window.location.href = 'staffs.php';</script>";
        exit;
    }

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
    ];
} else {
    echo "<script>alert('No details found for staff with ID $staff_ID.'); window.location.href = 'staffs.php';</script>";
    exit;
}

$conn->close();
?>
