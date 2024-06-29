<?php
include 'db.php';

$staff_ID = $_GET['staff_ID'];

$sql = "SELECT p.person_IC, p.person_fname, p.person_lname, p.person_age, p.person_birthdate, p.person_email, p.person_phonenum, p.person_homeaddr, s.staff_department, s.staff_position, s.staff_hireddate
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE p.staff_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $staff_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
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
        'Hire Date' => $row['staff_hireddate']
    ];
} else {
    $details = [];
}

$conn->close();
?>