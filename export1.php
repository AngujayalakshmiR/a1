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
            ->setCellValue('A1', 'Order ID')
            ->setCellValue('B1', 'Customer Name')
            ->setCellValue('C1', 'Contact')
            ->setCellValue('D1', 'Email')
            ->setCellValue('E1', 'Address')
            ->setCellValue('F1', 'District')
            ->setCellValue('G1', 'State')
            ->setCellValue('H1', 'Pincode')
            ->setCellValue('I1', 'Product Name')
            ->setCellValue('J1', 'Quantity')
            ->setCellValue('K1', 'Size')
            ->setCellValue('L1', 'Price')
            ->setCellValue('M1', 'Payment Status')
            ->setCellValue('N1', 'Order Date');

// Add data from the database into the sheet
$rowNumber = 2; // Start adding data from row 2
while ($row = $result->fetch_assoc()) {
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $rowNumber, $row['orderid'])
                ->setCellValue('B' . $rowNumber, $row['customername'])
                ->setCellValue('C' . $rowNumber, $row['mobilenumber'])
                ->setCellValue('D' . $rowNumber, $row['email'])
                ->setCellValue('E' . $rowNumber, $row['address'])
                ->setCellValue('F' . $rowNumber, $row['district'])
                ->setCellValue('G' . $rowNumber, $row['state'])
                ->setCellValue('H' . $rowNumber, $row['pincode'])
                ->setCellValue('I' . $rowNumber, $row['productname'])
                ->setCellValue('J' . $rowNumber, $row['qty'])
                ->setCellValue('K' . $rowNumber, $row['size'])
                ->setCellValue('L' . $rowNumber, $row['price'])
                ->setCellValue('M' . $rowNumber, $row['paymentstatus'])
                ->setCellValue('N' . $rowNumber, $row['orderdate']);
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
