<?php
$data = [ 
    'payment_id' => $_POST['razorpay_payment_id'],
    'amount' => $_POST['totalAmount'],
];

// Check payment is authorized or not via API call
$razorPayId = $_POST['razorpay_payment_id'];

$ch = curl_init('https://api.razorpay.com/v1/payments/'.$razorPayId.'');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_USERPWD, "rzp_live_8FEUrTWd4qCbuf:kz7e12zHh2dedBX9j7nj4L23"); // Input your Razorpay Key Id and Secret Id here
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = json_decode(curl_exec($ch));

$response->status; // authorized

// You can write your database insert code here

// Check if the payment is authorized by Razorpay
if($response->status == 'authorized') {
    $respval = array(
        'msg' => 'Payment successfully credited',
        'status' => true,
        'paymentID' => $_POST['razorpay_payment_id']
    );  

    echo json_encode($respval);
}
?>
