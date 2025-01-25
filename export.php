<?php
// Include PHPExcel library
require_once 'PHPExcel/Classes/PHPExcel.php';

// Database connection
$servername = "localhost"; // Your database server
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "bigmoon";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the customer table
$sql = "SELECT * FROM customer";
$result = $conn->query($sql);

// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("BigMoon")
                             ->setTitle("Customer Data");

// Add table headers
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'S ID')
            ->setCellValue('B1', 'Order ID')
            ->setCellValue('C1', 'Customer Name')
            ->setCellValue('D1', 'Contact')
            ->setCellValue('E1', 'Email')
            ->setCellValue('F1', 'Address')
            ->setCellValue('G1', 'District')
            ->setCellValue('H1', 'State')
            ->setCellValue('I1', 'Pincode')
            ->setCellValue('J1', 'Product Name')
            ->setCellValue('K1', 'Quantity')
            ->setCellValue('L1', 'Size')
            ->setCellValue('M1', 'Price')
            ->setCellValue('N1', 'Payment Status')
            ->setCellValue('O1', 'Order Date')
            ->setCellValue('P1', 'Receipt');

// Add data from the database into the sheet
$rowNumber = 2; // Start adding data from row 2
while ($row = $result->fetch_assoc()) {
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $rowNumber, $row['customerid'])
                ->setCellValue('B' . $rowNumber, $row['orderid'])
                ->setCellValue('C' . $rowNumber, $row['customername'])
                ->setCellValue('D' . $rowNumber, $row['mobilenumber'])
                ->setCellValue('E' . $rowNumber, $row['email'])
                ->setCellValue('F' . $rowNumber, $row['address'])
                ->setCellValue('G' . $rowNumber, $row['district'])
                ->setCellValue('H' . $rowNumber, $row['state'])
                ->setCellValue('I' . $rowNumber, $row['pincode'])
                ->setCellValue('J' . $rowNumber, $row['productname'])
                ->setCellValue('K' . $rowNumber, $row['qty'])
                ->setCellValue('L' . $rowNumber, $row['size'])
                ->setCellValue('M' . $rowNumber, $row['price'])
                ->setCellValue('N' . $rowNumber, $row['paymentstatus'])
                ->setCellValue('O' . $rowNumber, $row['orderdate'])
                ->setCellValue('P' . $rowNumber, $row['receipt']);
    $rowNumber++;
}

// Set the filename and output the spreadsheet as an Excel file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="customer_data.xls"');
header('Cache-Control: max-age=0');

// Write the file to the output
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

$conn->close();
exit;
?>
