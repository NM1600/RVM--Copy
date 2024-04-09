<?php
    // PHP file for NodeMCU to get Data from Database
    include 'database.php';
  
    if (!empty($_POST)) {
        $idnumber = $_POST["idnumber"];
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT bottlesCollected, cansCollected FROM rvmtable2 WHERE idnumber = ?';
    
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    
        echo json_encode($data); // Return the data as JSON format
    }
?>
