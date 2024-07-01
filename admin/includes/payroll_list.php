<?php
include 'db.php';

$RESULTS_PER_PAGE = 15;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $RESULTS_PER_PAGE;

$month_year = isset($_GET['month_year']) ? $_GET['month_year'] : '';

$FILTER_LIST = [];
$sql_query = "SELECT DISTINCT DATE_FORMAT(payroll_date, '%Y-%m') AS month_year
              FROM payroll p
              INNER JOIN staff s ON p.staff_ID = s.staff_ID
              WHERE s.staff_status = 1
              ORDER BY month_year DESC";
$result = $conn->query($sql_query);
while($row = $result->fetch_assoc()){
    $FILTER_LIST[] = $row['month_year'];
}

echo "<form id='filterForm' method='GET' action=''>
        <select id='month_year' name='month_year' onchange='document.getElementById(\"filterForm\").submit();'>
            <option value=''>All Records</option>";
foreach($FILTER_LIST as $filter){
    $selected = ($filter == $month_year) ? "selected" : "";
    echo "<option value='$filter' $selected>" . date('F Y', strtotime($filter . '-01')) . "</option>";
}
echo "  </select>
      </form>";

$sql_query = "SELECT p.payroll_ID, p.staff_ID, p.payroll_date
              FROM payroll p
              INNER JOIN staff s ON p.staff_ID = s.staff_ID
              WHERE s.staff_status = 1";

if($month_year){
    list($year, $month) = explode('-', $month_year);
    $sql_query .= " AND MONTH(p.payroll_date) = $month AND YEAR(p.payroll_date) = $year";
}

$sql_query .= " ORDER BY p.payroll_ID DESC
                LIMIT $offset, $RESULTS_PER_PAGE";

$result = $conn->query($sql_query);

if($result->num_rows > 0){
    echo "<table>";
    echo "<tr><th>No</th><th>Payroll ID</th><th>Staff ID</th><th>Payroll Date</th></tr>";
    $num = ($current_page - 1) * $RESULTS_PER_PAGE + 1;

    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>{$num}</td>
                <td><a href='payroll_detail.php?payroll_ID={$row['payroll_ID']}'>{$row['payroll_ID']}</a></td>
                <td><a href='staff_detail.php?staff_ID={$row['staff_ID']}'>{$row['staff_ID']}</a></td>
                <td>{$row['payroll_date']}</td>
              </tr>";
        $num++;
    }
    echo "</table>";

    $sql_query = "SELECT COUNT(*) AS total 
                  FROM payroll p 
                  INNER JOIN staff s ON p.staff_ID = s.staff_ID 
                  WHERE s.staff_status = 1";

    if($month_year){
        $sql_query .= " AND MONTH(p.payroll_date) = $month AND YEAR(p.payroll_date) = $year";
    }

    $result = $conn->query($sql_query);
    $row_count = $result->fetch_assoc();
    $total_pages = ceil($row_count['total'] / $RESULTS_PER_PAGE);

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
    echo "<br>No record found.";
}

$conn->close();
?>
