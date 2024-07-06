<?php include 'includes/session_start.php';
include 'includes/viewuser.php';

$name = $_SESSION['person_name'];
$ID = $_SESSION['staff_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Profile</title>

    <link rel="icon" href="img/spms.png" type="image/png">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/viewuser.css">
</head>

<body>
  <?php include 'templates/header.php';?>
  <?php include 'templates/sidebar.php';?>

  <section class="content"> 
    <div class="pfp">
      <img src="img/profile.png">
      <h3><?php echo $name?></h3>
      <h3>Staff ID: <?php echo $ID?></h3>

      <div id="addr">
        <h2>Residential Address</h2>
        <h3><?php echo $residential?></h3>
      </div>
    </div>

    <div class="cards">
      <div class="card">
        <h2>Contact Details</h2>
        <h3><?php echo $contact?></h3>
      </div>

      <div class="card">
        <h2>Department</h2>
        <h3><?php echo $department?></h3>
      </div>

      <div class="card">
        <h2>Position</h2>
        <h3><?php echo $position?></h3>
      </div>
    </div>

    <div class="cards">
      <div class="card">
        <h2>Email</h2>
        <h3><?php echo $email?></h3>
      </div>

      <div class="card">
        <h2>Salary</h2>
        <h3><?php echo "RM ". $salary?></h3>
      </div>

      <div class="card">
        <h2>Date of Hire</h2>
        <h3><?php echo $hireddate?></h3>
      </div>
    </div>
  </section>
</body>

</html>