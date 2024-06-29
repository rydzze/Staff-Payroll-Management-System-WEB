<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Payroll Detail</title>

    <link rel="stylesheet" href="css/payroll_detail.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'templates/sidebar.php'; ?>

    <section class="content">
        <h2>Payroll Detail</h2>

        <?php include 'includes/payroll_detail.php'; ?>
        
        <?php if (!empty($detail1)) : ?>
            <table>
                <?php foreach ($detail1 as $key => $value) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($key); ?></td>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No basic information found for the specified payroll ID.</p>
        <?php endif; ?>

        <?php if (!empty($detail2)) : ?>
            <table>
                <?php foreach ($detail2 as $key => $value) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($key); ?></td>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <table>
                <?php foreach ($detail3 as $key => $value) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($key); ?></td>
                        <td><?php echo htmlspecialchars($value); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <table>
                <tr>
                    <td>Net Salary</td>
                    <td><?= htmlspecialchars($netSalary) ?></td>
                </tr>
            </table>
        <?php else : ?>
            <p>No detailed information found for the specified payroll ID.</p>
        <?php endif; ?>

        <a href="payrolls.php">Back to Payroll List</a>
    </section>
</body>

</html>
