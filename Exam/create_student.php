<?php
include 'Config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $name = $data->name;
    $email = $data->email;
    $phone = $data->phone;

    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $phone = $conn->real_escape_string($phone);

    $sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Student created successfully',
            'student_id' => $conn->insert_id
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to create student']);
    }
}
?>
