<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff Details</title>

    <link rel="stylesheet" href="css/staff_list.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h2>Staff Details</h2>

        <?php include 'includes/staff_detail.php'; ?>

        <?php if (!empty($details)) : ?>
            <form id="staffDetailsForm" method="post" action="staff_detail.php?staff_ID=<?php echo $staff_ID; ?>">
                <table>
                    <?php foreach ($details as $key => $value) : ?>
                        <tr>
                            <th><?php echo $key; ?></th>
                            <td>
                                <span class="detailValue"><?php echo $value; ?></span>
                                <input type="text" name="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>" class="detailInput" style="display: none;">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="form-buttons">
                    <button type="button" id="editButton">Edit</button>
                    <button type="submit" id="confirmButton" style="display: none;">Confirm</button>
                    <button type="button" id="cancelButton" style="display: none;">Cancel</button>
                </div>
            </form>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>

        <a href="staffs.php" class="back-link">Back to Staff List</a>
    </section>

    <script src="js/staff_edit.js"></script>
</body>

</html>
