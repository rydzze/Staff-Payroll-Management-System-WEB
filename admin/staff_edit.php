<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Details</title>
    <link rel="stylesheet" href="css/staff_edit.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>
    <?php include 'includes/staff_edit.php'; ?>
    <section class="content">
        <h2>Edit Staff Details</h2>

        <?php if (!empty($details)) : ?>
            <form id="staffEditForm" method="post" action="staff_edit.php?staff_ID=<?php echo $staff_ID; ?>">
                <table>
                    <?php foreach ($details as $key => $value) : ?>
                        <tr>
                            <th><?php echo $key; ?></th>
                            <td>
                                <?php if (in_array($key, ['Staff ID', 'Status', 'Hire Date'])) : ?>
                                    <input type="text" id="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" name="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>" class="detailInput" readonly>
                                <?php else : ?>
                                    <input type="text" id="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" name="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>" class="detailInput">
                                <?php endif; ?>
                                <div class="error-message" id="<?php echo strtolower(str_replace(' ', '_', $key)); ?>-error"></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="form-buttons">
                    <button type="submit" id="confirmButton">Save</button>
                    <a href="staff_detail.php?staff_ID=<?php echo $staff_ID; ?>" id="cancelButton">Cancel</a>
                </div>
            </form>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>
    </section>
    <script src="js/validate_form.js"></script>
</body>

</html>