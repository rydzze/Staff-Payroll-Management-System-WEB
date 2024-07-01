<?php
include 'db.php';

$results_per_page = 15;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $results_per_page;

$month_year = isset($_GET['month_year']) ? $_GET['month_year'] : '';

$valid_month_years = [];
$sql_valid_month_years = "SELECT DISTINCT DATE_FORMAT(payroll_date, '%Y-%m') AS month_year
                          FROM payroll p
                          INNER JOIN staff s ON p.staff_ID = s.staff_ID
                          WHERE s.staff_status = 1
                          ORDER BY month_year DESC";
$result_valid_month_years = $conn->query($sql_valid_month_years);
while ($row = $result_valid_month_years->fetch_assoc()) {
    $valid_month_years[] = $row['month_year'];
}

echo "<form id='filterForm' method='GET' action=''>
        <select id='month_year' name='month_year' onchange='document.getElementById(\"filterForm\").submit();'>
            <option value=''>All Records</option>";
foreach ($valid_month_years as $valid_month_year) {
    $selected = ($valid_month_year == $month_year) ? "selected" : "";
    echo "<option value='$valid_month_year' $selected>" . date('F Y', strtotime($valid_month_year . '-01')) . "</option>";
}
echo "  </select>
      </form>";

$sql = "SELECT p.payroll_ID, p.staff_ID, p.payroll_date
        FROM payroll p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE s.staff_status = 1";

if ($month_year) {
    list($year, $month) = explode('-', $month_year);
    $sql .= " AND MONTH(p.payroll_date) = $month AND YEAR(p.payroll_date) = $year";
}

$sql .= " ORDER BY p.payroll_ID DESC
          LIMIT $offset, $results_per_page";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>Payroll ID</th><th>Staff ID</th><th>Payroll Date</th></tr>";
    $number = ($current_page - 1) * $results_per_page + 1;

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$number}</td>
                <td><a href='payroll_detail.php?payroll_ID={$row['payroll_ID']}'>{$row['payroll_ID']}</a></td>
                <td><a href='staff_detail.php?staff_ID={$row['staff_ID']}'>{$row['staff_ID']}</a></td>
                <td>{$row['payroll_date']}</td>
              </tr>";
        $number++;
    }
    echo "</table>";

    $sql_count = "SELECT COUNT(*) AS total 
                  FROM payroll p 
                  INNER JOIN staff s ON p.staff_ID = s.staff_ID 
                  WHERE s.staff_status = 1";

    if ($month_year) {
        $sql_count .= " AND MONTH(p.payroll_date) = $month AND YEAR(p.payroll_date) = $year";
    }

    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_pages = ceil($row_count['total'] / $results_per_page);

    echo "<div class='pagination'>";
    if ($current_page > 1) {
        echo "<a href='?page=".($current_page - 1)."&month_year=$month_year'>Previous</a>";
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo "<span class='current'>$i</span>";
        } else {
            echo "<a href='?page=$i&month_year=$month_year'>$i</a>";
        }
    }

    if ($current_page < $total_pages) {
        echo "<a href='?page=".($current_page + 1)."&month_year=$month_year'>Next</a>";
    }
    echo "</div>";

} else {
    echo "0 results";
}

$conn->close();
?>
