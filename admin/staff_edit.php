<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Details</title>
    <link rel="stylesheet" href="css/staff_edit.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        #confirmButton {
            padding: 10px 20px;
            background-color: #10c622;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            font-size: 16px;
        }

        #cancelButton {
            padding: 10px 20px;
            background-color: #fd4508;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 5px;
        }

        #confirmButton:hover {
            background-color: #009b05;
        }

        #cancelButton:hover {
            background-color: #ff0000;
        }
    </style>
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
    <script src="js/staff_edit_validate_form.js"></script>
</body>

</html>