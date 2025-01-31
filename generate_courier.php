<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php'); // Update the path to where you have installed TCPDF

// Check if the order ID is passed in the URL
if (isset($_GET['orderid'])) {
    $orderid = $_GET['orderid'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'bigmoon'); // Update with your DB credentials
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch customer details
    $sql = "SELECT * FROM customer WHERE orderid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Define from address (static)
        $from_address = "BIGMOON,\n66, Mettu Street,\nKarur - 639001,\nTamilNadu,\n+91 9600362903";

        // To address (from DB)
        $to_address = $row['customername'] . ",\n" . $row['address'] . ",\n" . $row['district'] . " - " . $row['pincode'] . ",\n" . $row['state'] . ",\n" . $row['mobilenumber'];

        // Create TCPDF object
        $pdf = new TCPDF();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(15, 40, 15);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddPage();

        // Add company logo
        $logoPath = 'img/bigmoon_logo_circle.png';
        $pdf->Image($logoPath, 8, 8, 15, 0, 'PNG');

        // Add company name
        $pdf->SetFont('times', 'B', 26);
        $pdf->SetXY(30, 10);
        $pdf->Cell(0, 10, 'BIGMOON', 0, 1, 'L');

        // Add title
        $pdf->SetY(25);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Courier Receipt', 0, 1, 'C');

        // Draw boxes
        $pdf->SetXY(15, 40);
        $pdf->Rect(15, 40, 180, 60); // Increased height from 40 to 60
        $pdf->Line(105, 40, 105, 100); // Adjusted divider height from 80 to 100

        // "From" label (Bold)
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetXY(20, 45);
        $pdf->MultiCell(85, 10, "From:\n", 0, 'L');

        // "From" address (Normal)
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetXY(20, 50);
        $pdf->MultiCell(85, 15, $from_address, 0, 'L'); // Increased height to fit content

        // "To" label (Bold)
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetXY(110, 45);
        $pdf->MultiCell(85, 10, "To:\n", 0, 'L');

        // "To" address (Normal)
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetXY(110, 50);
        $pdf->MultiCell(85, 15, $to_address, 0, 'L'); // Increased height to fit content

        // Define file path for storage
        $pdfDirectory = __DIR__ . '/courier/';
        if (!file_exists($pdfDirectory)) {
            mkdir($pdfDirectory, 0777, true); // Create directory if it doesn't exist
        }
        $pdfFilename = 'courier_receipt_' . $orderid . '.pdf';
        $pdfFilePath = $pdfDirectory . $pdfFilename;

        // Save PDF to file
        $pdf->Output($pdfFilePath, 'F');

        // Store file path in the database
        $pdfFileUrl = 'courier/' . $pdfFilename; // Relative path for opening in browser
        $updateSql = "UPDATE customer SET courier = ? WHERE orderid = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("si", $pdfFileUrl, $orderid);
        $updateStmt->execute();
        $pdf->Output($pdfFilePath, 'I');

        // Close the statements and connection
        $updateStmt->close();
        $stmt->close();
        $conn->close();
    } else {
        echo "Order not found.";
    }
}
?>
