<?php

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'bigmoon');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the last order ID from the database
$result = $conn->query("SELECT orderid FROM customer ORDER BY orderid DESC LIMIT 1");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastOrderId = intval($row['orderid']); // Convert to integer
    $newOrderId = str_pad($lastOrderId + 1, 3, '0', STR_PAD_LEFT); // Increment and pad with leading zeros
} else {
    $newOrderId = '001'; // Default starting order ID
}

// Get data from POST
$customername = $_POST['customername'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];
$address = $_POST['address'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$productname = $_POST['productname'];
$qty = $_POST['qty'];
$size = $_POST['size'];
$price = $_POST['price'];
$paymentstatus = $_POST['paymentstatus'];
$orderdate = $_POST['orderdate'];


// SQL query to insert customer data into the database
$sql = "INSERT INTO customer (orderid, customername, mobilenumber, email, address, district, state, pincode, productname, qty, size, price, paymentstatus, orderdate) 
        VALUES ('$newOrderId', '$customername', '$mobilenumber', '$email', '$address', '$district', '$state', '$pincode', '$productname', '$qty', '$size', '$price', '$paymentstatus', '$orderdate')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => true, 'orderid' => $newOrderId]);
} else {
    echo json_encode(['status' => false, 'error' => $conn->error]);
}

?>