<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff Details</title>
    <link rel="stylesheet" href="css/staff_list.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        #editButton {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 5px;
        }

        #editButton:hover {
            background-color: #338eca;
        }
    </style>
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>
    <?php include 'includes/staff_detail.php'; ?>
    <section class="content">
        <h2>Staff Details</h2>

        <?php if (!empty($details)) : ?>
            <table>
                <?php foreach ($details as $key => $value) : ?>
                    <tr>
                        <th><?php echo $key; ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="form-buttons">
                <button type="button" id="editButton">Edit</button>
            </div>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>

        <a href="staffs.php" class="back-link">Back to Staff List</a>
    </section>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            window.location.href = 'staff_edit.php?staff_ID=<?php echo $staff_ID; ?>';
        });
    </script>
</body>

</html>
