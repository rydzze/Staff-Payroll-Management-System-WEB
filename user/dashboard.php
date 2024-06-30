<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Dashboard</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>    
    <?php include 'templates/header.php';?>
    <?php include 'templates/sidebar.php';?>

    <section class="bulletin"> 
        <div class="bulletin-board">
            <h2>Bulletin Board</h2>
            
            <p>Announcement goes here...</p>
        </div><br>
    </section>

    <section class="announce">
        <div class="announcement">
            <h3>Announcement</h3>
            <p>Bla bla bla</p>
        </div>
    </section>
</body>

</html>
