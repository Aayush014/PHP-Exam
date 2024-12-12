<?php
include 'Config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $student_id = $data->student_id;
    $course_id = $data->course_id;
    $enrollment_date = $data->enrollment_date;

    $sql = "INSERT INTO enrollments (student_id, course_id, enrollment_date) 
            VALUES ($student_id, $course_id, '$enrollment_date')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Student enrolled successfully'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to enroll student']);
    }
}
?>
