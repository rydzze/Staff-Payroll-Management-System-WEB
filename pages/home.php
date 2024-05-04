<?php
$userName = "John Doe"; 
$userRole = "Administrator";
?>

<?php include_once '../templates/header.php'; ?>

<main>
    <section class="welcome">
        <h1>Welcome back, <?php echo $userName; ?>!</h1>
        <p>You are logged in as <?php echo $userRole; ?>.</p>
    </section>

    <section class="dashboard">
        <h2>Dashboard</h2>
    </section>
</main>

<?php include_once '../templates/footer.php'; ?>
