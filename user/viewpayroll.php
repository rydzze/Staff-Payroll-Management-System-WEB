<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | View Payroll</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/viewpayroll.css">
</head>

<body>
    <?php include 'templates/header.php';?>
    <?php include 'templates/sidebar.php';?>

    <section class="content"> 
        <h1>View Payroll</h1>

        <div class="payrolllist">
            <h2>Payroll Records</h2>
            
            <?php include 'includes/payroll_list.php';?>
        </div>
        
        <div id="padding"></div>
    </section>
</body>

</html>