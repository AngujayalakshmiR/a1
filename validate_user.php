<?php
// Set response type to JSON
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Process POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input data from request
    $input = json_decode(file_get_contents('php://input'), true);
    $email = $input['email'] ?? '';
    $mobile = $input['mobile'] ?? '';

    // Validate input
    if (empty($email) || empty($mobile)) {
        echo json_encode(['success' => false, 'message' => 'Email or mobile number is required.']);
        exit;
    }

    // Prepare query to check if email and mobile number exist in the database
    $stmt = $conn->prepare("SELECT customerid FROM customer WHERE email = ? AND mobilenumber = ?");
    $stmt->bind_param("ss", $email, $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Valid details
        echo json_encode(['success' => true]);
    } else {
        // Invalid details
        echo json_encode(['success' => false, 'message' => 'Provide valid details.']);
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
?>
