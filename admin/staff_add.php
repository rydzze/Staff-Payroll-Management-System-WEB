<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Add New Staff</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/staff_add.css">
    <script src="js/staff_add.js"></script>
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h1 class="header">Add New Staff</h1>

        <form id="staff-form" method="post" action="includes/staff_add.php">
            <table>
                <tr><td>
                        <label for="ic">IC:</label>
                    </td>
                    <td>
                        <input type="text" id="ic" name="ic" onkeyup="autofill()" required>
                        <span class="error-message" id="ic-error"></span>
                    </td>
                </tr>
                
                <tr><td>
                        <label for="first_name">First Name:</label>
                    </td>
                    <td>
                        <input type="text" id="first_name" name="first_name" required>
                        <span class="error-message" id="first_name-error"></span>
                    </td>
                    <td class="gap"></td>
                    <td>
                        <label for="last_name">Last Name:</label>
                    </td>
                    <td>
                        <input type="text" id="last_name" name="last_name" required>
                        <span class="error-message" id="last_name-error"></span>
                    </td>
                </tr>

                <tr><td>
                        <label for="age">Age:</label>
                    </td>
                    <td>
                        <input type="text" id="age" name="age" readonly>
                    </td>
                    <td class="gap"></td>
                    <td>
                        <label for="birthdate">Birth Date:</label>
                    </td>
                    <td>
                        <input type="text" id="birthdate" name="birthdate" readonly>
                    </td>
                </tr>

                <tr><td>
                        <label for="email">Email:</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" required>
                        <span class="error-message" id="email-error"></span>
                    </td>
                    <td class="gap"></td>
                    <td>
                        <label for="phone_number">Phone Number:</label>
                    </td>
                    <td>
                        <input type="text" id="phone_number" name="phone_number" required>
                        <span class="error-message" id="phone_number-error"></span>
                    </td>
                </tr>

                <tr><td>
                        <label for="address">Address:</label>
                    </td>
                    <td colspan="4">
                        <input type="text" id="address" name="address" required>
                        <span class="error-message" id="address-error"></span>
                    </td>
                </tr>
            </table>

            <table>
                <tr><td>
                        <label for="department">Department:</label>
                    </td>
                    <td>
                        <select id="department" name="department" onchange="updatePositions()" required>
                            <option value="">Select Department</option>
                            <option value="HR">Human Resources</option>
                            <option value="IT">Information Technology</option>
                            <option value="Finance">Financial Department</option>
                            <option value="Sales">Sales Department</option>
                            <option value="Support">Support Department</option>
                            <option value="Legal">Legal Department</option>
                            <option value="Operations">Operations Department</option>
                        </select>
                        <span class="error-message" id="department-error"></span>
                    </td>
                    <td class="gap"></td>    
                    <td>
                        <label for="basic_salary">Basic Salary:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="basic_salary" name="basic_salary" required>
                        <span class="error-message" id="basic_salary-error"></span>
                    </td>
                </tr>
                
                <tr><td>
                        <label for="position">Position:</label>
                    </td>
                    <td>
                        <select id="position" name="position" required>
                            <option value="">Select Position</option>
                        </select>
                        <span class="error-message" id="position-error"></span>
                    </td>
                </tr>
            </table>

            <div class="form-buttons">
                <input type="submit" class="button" value="Add">
                <input type="button" class="button" value="Cancel" onclick="window.location.href='staffs.php';">
            </div>
        </form>
    </section>

    <script src="js/staff_add_validate_form.js"></script>
</body>

</html>
