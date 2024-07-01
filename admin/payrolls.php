<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Payroll List</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/payroll_list.css">
</head>

<body>
    <?php include 'templates/sidebar.php';?>

    <section class="content">
        <h1>Payroll List</h1>

        <div class="func-buttons">
            
            <button class="button" id="addButton">Add Payroll</button>
        </div>

        <?php include 'includes/payroll_list.php';?>
    </section>

    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            window.location.href = 'payroll_add.php';
        });
    </script>
</body>

</html>