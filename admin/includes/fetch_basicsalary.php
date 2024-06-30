<?php
include 'db.php';

if (isset($_GET['staff_ID'])) {
    $staff_ID = $_GET['staff_ID'];

    // Prepare SQL statement
    $sql = "SELECT staff_basicsalary FROM staff WHERE staff_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staff_ID);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($basicSalary);

    // Fetch value
    if ($stmt->fetch()) {
        // Output basic salary
        echo $basicSalary;
    } else {
        // If no results found or error handling
        echo "0"; // Output a default value or handle error as needed
    }

    // Close statement
    $stmt->close();
} else {
    echo "0"; // Handle case where staff_ID is not set
}

// Close connection
$conn->close();
?>
