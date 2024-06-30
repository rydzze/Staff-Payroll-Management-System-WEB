<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff List</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/staff_list.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h1>Staff List</h1>

        <div class="func-buttons">
            <button class="button" id="addButton">Add New Staff</button>
        </div>

        <?php include 'includes/staff_list.php'; ?>
    </section>

    <script>
        document.getElementById('addButton').addEventListener('click', function() {
            window.location.href = 'staff_add.php';
        });
    </script>
</body>

</html>