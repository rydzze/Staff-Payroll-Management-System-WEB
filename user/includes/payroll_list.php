<?php
include 'db.php';

$staff_ID = $_SESSION['staff_ID'];
$results_per_page = 15; 
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($current_page - 1) * $results_per_page; 

$month_year = isset($_GET['month_year']) ? $_GET['month_year'] : '';

$valid_month_years = [];
$sql_valid_month_years = "SELECT DISTINCT DATE_FORMAT(payroll_date, '%Y-%m') AS month_year
                          FROM payroll
                          WHERE staff_ID = '$staff_ID'
                          ORDER BY month_year DESC";
$result_valid_month_years = $conn->query($sql_valid_month_years);

while($row = $result_valid_month_years->fetch_assoc()){
    $valid_month_years[] = $row['month_year'];
}

echo "<form id='filterForm' method='GET' action=''>
        <select id='month_year' name='month_year' onchange='document.getElementById(\"filterForm\").submit();'>
            <option value=''>All Records</option>";

foreach($valid_month_years as $valid_month_year){
    $selected = ($valid_month_year == $month_year) ? "selected" : "";
    echo "<option value='$valid_month_year' $selected>" . date('F Y', strtotime($valid_month_year . '-01')) . "</option>";
}

echo "  </select>
      </form>";

$sql = "SELECT payroll_ID, payroll_date
        FROM payroll
        WHERE staff_ID = '$staff_ID'";

if($month_year){
    list($year, $month) = explode('-', $month_year);
    $sql .= " AND MONTH(payroll_date) = $month AND YEAR(payroll_date) = $year";
}

$sql .= " ORDER BY payroll_ID DESC
          LIMIT $offset, $results_per_page";
          
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "<table>";
    echo "<tr><th>Reference No.</th><th>Date Created</th><th>Status</th><th>Action</th></tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>{$row['payroll_ID']}</td>
                <td>{$row['payroll_date']}</td>
                <td>Paid</td>
                <td><a href='includes/printpayroll.php?payroll_ID={$row['payroll_ID']}'><img src='img/print.png'></a></td>
            </tr>";
    }
    echo "</table>";

    $sql_count = "SELECT COUNT(*) AS total FROM payroll WHERE staff_ID = $staff_ID";

    if($month_year){
        $sql_count .= " AND MONTH(payroll_date) = $month AND YEAR(payroll_date) = $year";
    }

    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_pages = ceil($row_count['total'] / $results_per_page);

    echo "<hr>";

    echo "<div class='pagination'>";
    if($current_page > 1){
        echo "<a href='?page=".($current_page - 1)."&month_year=$month_year'>Previous</a>";
    }

    for($i = 1; $i <= $total_pages; $i++){
        if($i == $current_page){
            echo "<span class='current'>$i</span>";
        }
        else{
            echo "<a href='?page=$i&month_year=$month_year'>$i</a>";
        }
    }

    if($current_page < $total_pages){
        echo "<a href='?page=".($current_page + 1)."&month_year=$month_year'>Next</a>";
    }
    echo "</div>";

} 
else{
    echo "0 results";
}

$conn->close();
?>