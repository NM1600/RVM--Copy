<?php
// Connection parameters for MySQL database
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "rvmdatabase"; //database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get sensor data from query parameters
$bottlesCollected = $_GET['bottlesCollected'];
$cansCollected = $_GET['cansCollected'];

// SQL query to insert sensor data into database
$sql = "INSERT INTO rvmtable2 (bottlesCollected, cansCollected) VALUES ('$bottlesCollected', '$cansCollected')";

if ($conn->query($sql) === TRUE) {
    echo "Sensor data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
