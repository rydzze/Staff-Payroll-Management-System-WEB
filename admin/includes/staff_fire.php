<?php
include 'db.php';

$success = true;

if (isset($_GET['staff_ID'])) {
    $staff_ID = $_GET['staff_ID'];

    $sql_delete_usr = "DELETE FROM usr WHERE staff_ID = $staff_ID";

    if ($conn->query($sql_delete_usr) !== TRUE) {
        $success = false;
        echo "<script>alert('Error deleting user credentials: " . $conn->error . "');</script>";
    }

    $sql_delete_person = "DELETE FROM person WHERE staff_ID = $staff_ID"; 

    if ($conn->query($sql_delete_person) !== TRUE) {
        $success = false;
        echo "<script>alert('Error deleting personal details: " . $conn->error . "');</script>";
    }

    $sql_update_staff = "UPDATE staff SET 
                           staff_department = NULL,
                           staff_position = NULL,
                           staff_basicsalary = NULL,
                           staff_hireddate = NULL,
                           staff_status = 0
                         WHERE staff_ID = $staff_ID";

    if ($conn->query($sql_update_staff) !== TRUE) {
        $success = false;
        echo "<script>alert('Error updating employment details: " . $conn->error . "');</script>";
    }

    if ($success) {
        echo "<script>alert('Record for staff with ID $staff_ID has been completely wiped.'); window.location.href = '../staffs.php';</script>";
    }

    $conn->close();
} else {
    echo "<script>alert('Error: Staff ID not provided.');</script>";
}
?>