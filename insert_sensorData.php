<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "rvmdatabase"; //db name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Database Connection OK!";

if(isset($_POST["idnumber"]) && isset($_POST["bottlesCollected"]) && isset($_POST["cansCollected"])){
    // Retrieve user ID and sensor data from the HTTP POST request
    $userId = $_POST["idnumber"];
    $bottles = $_POST["bottlesCollected"];
    $cans = $_POST["cansCollected"];
    
    // Check if a record with the given idnumber already exists in the database
    $checkSql = "SELECT * FROM rvmtable2 WHERE idnumber = '$userId'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // If a record exists of the student's idnumber, update it with new sensor readings
        $updateSql = "UPDATE rvmtable2 SET bottlesCollected = bottlesCollected + $bottles, cansCollected = cansCollected + $cans WHERE idnumber = '$userId'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // If no record exists, insert a new record with the user ID and sensor readings
        $insertSql = "INSERT INTO rvmtable2 (idnumber, bottlesCollected, cansCollected) VALUES ('$userId', $bottles, $cans)";
        if ($conn->query($insertSql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
