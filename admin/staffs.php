<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff List</title>

    <link rel="stylesheet" href="css/staff_list.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        #newButton {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            margin-bottom: 10px;
        }

        #newButton:hover {
            background-color: #338eca;
        }
    </style>
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <div class="form-buttons">
            <button type="button" id="newButton">Add New Staff</button>
        </div>
        <h2>Staff List</h2>
        <?php include 'includes/staff_list.php'; ?>
    </section>
    <script>
        document.getElementById('newButton').addEventListener('click', function() {
            window.location.href = 'staff_new.php';
        });
    </script>
</body>

</html>