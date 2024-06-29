<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMS | Staff Details</title>

    <link rel="stylesheet" href="css/staff_list.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'templates/sidebar.php';?>

    <section class="content">
        <h2>Staff Details</h2>

        <?php include 'includes/staff_detail.php';?>

        <?php if (!empty($details)) : ?>
            <table>
                <?php foreach ($details as $key => $value) : ?>
                    <tr>
                        <th><?php echo $key; ?></th>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No details found for this staff member.</p>
        <?php endif; ?>

        <a href="staffs.php" style="margin-top: 50px;">Back to Staff List</a>
    </section>
</body>

</html>