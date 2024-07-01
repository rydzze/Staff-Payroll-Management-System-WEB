<?php include 'includes/session_start.php'; ?>
<?php $name = $_SESSION['admin_name']?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Dashboard</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>
    <?php include 'includes/dashboard.php';?>
    
    <section class="content">
        <h1>Welcome, <?php echo $name?>!</h1>
        <h2>Dashboard</h2>    

        <div class="dashboard-cards">
            <div class="card">
                <h3>Total Staff</h3>
                <p><?php echo $total_staff; ?></p>
            </div>
            
            <div class="card">
                <h3>Pending Payrolls for this Month</h3>
                <p><?php echo $total_pending_payroll; ?></p>
            </div>
        </div>

        <div class="dashboard-tables">
            <div class="table-container">
                <h3>Total Staff by Department</h3>

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Department</th>
                            <th>Number of Staff</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        while($row = $staff_by_dept->fetch_assoc()){
                            echo "<tr>
                                    <td>{$i}</td>
                                    <td>{$row['staff_department']}</td>
                                    <td>{$row['num_staff']}</td>
                                  </tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="table-container">
                <h3>Recent Payroll Records</h3>

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Payroll ID</th>
                            <th>Staff ID</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        while($row = $recent_payroll->fetch_assoc()){
                            echo "<tr>
                                    <td>{$i}</td>
                                    <td>{$row['payroll_ID']}</td>
                                    <td>{$row['staff_ID']}</td>
                                    <td>{$row['payroll_date']}</td>
                                  </tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
