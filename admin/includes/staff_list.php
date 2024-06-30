<?php
include 'db.php';

$results_per_page = 15; 
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; 
$offset = ($current_page - 1) * $results_per_page; 

$sql = "SELECT p.staff_ID, p.person_fname, p.person_lname, s.staff_department, s.staff_position
        FROM person p
        INNER JOIN staff s ON p.staff_ID = s.staff_ID
        WHERE s.staff_status = 1
        ORDER BY p.staff_ID ASC
        LIMIT $offset, $results_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>No</th><th>Staff ID</th><th>Full Name</th><th>Department</th><th>Position</th></tr>";
    $number = ($current_page - 1) * $results_per_page + 1; 

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$number}</td>
                <td><a href='staff_detail.php?staff_ID={$row['staff_ID']}'>{$row['staff_ID']}</a></td>
                <td>{$row['person_fname']} {$row['person_lname']}</td>
                <td>{$row['staff_department']}</td>
                <td>{$row['staff_position']}</td>
              </tr>";
        $number++;
    }
    echo "</table>";

    
    $sql_count = "SELECT COUNT(*) AS total FROM person";
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
    echo "No active staff found.";
}

$conn->close();
?>
