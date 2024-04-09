<html>
    <head>
        <title>Welcome</title>
        <style>
            body{
                min-height: 100vh;
                background: linear-gradient(to bottom,#053d02,#187f13,#18d22e,#60ff04);
            }
            form{
                background: rgba(255, 255, 255, 0.5); /* RGBA color with 80% opacity */
                width: 350px;
                height: 580px;
                padding: 75px 50px;
                position:absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
            }
            h1{
                text-align: center;
                margin-bottom: 65px;
                color: green;
                font-size: 25px;
                font-family: cursive;                
                font-weight: 400;
            }
            p{
                text-align: left;
                margin-bottom: 5px;
                color: green;
                font-size: 18px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
            .textBoxdiv{
                border-bottom: 2px solid rgb(0, 131, 7);
                position: relative;
                margin: 15px 0;
            }
            .textBoxdiv input{
                background: none;
                border: none;
                outline: none;
                width: 100%;
                color: black;
                height: 30px;
                font-size: 15px;
            }
            .loginBtn{
                height: 45px;
                width: 100%;
                margin-top: 15px;
                border: none;
                outline: none;
                background: #053d02;
                background-size: 200%;
                color: white;
                font-size: 16px;
            }
            .loginBtn:hover {
                background-color: #0bd830; /* New background color when hovering */
                background-position: right;
                font-size: 16px;
                color: black;
            }
            .error-message {
                text-align: center;
                margin-top: 10px;
                margin-left: auto;
                margin-right: auto;
                padding: 10px;
                background-color: #ffcccc; 
                color: #cc0000;
                border: 1px solid #cc0000; 
                border-radius: 5px; 
                width: 300px; 
            }
            .logo {
                width: 250px;
                margin: auto;
                height: 35%;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
            /* Media Query for smaller screens */
            @media screen and (max-width: 600px) {
                .card {
                    width: 90%; /* Adjust as needed */
                    padding: 10px; /* Adjust as needed */
                }
            }
        </style>
    </head>
    <body>
        <form method="post" action="studentLogin.php">
        <div class="card">
            <img src="logoEarn.png" class="logo" alt="logo">
            <h1>Welcome Recycler!</h1>
            <p>ID Number:</p>
            <div class="textBoxdiv">
                <input type="text" placeholder="Enter student ID number" name="idnumber">
            </div>
            <input type="submit" value="Login" class="loginBtn" name="login_Btn">
            <input type="submit" value="Go Back"  class="loginBtn" formaction="form0.php" >
        </div>
        </form>
    </body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rvmdatabase";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $idnumber = $_POST['idnumber'];

    $sql = "SELECT * FROM rvmtable2 WHERE idnumber='$idnumber'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful, set session variable
        $_SESSION['idnumber'] = $idnumber;
        header("Location: studentDashboard.php"); // Redirect to the dashboard or any other page
        exit(); // Make sure to exit after redirecting
    } else {
        echo '<div class="error-message">Error: Unregistered ID Number</div>';
    }

    mysqli_close($conn);
}
?>







