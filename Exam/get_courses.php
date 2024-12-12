<?php
include 'Config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $courses = [];
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
        echo json_encode($courses);
    } 
}
?>