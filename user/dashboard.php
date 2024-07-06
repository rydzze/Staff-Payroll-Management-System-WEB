<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Dashboard</title>

    <link rel="icon" href="img/spms.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<?php include 'templates/header.php';?>
<?php include 'templates/sidebar.php';?>

<body>    
  <section class="bulletin"> 
    <div class="bulletin-board">
      
      <div class="slides">
        <h2>Bulletin Board</h2>
        </div>

        <div class="slides">
          <img src="img/slideshow1.jpeg">
        </div>

        <div class="slides">
          <img src="img/slideshow2.jpeg">
        </div>

        <div class="slides">
          <img src="img/slideshow3.jpeg">
        </div>
      </div>
      <br>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
  </section>

  <section class="announce">
    <h1>Announcement</h1>
      <div class="announcement">
          <h3>Introducing Our New Staff Payroll Management System!</h3>
          <p>We are excited to announce the launch of our new Staff Payroll Management System, 
            designed to improve the accuracy, efficiency, and security of our payroll processes.</p>
      </div>
  </section>
    
  <script src="js/slideshow.js"></script>
</body>

</html>
