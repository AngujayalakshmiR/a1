<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: dashboard.php"); // Redirect to login if session is invalid
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy(); // Destroy session
    header("Location: dashboard.php"); // Redirect to login page
    exit;
}
?>

<?php
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data - BigMoon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, rgb(33, 207, 213), rgba(45, 90, 203, 0.88));
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .navbar {
    position: fixed; /* Ensures the navbar stays at the top */
    top: 0; /* Positions the navbar at the very top */
    left: 0;
    width: 100%; /* Makes the navbar span the full width of the page */
    background-color: rgb(255, 255, 255); /* Background color of the navbar */
    color: rgb(45, 90, 203); /* Text color */
    padding: 15px 20px; /* Spacing inside the navbar */
    display: flex; /* Flexbox for easy alignment */
    justify-content: space-between; /* Aligns items to the left and right */
    align-items: center; /* Centers items vertically */
    z-index: 1000; /* Ensures the navbar stays on top of other content */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Adds a slight shadow for better visibility */
}

.container {
    margin-top: 80px; /* Space between the navbar and container */
    background-color: white;
    padding: 2rem;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 1200px;
}

        table {
            border-radius: 10px !important;
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
        }
        th, td {
            text-align: center;
            padding: 12px 15px;
            word-wrap: break-word;
            white-space: normal;
            overflow: hidden;
        }
        th {
            background: linear-gradient(135deg, rgb(33, 207, 213), rgba(45, 90, 203, 0.88));
            color: white;
            text-align: center;
            
        }
        td {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        td:hover {
            background-color: #f1f1f1;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table thead th {
            white-space: nowrap; /* Ensures headers don't break into multiple lines */
        }

        th:nth-child(1), td:nth-child(1) {
            width: 80px; /* Adjust Order ID width */
        }
        th:nth-child(2), td:nth-child(2) {
            width: 130px; /* Adjust Customer Name width */
        }
        th:nth-child(3), td:nth-child(3) {
            width: 80px; /* Adjust Mobile Number width */
        }
        th:nth-child(4), td:nth-child(4) {
            width: 190px; /* Adjust Email width */
        }
        th:nth-child(5), td:nth-child(5) {
            width: 200px; /* Adjust Address width */
        }
        th:nth-child(6), td:nth-child(6) {
            width: 140px; /* Adjust District width */
        }
        th:nth-child(7), td:nth-child(7) {
            width: 100px; /* Adjust State width */
        }
        th:nth-child(8), td:nth-child(8) {
            width: 40px; /* Adjust Pincode width */
        }
        th:nth-child(9), td:nth-child(9) {
            width: 240px; /* Adjust Product Name width */
        }
        th:nth-child(10), td:nth-child(10) {
            width: 80px; /* Adjust Quantity width */
        }
        th:nth-child(11), td:nth-child(11) {
            width: 80px; /* Adjust Size width */
        }
        th:nth-child(12), td:nth-child(12) {
            width: 80px; /* Adjust Price width */
        }
        th:nth-child(13), td:nth-child(13) {
            width: 50px; /* Adjust Payment Status width */
        }
        th:nth-child(14), td:nth-child(14) {
            width: 150px; /* Adjust Order Date width */
        }
        th:nth-child(15), td:nth-child(15) {
            width: 50px; /* Adjust Receipt width */
            border-radius: 0px 10px 0 0;
        }
    .dataTables_filter {
        margin-bottom: 20px; /* Adjust as needed */
    }

        .navbar {
    position: fixed; /* Ensures the navbar stays at the top */
    top: 0; /* Positions the navbar at the very top */
    left: 0;
    width: 100%; /* Makes the navbar span the full width of the page */
    background-color: rgb(255, 255, 255); /* Background color of the navbar */
    color: rgb(45, 90, 203); /* Text color */
    padding: 15px 20px; /* Spacing inside the navbar */
    border-radius: 0; /* Removes the border-radius for a cleaner design */
    display: flex; /* Flexbox for easy alignment */
    justify-content: space-between; /* Aligns items to the left and right */
    align-items: center; /* Centers items vertically */
    z-index: 1000; /* Ensures the navbar stays on top of other content */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Adds a slight shadow for better visibility */
}

        .navbar .logout-btn {
            color: white;
            text-decoration: none;
            background-color: rgb(220, 53, 69);
            padding: 5px 10px;
            border-radius: 5px;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1200px;
        }

        @media (max-width: 768px) {
  .container{
    margin-top: 150px;
  }
}
        @media (min-width: 700px) {
  .custom-padding-left {
    padding-left: 9rem;
  }
  .container{
    margin-top: 100px;
  }
}
    </style>
</head>
<body>

<div class="navbar">        
    <h4 class="m-0  col-9 custom-padding-left" ><b>BigMoon Dashboard</b></h4>
    <div class="col-3">
    <a href="export1.php" class="btn btn-success">Download Excel</a>
    <a href="?logout=true" class="btn btn-danger">Logout</a></div>
</div>
<div class="container">
    <h2 class="text-center">Customer Data - BigMoon</h2>
    <div class="table-responsive"> <!-- Enables the scroll bar on table -->
        <table id="customerTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Payment<br>Status</th>
                    <th>Order Date</th>
                    <th>Receipt</th>
                </tr>
            </thead>
            <tbody>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row["orderid"]) . "</td>
                <td>" . htmlspecialchars($row["customername"]) . "</td>
                <td>" . htmlspecialchars($row["mobilenumber"]) . "</td>
                <td>" . htmlspecialchars($row["email"]) . "</td>
                <td>" . htmlspecialchars($row["address"]) . "</td>
                <td>" . htmlspecialchars($row["district"]) . "</td>
                <td>" . htmlspecialchars($row["state"]) . "</td>
                <td>" . htmlspecialchars($row["pincode"]) . "</td>";

        // Product names, quantities, and sizes displayed in rows within each cell
        echo "<td>
                <table>";
        $productNames = explode(',', $row["productname"]);
        foreach ($productNames as $productName) {
            echo "<tr><td>" . htmlspecialchars($productName) . "</td></tr>";
        }
        echo "</table>
              </td>";

        echo "<td>
                <table>";
        $quantities = explode(',', $row["qty"]);
        foreach ($quantities as $quantity) {
            echo "<tr><td>" . htmlspecialchars($quantity) . "</td></tr>";
        }
        echo "</table>
              </td>";

        echo "<td>
                <table>";
        $sizes = explode(',', $row["size"]);
        foreach ($sizes as $size) {
            echo "<tr><td>" . htmlspecialchars($size) . "</td></tr>";
        }
        echo "</table>
              </td>";

        // Remaining columns
        echo "<td>" . htmlspecialchars($row["price"]) . "</td>
              <td>" . htmlspecialchars($row["paymentstatus"]) . "</td>
              <td>" . htmlspecialchars($row["orderdate"]) . "</td>
              <td>
                  <button class='btn btn-link p-0' data-bs-toggle='modal' data-bs-target='#receiptModal' 
                      data-receipt='" . htmlspecialchars($row["receipt"]) . "'>
                      <img src='img/img-icon.png' alt='View Receipt' width='24' height='24'>
                  </button>
              </td>
            </tr>";
    }
    ?>
</tbody>


        </table>
    </div>
</div>
<!-- Bootstrap Modal -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="receiptModalLabel">Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalReceiptImage" src="" alt="Receipt" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#customerTable').DataTable({
            responsive: true
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
    const receiptModal = document.getElementById('receiptModal');
    receiptModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const receiptPath = button.getAttribute('data-receipt'); // Extract receipt path
        const modalReceiptImage = document.getElementById('modalReceiptImage');
        modalReceiptImage.src = receiptPath; // Set the image source
    });
});

</script>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
