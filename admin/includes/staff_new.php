<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ic = $_POST['ic'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $basic_salary = $_POST['basic_salary'];
    $hire_date = $_POST['hire_date'];
    $status = 1;

    // Find the current maximum staff_ID in the staff table and add 1
    $sql_max_id = "SELECT MAX(staff_ID) AS max_id FROM staff";
    $result = $conn->query($sql_max_id);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    $row = $result->fetch_assoc();
    $newStaffID = $row['max_id'] + 1;

    // Insert into the staff table first to satisfy the foreign key constraint
    $sql_staff = "INSERT INTO staff (staff_ID, staff_department, staff_position, staff_basicsalary, staff_hireddate, staff_status) 
                  VALUES ('$newStaffID', '$department', '$position', '$basic_salary', '$hire_date', '$status')";

    if ($conn->query($sql_staff) === TRUE) {
        // Insert into the person table after the staff record has been created
        $sql_person = "INSERT INTO person (person_IC, staff_ID, person_fname, person_lname, person_age, person_birthdate, person_email, person_phonenum, person_homeaddr) 
                      VALUES ('$ic', '$newStaffID', '$first_name', '$last_name', '$age', '$birthdate', '$email', '$phone_number', '$address')";

        if ($conn->query($sql_person) === TRUE) {
            header("Location: staffs.php");
            exit();
        } else {
            echo "Error inserting into person table: " . $conn->error;
        }
    } else {
        echo "Error inserting into staff table: " . $conn->error;
    }

    $conn->close();
}
?>
