<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Edit Staff Details</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/staff_edit.css">
    <script src="js/staff_edit.js"></script>
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>
    <?php include 'includes/staff_edit.php'; ?>
    <section class="content">
        <h1>Edit Staff Details</h1>

        <?php if (!empty($details)) : ?>
            <form id="staffEditForm" method="post" action="staff_edit.php?staff_ID=<?php echo $staff_ID; ?>">
                <table>
                    <tr>
                        <td>
                            <label for="staff_id">Staff ID:</label>
                        </td>
                        <td>
                            <input type="text" id="staff_id" name="staff_id" value="<?php echo $details['Staff ID']; ?>" readonly>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="ic">IC:</label>
                        </td>
                        <td>
                            <input type="text" id="ic" name="ic" value="<?php echo $details['IC']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="first_name">First Name:</label>
                        </td>
                        <td>
                            <input type="text" id="first_name" name="first_name" value="<?php echo $details['First Name']; ?>" required>
                            <span class="error-message" id="first_name-error"></span>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="last_name">Last Name:</label>
                        </td>
                        <td>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $details['Last Name']; ?>" required>
                            <span class="error-message" id="last_name-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="age">Age:</label>
                        </td>
                        <td>
                            <input type="text" id="age" name="age" value="<?php echo $details['Age']; ?>" readonly>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="birthdate">Birth Date:</label>
                        </td>
                        <td>
                            <input type="text" id="birthdate" name="birthdate" value="<?php echo $details['Birthdate']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>
                        <td>
                            <input type="email" id="email" name="email" value="<?php echo $details['Email']; ?>" required>
                            <span class="error-message" id="email-error"></span>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="phone_number">Phone Number:</label>
                        </td>
                        <td>
                            <input type="text" id="phone_number" name="phone_number" value="<?php echo $details['Phone Number']; ?>" required>
                            <span class="error-message" id="phone_number-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="address">Address:</label>
                        </td>
                        <td colspan="4">
                            <input type="text" id="address" name="address" class="long-input" value="<?php echo $details['Address']; ?>" required>
                            <span class="error-message" id="address-error"></span>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            <label for="department">Department:</label>
                        </td>
                        <td>
                        <select id="department" name="department" data-position="<?php echo $details['Position']; ?>" onchange="updatePositions()" required>
                                <option value="">Select Department</option>
                                <option value="HR" <?php echo $details['Department'] == 'HR' ? 'selected' : ''; ?>>Human Resources</option>
                                <option value="IT" <?php echo $details['Department'] == 'IT' ? 'selected' : ''; ?>>Information Technology</option>
                                <option value="Finance" <?php echo $details['Department'] == 'Finance' ? 'selected' : ''; ?>>Financial Department</option>
                                <option value="Sales" <?php echo $details['Department'] == 'Sales' ? 'selected' : ''; ?>>Sales Department</option>
                                <option value="Support" <?php echo $details['Department'] == 'Support' ? 'selected' : ''; ?>>Support Department</option>
                                <option value="Legal" <?php echo $details['Department'] == 'Legal' ? 'selected' : ''; ?>>Legal Department</option>
                                <option value="Operations" <?php echo $details['Department'] == 'Operations' ? 'selected' : ''; ?>>Operations Department</option>
                            </select>
                            <span class="error-message" id="department-error"></span>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="basic_salary">Basic Salary:</label>
                        </td>
                        <td>
                            <input type="number" step="0.01" id="basic_salary" name="basic_salary" value="<?php echo $details['Basic Salary']; ?>" required>
                            <span class="error-message" id="basic_salary-error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="position">Position:</label>
                        </td>
                        <td>
                            <select id="position" name="position" required>
                                <option value="">Select Position</option>
                                <!-- Populate positions based on the selected department -->
                            </select>
                            <span class="error-message" id="position-error"></span>
                        </td>
                        <td class="gap"></td>
                        <td>
                            <label for="hire_date">Hire Date:</label>
                        </td>
                        <td>
                            <input type="text" id="hire_date" name="hire_date" value="<?php echo $details['Hire Date']; ?>" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="status">Status:</label>
                        </td>
                        <td>
                            <input type="text" id="status" name="status" value="<?php echo $details['Status']; ?>" readonly>
                        </td>
                    </tr>
                </table>
                <div class="form-buttons">
                    <input type="submit" id="confirmButton" value="Save">
                    <input type="button" id="cancelButton" value="Cancel" onclick="window.location.href='staff_detail.php?staff_ID=<?php echo $details['Staff ID']; ?>';">
                </div>
            </form>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>
    </section>
    <script src="js/staff_edit_validate_form.js"></script>
</body>

</html>