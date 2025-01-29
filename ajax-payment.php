<?php
$data = [ 
    'payment_id' => $_POST['razorpay_payment_id'],
    'amount' => $_POST['totalAmount'],
];

// Check payment is authorized or not via API call
$razorPayId = $_POST['razorpay_payment_id'];

$ch = curl_init('https://api.razorpay.com/v1/payments/'.$razorPayId.'');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERPWD, "rzp_live_8FEUrTWd4qCbuf:kz7e12zHh2dedBX9j7nj4L23"); // Your Razorpay Key and Secret
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch));

// You can write your database insert code here

// Check if the payment is authorized by Razorpay
if ($response->status == 'authorized') {
    // Collect customer details from the form
    $customerName = $_POST['customername'];
    $mobileNumber = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $productName = $_POST['productname'];
    $qty = $_POST['qty'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $orderDate = date('Y-m-d H:i:s'); // current date and time
    $receipt = $_POST['receipt'];
    $courier = $_POST['courier'];
    $paymentStatus = 'success';

    // Insert into the 'customer' table
    $mysqli = new mysqli("localhost", "username", "password", "bigmoon");
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO customer (orderid, customername, mobilenumber, email, address, district, state, pincode, productname, qty, size, price, paymentstatus, orderdate, receipt, courier) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $orderId = rand(1000, 9999); // generate a random order ID (or you can set it differently)
    $stmt->bind_param("issssssssssssss", $orderId, $customerName, $mobileNumber, $email, $address, $district, $state, $pincode, $productName, $qty, $size, $price, $paymentStatus, $orderDate, $receipt, $courier);

    if ($stmt->execute()) {
        $respval = array(
            'msg' => 'Payment successfully credited',
            'status' => true,
            'paymentID' => $_POST['razorpay_payment_id']
        );

        echo json_encode($respval);
    } else {
        echo json_encode(array('status' => false, 'msg' => 'Database insertion failed.'));
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo json_encode(array('status' => false, 'msg' => 'Payment failed.'));
}
?>
