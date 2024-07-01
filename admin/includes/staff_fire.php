<?php
include 'db.php';

$success = true;
$staff_ID = $_GET['staff_ID'];

if(isset($staff_ID)){
    $sql_query = "DELETE FROM usr WHERE staff_ID = $staff_ID";

    if($conn->query($sql_query) !== TRUE){
        $success = false;
        echo "<script>alert('Error deleting user credentials of staff: " . $conn->error . "');</script>";
    }

    $sql_query = "DELETE FROM person WHERE staff_ID = $staff_ID"; 

    if($conn->query($sql_query) !== TRUE){
        $success = false;
        echo "<script>alert('Error deleting personal details of staff: " . $conn->error . "');</script>";
    }

    $sql_query = "UPDATE staff SET 
                  staff_department = NULL,
                  staff_position = NULL,
                  staff_basicsalary = NULL,
                  staff_hireddate = NULL,
                  staff_status = 0
                  WHERE staff_ID = $staff_ID";

    if($conn->query($sql_query) !== TRUE){
        $success = false;
        echo "<script>alert('Error updating staff details: " . $conn->error . "');</script>";
    }

    if($success){
        echo "<script>alert('Record for staff with ID $staff_ID has been removed.'); window.location.href = '../staffs.php';</script>";
    }

    $conn->close();
}
else{
    echo "<script>alert('Error: Staff ID parameter not provided. Redirecting ...');</script>";
}
?>