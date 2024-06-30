<?php
include 'db.php';

$staff_ID = $_SESSION['staff_ID'];
$results_per_page = 15; 
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($current_page - 1) * $results_per_page; 

$sql = "SELECT payroll_ID, payroll_date
        FROM payroll
        WHERE staff_ID = '$staff_ID'
        ORDER BY payroll_ID DESC
        LIMIT $offset, $results_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Reference No.</th><th>Date Created</th><th>Status</th><th>Action</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['payroll_ID']}</td>
                <td>{$row['payroll_date']}</td>
                <td></td>
                <td><a href='printpayroll.php?payroll_ID={$row['payroll_ID']}'><img src='img/print.png'></a></td>
              </tr>";
    }
    echo "</table>";

    $sql_count = "SELECT COUNT(*) AS total FROM payroll WHERE staff_ID = $staff_ID";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_pages = ceil($row_count['total'] / $results_per_page);

    echo "<div class='pagination'>";
    if ($current_page > 1) {
        echo "<a href='?page=".($current_page - 1)."'>Previous</a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class='current'>$i</span>";
        } else {
            echo "<a href='?page=$i'>$i</a>";
        }
    }

    if ($current_page < $total_pages) {
        echo "<a href='?page=".($current_page + 1)."'>Next</a>";
    }
    echo "</div>";

} else {
    echo "0 results";
}

$conn->close();
?>