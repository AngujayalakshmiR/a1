<?php
// Retrieve the amount from the POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['amount'])) {
    $totalAmount = floatval($_POST['amount']); // Sanitize the input
} else {
    // Handle missing or invalid amount
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body {
            background-color: rgb(9, 121, 206);
        }
        #razorpay-iframe {
            width: 100%;
            height: 600px;
            border: none;
        }
    </style>
</head>
<body>
    <div id="payment-container">
        <iframe id="razorpay-iframe" src="" style="display:none;"></iframe> <!-- Hidden iframe -->
    </div>

    <script>
        $(document).ready(function () {
            const totalAmount = <?php echo json_encode($totalAmount); ?>;
            const amountInPaisa = totalAmount * 100; // Convert to paise

            const options = {
                "key": "rzp_live_8FEUrTWd4qCbuf", // Replace with your Razorpay Key ID
                "amount": amountInPaisa, // Amount in paise
                "currency": "INR",
                "name": "Your Company Name",
                "description": "Payment for Order",
                "handler": function (response) {
                    $.ajax({
                        url: 'verify-payment.php',
                        type: 'POST',
                        data: {
                            razorpay_payment_id: response.razorpay_payment_id,
                            amount: totalAmount
                        },
                        success: function (data) {
                            const result = JSON.parse(data);
                            if (result.status === "success") {
                                alert("Payment successful!");
                                window.location.href = "success.php";
                            } else {
                                alert("Payment verification failed. Please try again.");
                                window.location.href = "failure.php";
                            }
                        },
                        error: function (err) {
                            alert("An error occurred. Please try again.");
                            window.location.href = "failure.php";
                        }
                    });
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();

            // Trigger the iframe embed after the Razorpay modal opens
            rzp.on('open', function() {
                document.getElementById('razorpay-iframe').style.display = 'block';
            });

            rzp.on('closed', function () {
                // Close iframe and reset
                document.getElementById('razorpay-iframe').style.display = 'none';
                window.location.href = "index.php"; // Redirect back to index.php
            });
        });
    </script>
</body>
</html>
