<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testing</title>
</head>

<body>
    <h2>Testing SQL Query using PHP here ...</h2>

    <?php
        include '../includes/functions.php';
        $staffIDs = selectAllStaff();

        if (!empty($staffIDs)) {
            echo "<br><h2>Staff IDs</h2>";
            echo "<ul>";
            foreach ($staffIDs as $staffID) {
                echo "<li>Staff ID: " . $staffID . "</li>";
            }
            echo "</ul>";
        }
        else {
            echo "<p>No staff IDs found.</p>";
        }
    ?>
</body>

</html>