<?php
header('Content-Type: application/json');

// Database connection
$conn = new mysqli("localhost", "root", "", "bigmoon");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Generate new order ID
$sql = "SELECT MAX(orderid) AS max_order_id FROM customer";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newOrderId = (int)$row['max_order_id'] + 1;
} else {
    $newOrderId = 1; // Start with 1 if no orders exist
}

// Insert new order ID into the table
$sqlInsert = "INSERT INTO customer (orderid) VALUES ('$newOrderId')";
if ($conn->query($sqlInsert) === TRUE) {
    echo json_encode(["status" => "success", "orderId" => $newOrderId]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
