<?php include 'includes/session_start.php';
include 'includes/viewuser.php';
 $name = $_SESSION['person_name'];
 $staff_ID = $_SESSION['staff_ID'];
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | View User</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/viewuser.css">
</head>

<body>
    <?php include 'templates/header.php';?>
    <?php include 'templates/sidebar.php';?>

    <section class="content"> 
      <div class="profile">
          <img src="img/profile.png"> 
          <h1><?php echo $name?></h1>
          <p>Staff ID: <?php echo $staff_ID?></p>
      </div>
    </section>

    <section class="info">
      <div class="card0">
        <div class="card-title"><br>Residential Address</div>
        <div class="card-content">
          <h3><?php echo $residential?></h3>
        </div>
        </div>
      </div>

    <table>
        <tr>
            <td>
                <div class="card1">
                  <div class="card-title"><br>Contact Details</div>
                  <div class="card-content">
                    <h3><?php echo $contact?></h3>
                  </div>
                  </div>
                </div>
            </td>
            <td>
                <div class="card2">
                  <div class="card-title"><br>Department</div>
                  <div class="card-content">
                    <h3><?php echo $department?></h3>
                  </div>
                  </div>
                </div>
            </td>
            <td>
                <div class="card3">
                  <div class="card-title"><br>Position</div>
                  <div class="card-content">
                    <h3><?php echo $position?></h3>
                  </div>
                  </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="card1">
                  <div class="card-title"><br>Email</div>
                  <div class="card-content">
                    <h3><?php echo $email?></h3>
                  </div>
                </div>
            </td>
            <td>
                <div class="card2">
                  <div class="card-title"><br>Salary</div>
                  <div class="card-content">
                    <h3><?php echo "RM ". $salary?></h3>
                  </div>
                  </div>
                </div>
            </td>
            <td>
                <div class="card3">
                  <div class="card-title"><br>Date of Hire</div>
                  <div class="card-content">
                    <h3><?php echo $hireddate?></h3>
                  </div>
                  </div>
                </div>
            </td>
        </tr>
    </table>
    </section>
</body>

</html>