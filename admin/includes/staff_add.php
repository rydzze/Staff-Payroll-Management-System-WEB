<?php
include 'db.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
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
    $hire_date = date('Y-m-d');
    $status = 1;

    $sql_query = "SELECT * FROM person WHERE person_IC = '$ic'";
    $result = $conn->query($sql_query);

    if($result->num_rows > 0){
        echo "<script>alert('Error: IC already exists in the system'); history.back();</script>";
        exit();
    }    

    $sql_query = "INSERT INTO staff (staff_department, staff_position, staff_basicsalary, staff_hireddate, staff_status) 
                  VALUES ('$department', '$position', '$basic_salary', '$hire_date', '$status')";

    if($conn->query($sql_query) === TRUE){
        $staff_ID = $conn->insert_id;

        $sql_query = "INSERT INTO person (person_IC, staff_ID, person_fname, person_lname, person_age, person_birthdate, person_email, person_phonenum, person_homeaddr) 
                      VALUES ('$ic', '$staff_ID', '$first_name', '$last_name', '$age', '$birthdate', '$email', '$phone_number', '$address')";

        if($conn->query($sql_query) === TRUE){
            $usr_ID = 'U' . str_pad($staff_ID, 3, '0', STR_PAD_LEFT);

            $rand_digits = rand(100, 999);
            $usr_pwd = $staff_ID . 'pwd' . $rand_digits;

            $sql_query = "INSERT INTO usr (usr_ID, staff_ID, usr_pwd) 
                          VALUES ('$usr_ID', '$staff_ID', '$usr_pwd')";

            if($conn->query($sql_query) === TRUE){
                echo "<script>alert('Successfully added new staff!\\nusr_ID: $usr_ID\\nstaff_ID: $staff_ID\\nusr_pwd: $usr_pwd'); window.location.href='staff_detail.php?staff_ID=$staff_ID';</script>";
                exit();
            }
            else{
                echo "<script>alert('Error inserting into usr table: " . $conn->error . "');</script>";
            }
        }
        else{
            echo "<script>alert('Error inserting into person table: " . $conn->error . "');</script>";
        }
    }
    else{
        echo "<script>alert('Error inserting into staff table: " . $conn->error . "');</script>";
    }

    $conn->close();
}
?>
