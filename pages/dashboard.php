<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

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

    <section>
        <?php
        include '../includes/functions.php';
        $adminIDs = selectAdminIDs();

        if (!empty($adminIDs)) {
            echo "<h1>Admin IDs</h1>";
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
    </section>
</main>

<?php include_once '../templates/footer.php'; ?>
