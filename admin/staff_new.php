<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Add New Staff</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/staff_new.js"></script>
    <style>
        header2 {
            text-align: center;
            color: #333;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        input[readonly] {
            background-color: #e9e9e9;
        }

        form label[for="birthdate"],
        form label[for="age"] {
            margin-top: 20px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
            display: block;
        }

        input.error {
            border: 2px solid red;
        }

        .form-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
</head>

<body>
    <?php include 'includes/staff_new.php'; ?>
    <?php include 'templates/sidebar.php'; ?>
    <section class="content">
        <h2 class="header2">Add New Staff</h2>

        <form id="staff-form" method="post" action="staff_new.php">
            <label for="ic">IC:</label>
            <input type="text" id="ic" name="ic" onkeyup="autofill()" required>
            <span class="error-message" id="ic-error"></span><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
            <span class="error-message" id="first_name-error"></span><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
            <span class="error-message" id="last_name-error"></span><br>

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" readonly><br>

            <label for="birthdate">Birthdate:</label>
            <input type="text" id="birthdate" name="birthdate" readonly><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error-message" id="email-error"></span><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
            <span class="error-message" id="phone_number-error"></span><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <span class="error-message" id="address-error"></span><br>

            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
            <span class="error-message" id="department-error"></span><br>

            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
            <span class="error-message" id="position-error"></span><br>

            <label for="basic_salary">Basic Salary:</label>
            <input type="number" step="0.01" id="basic_salary" name="basic_salary" required>
            <span class="error-message" id="basic_salary-error"></span><br>

            <label for="hire_date">Hire Date:</label>
            <input type="date" id="hire_date" name="hire_date" required>
            <span class="error-message" id="hire_date-error"></span><br>

            <div class="form-buttons">
                <input type="submit" value="Add">
                <input type="button" value="Cancel" onclick="window.location.href='staffs.php';">
            </div>
        </form>
    </section>
    <script src="js/staff_new_validate_form.js"></script>
</body>

</html>
