<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header("Location: login_page.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff List</title>

    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include '../templates/sidebar.html';?>

    <div class="content">
        <?php include '../templates/header.html';?>
        
        <h2>Staff List</h2>

        <?php include '../templates/footer.html';?>
    </div>
</body>

</html>