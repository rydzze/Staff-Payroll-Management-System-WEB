<?php $name = $_SESSION['person_name']?>

<div class="header">
    <div class="heading">
        <h1>Staff Payroll Management System</h1>
    </div>

    <div class="profiledropdown">
        <img src="img/user.jpg" class="profile" alt="profilepicture">

        <span style="margin: auto;"><?php echo $name?></span>
        <img src="img/dropdown.png" class="dropdown" alt="dropdown">
        
        <div class="dropdown-content">
            <a href="viewuser.php">View Profile</a>
            <a href="includes/session_end.php">Log Out</a>
        </div>
    </div>
</div>