<?php
require_once 'tcpdf/tcpdf.php'; // Include the TCPDF library

// Database connection
$conn = new mysqli('localhost', 'root', '', 'bigmoon');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['orderid'])) {
    $orderId = intval($_GET['orderid']);

    // Fetch order details
    $query = "SELECT productname, qty, price FROM customer WHERE orderid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
        $productNames = explode(',', $order['productname']);
        $quantities = explode(',', $order['qty']);
        $prices = explode(',', $order['price']); // Split prices into an array
        $totalCost = end($prices); // Last price is the total cost
    } else {
        die("No order found for the given Order ID.");
    }

    // Create new PDF document
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('BIGMOON');
    $pdf->SetTitle('Order Receipt');

    // Remove header and footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    // Set up font and margins
    $pdf->SetMargins(15, 40, 15);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 10);
    $pdf->AddPage();

    // Add company logo at the top left
    $logoPath = 'img/bigmoon_logo_circle.png';
    $pdf->Image($logoPath, 8, 8, 15, 0, 'PNG');

    // Add company name with font and color change
    $pdf->SetFont('times', 'B', 26);
    // $pdf->SetTextColor(0, 102, 204); // Set text color to blue (RGB)
    $pdf->SetXY(30, 10);
    $pdf->Cell(0, 10, 'BIGMOON', 0, 1, 'L');

    // Add space before title
    $pdf->SetY(50);

    // Add title
    $pdf->SetFont('helvetica', 'B', 14);
    $pdf->Cell(0, 10, 'Order Receipt', 0, 1, 'C');

    // Table header
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(20, 10, 'S.No', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Product Name', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Price Per Item', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Subtotal', 1, 1, 'C');

    // Table data
    $pdf->SetFont('helvetica', '', 12);
    foreach ($productNames as $index => $productName) {
        $quantity = isset($quantities[$index]) ? intval($quantities[$index]) : 0;
        $subtotal = isset($prices[$index]) ? floatval($prices[$index]) : 0.0;
        $pricePerItem = ($quantity > 0) ? round($subtotal / $quantity, 2) : 0.0;

        $pdf->Cell(20, 10, $index + 1, 1, 0, 'C');
        $pdf->Cell(70, 10, htmlspecialchars($productName), 1, 0, 'C');
        $pdf->Cell(30, 10, $quantity, 1, 0, 'C');
        $pdf->Cell(30, 10, $pricePerItem, 1, 0, 'C');
        $pdf->Cell(30, 10, $subtotal, 1, 1, 'C');
    }

    // Total cost
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(150, 10, 'Total Cost', 1, 0, 'R');
    $pdf->Cell(30, 10, $totalCost, 1, 1, 'C');

    // Define receipt directory and file path
    $receiptDir = __DIR__ . "/receipts/";
    $receiptFileName = "receipt_order_{$orderId}.pdf";
    $receiptPath = $receiptDir . $receiptFileName;

    // Ensure the directory exists
    if (!is_dir($receiptDir)) {
        mkdir($receiptDir, 0777, true); // Create directory if it doesn’t exist
    }

    // Save PDF to the folder
    $pdf->Output($receiptPath, 'F');

    // Store file path in the database
    $updateQuery = "UPDATE customer SET receipt = ? WHERE orderid = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $receiptFileName, $orderId);
    $stmt->execute();

    $pdf->Output($receiptPath, 'I');

} else {
    die("Order ID not provided.");
}
?>
