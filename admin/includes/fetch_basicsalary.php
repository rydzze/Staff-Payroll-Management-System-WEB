<?php
include 'db.php';

if(isset($_GET['staff_ID'])){
    $staff_ID = $_GET['staff_ID'];

    $sql_query = "SELECT staff_basicsalary FROM staff WHERE staff_ID = ?";
    $stmt = $conn->prepare($sql_query);
    $stmt->bind_param("i", $staff_ID);
    $stmt->execute();
    $stmt->bind_result($basicSalary);

    if($stmt->fetch()){
        echo $basicSalary;
    }
    else{
        echo "0";
    }

    $stmt->close();
}
else{
    echo "0";
}

$conn->close();
?>
