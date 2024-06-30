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

        #confirmButton {
            padding: 10px 20px;
            background-color: #06ff0a;
            color: black;
            border: none;
            cursor: pointer;
            margin-left: 5px;
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
            background-color: #00f308;
        }

        #cancelButton:hover {
            background-color: #ff0000;
        }

        .error-message {
            color: red;
            display: none;
        }

        .error {
            border-color: red;
        }
    </style>
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
                                <?php if ($key === 'Staff ID' || $key === 'Hire Date') : ?>
                                    <input type="text" name="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>" readonly class="detailInput" style="display: none;">
                                <?php else : ?>
                                    <input type="text" id="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" name="<?php echo strtolower(str_replace(' ', '_', $key)); ?>" value="<?php echo $value; ?>" class="detailInput" style="display: none;">
                                    <div class="error-message" id="<?php echo strtolower(str_replace(' ', '_', $key)); ?>-error"></div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="form-buttons">
                    <button type="button" id="editButton">Edit</button>
                    <button type="submit" id="confirmButton" style="display: none;">Save</button>
                    <button type="button" id="cancelButton" style="display: none;">Cancel</button>
                </div>
            </form>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>

        <a href="staffs.php" class="back-link">Back to Staff List</a>
    </section>

    <script src="js/validate_form.js"></script>
</body>

</html>
