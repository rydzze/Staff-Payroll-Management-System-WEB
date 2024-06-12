<!DOCTYPE html>
<html lang="en">

<head>
    <title>Testing</title>
</head>

<body>
    <h2>Testing SQL Query using PHP here ...</h2>

    <?php
        include '../includes/functions.php';
        $adminIDs = selectAdminIDs();

        if (!empty($adminIDs)) {
            echo "<br><h2>Admin IDs</h2>";
            echo "<ul>";
            foreach ($adminIDs as $adminID) {
                echo "<li>Admin ID: " . $adminID . "</li>";
            }
            echo "</ul>";
        }
        else {
            echo "<p>No admin IDs found.</p>";
        }
    ?>
</body>

</html>