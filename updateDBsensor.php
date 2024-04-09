<?php     
//PHP file to update the bottlesCollected and cansCollected status in the database from the sensor data
require 'database.php';

// Assuming you have a session or authentication mechanism to get the logged-in user's ID
// Replace $_SESSION['logged_in_user_id'] with the variable containing the logged-in user's ID
$idnumber = $_SESSION['idnumber'];

if (!empty($_POST)) {
    $bottlesCollected = $_POST['bottlesCollected'];
    $cansCollected = $_POST['cansCollected'];

    // Update data based on the logged-in user's ID
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE rvmtable2 SET bottlesCollected = ?, cansCollected = ? WHERE idnumber = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($bottlesCollected, $cansCollected, $idnumber));
    Database::disconnect();
    header("Location: claimReward.php");
}
?>
