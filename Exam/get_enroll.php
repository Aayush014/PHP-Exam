<?php
include 'Config/config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM enrollments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $enrollments = [];
        while ($row = $result->fetch_assoc()) {
            $enrollments[] = $row;
        }
        echo json_encode($enrollments);
    } 
}
?>