<?php
// Database connection
$servername = "localhost"; // Your database server
$username = "bigmoon_bigmoon";        // Your database username
$password = "Ev0.+]iJPEP*";            // Your database password
$dbname = "bigmoon_bigmoon";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
