<?php include 'includes/session_start.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Payroll Detail</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/payroll_add.css">
    <script src="js/payroll_add.js"></script>
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h1>Add Payroll</h1>

        <a href="payrolls.php">Back to Payroll List</a>

        <form id="payroll-form" method="post" action="includes/payroll_add.php">
            <table>
                <tr>
                    <td>
                        <label for="staff_ID">Staff ID:</label>
                    </td>
                    <td>
                        <select id="staff_ID" name="staff_ID" required>
                            <option value="">Select Staff</option>
                            <?php include 'includes/fetch_staff.php'; ?>
                        </select>
                        <span class="error-message" id="staff_ID-error"></span>
                    </td>
                    <td class="column-gap"></td>
                    <td>
                        <label for="payroll_date">Payroll Date:</label>
                    </td>
                    <td>
                        <input type="date" id="payroll_date" name="payroll_date" required>
                    </td>
                </tr>
                <tr><td class="row-gap"></td></tr>
                <tr><td>
                        <label for="payroll_basicsalary">Basic Salary:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="payroll_basicsalary" name="payroll_basicsalary" readonly>
                        <span class="error-message" id="payroll_basicsalary-error"></span>
                    </td>
                    <td class="column-gap"></td>
                    <td>    
                        <label for="payroll_epf">EPF:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="payroll_epf" name="payroll_epf" required>
                        <span class="error-message" id="payroll_epf-error"></span>
                    </td>
                </tr>
                <tr><td>
                        <label for="payroll_allowancepay">Allowance Pay:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="payroll_allowancepay" name="payroll_allowancepay" required>
                        <span class="error-message" id="payroll_allowancepay-error"></span>
                    </td>
                    <td class="column-gap"></td>
                    <td>
                        <label for="payroll_socso">SOCSO:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="payroll_socso" name="payroll_socso" required>
                        <span class="error-message" id="payroll_socso-error"></span>
                    </td>
                </tr>
                <tr><td>
                        <label for="payroll_overtimepay">Overtime Pay:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="payroll_overtimepay" name="payroll_overtimepay" required>
                        <span class="error-message" id="payroll_overtimepay-error"></span>
                    </td>
                </tr>
                <tr><td class="row-gap"></td></tr>
                <tr><td>
                        <label for="total_salary">Total Salary:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="total_salary" name="total_salary" readonly>
                    </td>
                    <td class="column-gap"></td>
                    <td>
                        <label for="total_deduction">Total Deduction:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="total_deduction" name="total_deduction" readonly>
                    </td>
                </tr>
                <tr></tr>
                
                <tr>
                    <td>
                        <label for="net_salary">Net Salary:</label>
                    </td>
                    <td>
                        <input type="number" step="0.01" id="net_salary" name="net_salary" readonly>
                    </td>
                </tr>
            </table>

            <div class="form-buttons">
                <input type="submit" class="button" value="Add">
                <input type="button" class="button" value="Cancel" onclick="window.location.href='payrolls.php';">
            </div>
        </form>
    </section>

    <script src="js/payroll_add_validate_form.js"></script>
</body>

</html>
