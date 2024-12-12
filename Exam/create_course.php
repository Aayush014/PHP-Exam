<?php
include 'Config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $course_name = $data->course_name;
    $description = $data->description;

    $course_name = $conn->real_escape_string($course_name);
    $description = $conn->real_escape_string($description);

    $sql = "INSERT INTO courses (course_name, description) VALUES ('$course_name', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Course created successfully',
            'course_id' => $conn->insert_id
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create course']);
    }
}
?>
