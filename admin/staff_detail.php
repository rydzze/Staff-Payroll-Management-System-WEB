<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff Details</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/staff_list.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h1>Staff Details</h1>

        <a href="staffs.php" class="back-link">Back to Staff List</a>

        <?php include 'includes/staff_detail.php'; ?>

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
                <button class="button" id="editButton">Edit</button>
                <button class="button" id="fireButton">Fire</button>
            </div>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>
    </section>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            window.location.href = 'staff_edit.php?staff_ID=<?php echo $staff_ID; ?>';
        });
        document.getElementById('fireButton').addEventListener('click', function() {
            if (confirm('Are you sure you want to fire this staff member?')) {
                window.location.href = 'includes/staff_fire.php?staff_ID=<?php echo $staff_ID; ?>';
            }
        });
    </script>
</body>

</html>
