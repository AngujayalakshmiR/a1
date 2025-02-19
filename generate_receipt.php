<?php
require_once 'tcpdf/tcpdf.php'; // Include the TCPDF library

include 'db.php';

if (isset($_GET['orderid'])) {
    $orderId = intval($_GET['orderid']);

    // Fetch order details
    $query = "SELECT productname, qty, price, weight FROM customer WHERE orderid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
        $productNames = explode(',', $order['productname']);
        $quantities = explode(',', $order['qty']);
        $prices = explode(',', $order['price']);
        $weights = explode(',', $order['weight']);

        $totalCost = end($prices);  // Last price is the total cost
        $totalWeight = end($weights); // Last value in weight column is the total weight
    } else {
        die("No order found for the given Order ID.");
    }

    // Calculate subtotal sum
    $subtotalSum = 0;
    foreach ($prices as $index => $price) {
        if ($index < count($prices) - 1) { // Exclude last price as it's the total cost
            $subtotalSum += floatval($price);
        }
    }

    // Calculate Shipping Charge
    $shippingCharge = $totalCost - $subtotalSum;

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

    // Add company name
    $pdf->SetFont('times', 'B', 26);
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
        if ($index == count($prices) - 1) continue; // Skip the last value which is the total cost
    
        $quantity = isset($quantities[$index]) ? intval($quantities[$index]) : 0;
        $subtotal = isset($prices[$index]) ? floatval($prices[$index]) : 0.0;
        $pricePerItem = ($quantity > 0) ? round($subtotal / $quantity, 2) : 0.0;
    
        // Calculate height dynamically based on product name
        $cellHeight = $pdf->getStringHeight(70, $productName); // Get required height for Product Name column
    
        // Ensure minimum height of 10
        $cellHeight = max($cellHeight, 10);
    
        // Use the same height for all columns
        $pdf->MultiCell(20, $cellHeight, $index + 1, 1, 'C', false, 0);
        $pdf->MultiCell(70, $cellHeight, htmlspecialchars($productName), 1, 'C', false, 0);
        $pdf->MultiCell(30, $cellHeight, $quantity, 1, 'C', false, 0);
        $pdf->MultiCell(30, $cellHeight, $pricePerItem, 1, 'C', false, 0);
        $pdf->MultiCell(30, $cellHeight, $subtotal, 1, 'C', false, 1);
    }
    
    // Add total weight row
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(150, 10, 'Total Weight', 1, 0, 'R');
    $pdf->Cell(30, 10, $totalWeight . ' g', 1, 1, 'C');

    // Add shipping charge row
    $pdf->Cell(150, 10, 'Shipping Charge', 1, 0, 'R');
    $pdf->Cell(30, 10, number_format($shippingCharge, 2), 1, 1, 'C');

    // Total cost row
    $pdf->Cell(150, 10, 'Total Cost', 1, 0, 'R');
    $pdf->Cell(30, 10, $totalCost, 1, 1, 'C');

    $receiptDir = __DIR__ . "/receipts/";
    $receiptFileName = "receipt_order_{$orderId}.pdf";
    $receiptPath = $receiptDir . $receiptFileName;

    if (!is_dir($receiptDir)) {
        mkdir($receiptDir, 0777, true);
    }

    $pdf->Output($receiptPath, 'F');

    $updateQuery = "UPDATE customer SET receipt = ? WHERE orderid = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("si", $receiptFileName, $orderId);
    $stmt->execute();

    $pdf->Output($receiptPath, 'I');
} else {
    die("Order ID not provided.");
}
?>