<?php include 'includes/session_start.php'; ?>

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
            <form id="filterForm" method="GET" action="staffs.php">
                <select name="department" id="department" onchange="document.getElementById('filterForm').submit();">
                    <option value="">All Departments</option>
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                    <option value="Sales">Sales</option>
                    <option value="Support">Support</option>
                    <option value="Legal">Legal</option>
                    <option value="Operations">Operations</option>
                </select>
            </form>
            
            <button class="button" id="addButton">Add New Staff</button>
        </div>

        <?php include 'includes/staff_list.php'; ?>
    </section>

    <script src="js/staff_list.js"></script>
</body>

</html>
