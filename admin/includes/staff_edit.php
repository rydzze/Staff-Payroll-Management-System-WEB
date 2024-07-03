<?php
include 'db.php';

$staff_ID = $_GET['staff_ID'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
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

    $sql_query = "UPDATE person 
                  SET person_IC=?, person_fname=?, person_lname=?, person_age=?, person_birthdate=?, person_email=?, person_phonenum=?, person_homeaddr=? 
                  WHERE staff_ID=?";
    $stmt = $conn->prepare($sql_query);

    if($stmt === false){
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssissssi", $person_IC, $person_fname, $person_lname, $person_age, $person_birthdate, $person_email, $person_phonenum, $person_homeaddr, $staff_ID);
    if(!$stmt->execute()){
        die("Error executing statement: " . $stmt->error);
    }

    $sql_query = "UPDATE staff 
                  SET staff_department=?, staff_position=?, staff_basicsalary=? 
                  WHERE staff_ID=?";
    $stmt = $conn->prepare($sql_query);
    
    if($stmt === false){
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("ssdi", $staff_department, $staff_position, $staff_basicsalary, $staff_ID);
    if(!$stmt->execute()){
        die("Error executing statement: " . $stmt->error);
    }

    echo "<script>alert('Successfully edited staff detail!'); window.location.href='../staff_detail.php?staff_ID=$staff_ID';</script>";
    exit();
}
?>