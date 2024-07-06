<html>
    <head>
        <link rel="stylesheet" href="../css/printpayroll.css">
    </head>

    <body>
        <?php
        include 'session_start.php';
        include 'db.php';

        $staff_ID = $_SESSION['staff_ID'];
        $payroll_ID = $_GET['payroll_ID'];

        $sql = "SELECT p.person_fname, p.person_lname, p.person_IC, p.person_email, p.person_phonenum, p.person_homeaddr, a.payroll_ID, a.payroll_date, a.payroll_basicsalary, a.payroll_allowancepay, a.payroll_overtimepay, a.payroll_EPF, a.payroll_SOCSO, s.staff_department, s.staff_position
                FROM person p
                INNER JOIN staff s ON p.staff_ID = s.staff_ID
                INNER JOIN payroll a ON p.staff_ID = a.staff_ID
                WHERE p.staff_ID = '$staff_ID' AND a.payroll_ID = '$payroll_ID'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            echo "<div class='companyname'><h1>SPMS</h1><br>
                <h2>Pay Slip</h2></div>";
            
            echo "<div class='data'>";
            $row = $result->fetch_assoc();
            
            echo "<table class='staffinfo'>";
            echo "<tr><th>Employee: </th><td>{$row['person_fname']} {$row['person_lname']}</td><th>Reference Number: </th><td>{$row['payroll_ID']}</td></tr>";
            echo "<tr><th>NRIC: </th><td>{$row['person_IC']}</td><th>Date Created: </th><td>{$row['payroll_date']}</td></tr>";
            echo "<tr><th>Phone Number: </th><td>{$row['person_phonenum']}</td><th>Staff Department: </th><td>{$row['staff_department']}</td></tr>";
            echo "<tr><th>E-mail: </th><td>{$row['person_email']}</td><th>Staff Position: </th><td>{$row['staff_position']}</td></tr>";
            echo "<tr><th>Home Address: </th><td>{$row['person_homeaddr']}</td></tr>";
            echo "</table>";

            $basicsalary = $row["payroll_basicsalary"];
            $allowancepay = $row["payroll_allowancepay"];
            $overtimepay = $row["payroll_overtimepay"];
            $EPF = $row["payroll_EPF"];
            $SOCSO = $row["payroll_SOCSO"];

            $gross_earnings = $basicsalary + $allowancepay + $overtimepay;
            $total_deductions = $EPF + $SOCSO;
            $net_salary = $gross_earnings - $total_deductions;

            echo "<table class='payroll'>";
            echo "<tr><th>Earnings</th><th>Amount</th><th>Deductions</th><th>Amount</th></tr>";
            echo "<tr><td>Basic Salary</td><td>{$basicsalary}</td><td>EPF</td><td>{$EPF}</td></tr>";
            echo "<tr><td>Allowance Pay</td><td>{$allowancepay}</td><td>SOCSO</td><td>{$SOCSO}</td></tr>";
            echo "<tr><td>Overtime Pay</td><td>{$overtimepay}</td><td></td><td></td></tr>";
            echo "<tr><th rowspan='2'>Gross Earnings</th><th>MYR(RM)</th><th rowspan='2'>Total Deductions</th><th>MYR(RM)</th></tr>";
            echo "<tr><td>{$gross_earnings}</td><td>{$total_deductions}</td></tr>";
            echo "<tr><th colspan='3'>Net Salary</th><th>{$net_salary}</th></tr>";

            echo "</table>";

            echo "</div>";
        }
        else{
            echo "No data found.";
        }

        $conn->close();
        ?>
    </body>
</html>