<?php
include 'db.php';

$staff_ID = $_GET['staff_ID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the posted data
    $person_IC = $_POST['ic'];
    $person_fname = $_POST['first_name'];
    $person_lname = $_POST['last_name'];
    $person_age = $_POST['age'];
    $person_birthdate = $_POST['birthdate'];
    $person_email = $_POST['email'];
    $person_phonenum = $_POST['phone_number'];
    $person_homeaddr = $_POST['address'];
    $staff_department = $_POST['department'];
    $staff_position = $_POST['position'];
    $staff_basicsalary = $_POST['basic_salary'];
    $staff_status = $_POST['status'];  
    $staff_hireddate = $_POST['hire_date'];  

    // Prepare and execute the update query for the person table
    $update_person_sql = "UPDATE person 
                          SET person_IC=?, person_fname=?, person_lname=?, person_age=?, person_birthdate=?, person_email=?, person_phonenum=?, person_homeaddr=? 
                          WHERE staff_ID=?";
    $stmt = $conn->prepare($update_person_sql);
    $stmt->bind_param("sssssssss", $person_IC, $person_fname, $person_lname, $person_age, $person_birthdate, $person_email, $person_phonenum, $person_homeaddr, $staff_ID);
    $stmt->execute();

    // Prepare and execute the update query for the staff table
    $update_staff_sql = "UPDATE staff 
                         SET staff_department=?, staff_position=?, staff_basicsalary=? 
                         WHERE staff_ID=?";
    $stmt = $conn->prepare($update_staff_sql);
    $stmt->bind_param("ssss", $staff_department, $staff_position, $staff_basicsalary, $staff_ID);
    $stmt->execute();

    // Redirect to the staff detail page
    header("Location: staff_detail.php?staff_ID=$staff_ID");
    exit();
}

// Fetch the current staff details
$sql = "SELECT p.person_IC, p.person_fname, p.person_lname, p.person_age, p.person_birthdate, p.person_email, p.person_phonenum, p.person_homeaddr, s.staff_department, s.staff_position, s.staff_basicsalary, s.staff_hireddate, s.staff_status
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE p.staff_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $staff_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Prepare the details array for display and editing
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
        'Basic Salary' => $row['staff_basicsalary'],
        'Hire Date' => $row['staff_hireddate'],
        'Status' => $row['staff_status'] ? 'Active' : 'Inactive'
    ];
} else {
    $details = [];
}

$conn->close();
?>
