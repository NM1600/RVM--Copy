<?php
// Connection parameters for MySQL database
$servername = "localhost";
$username = "root";  // Change to your MySQL username
$password = "";  // Change to your MySQL password
$dbname = "rvmdatabase"; // Change to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch idnumber based on some criteria (e.g., username)
$username = "B77B3039";  // Change to the actual username
$sql = "SELECT idnumber FROM rvmtable2 WHERE username = '$username'"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row (assuming username is unique)
    $row = $result->fetch_assoc();
    $idnumber = $row["idnumber"];
    echo $idnumber;
} else {
    echo "0 results";
}

$conn->close();
?>
