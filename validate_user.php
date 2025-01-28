<?php
// Set response type to JSON
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'bigmoon');

// Check database connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Process POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input data from request
    $input = json_decode(file_get_contents('php://input'), true);
    $email1 = $input['email1'] ?? '';
    $mobile1 = $input['mobile1'] ?? '';

    // Validate input
    if (empty($email1) || empty($mobile1)) {
        echo json_encode(['success' => false, 'message' => 'Email or mobile number is required.']);
        exit;
    }

    // Prepare query to check if email and mobile number exist in the database
    $stmt = $conn->prepare("SELECT customerid FROM customer WHERE email = ? AND mobilenumber = ?");
    $stmt->bind_param("ss", $email1, $mobile1);
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
