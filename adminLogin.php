<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Admin!</title>
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
            .logo {
                width: 250px;
                margin: auto;
                height: 35%;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }
            h1{
                text-align: center;
                margin-bottom: 65px;
                color: yellow;
                font-size: 45px;
                font-family: cursive;                
                font-weight: 400;
            }
            p{
                text-align: left;
                margin-bottom: 5px;
                color: white;
                font-size: 18px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
            }
            .username_txtbox{
                border-bottom: 2px solid white;
                position: relative;
                margin: 15px 0;
            }
            .username_txtbox input{
                background: none;
                border: none;
                outline: none;
                width: 100%;
                color: white;
                height: 30px;
                font-size: 15px;
            }
            .password_txtbox{
                border-bottom: 2px solid white;
                position: relative;
                margin: 15px 0;
            }
            .password_txtbox input{
                background: none;
                border: none;
                outline: none;
                width: 100%;
                color: white;
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
        </style>
    </head>
    <body>
        <form method="post" action="adminLogin.php">
            <img src="logoEarn.png" class="logo" alt="logo">
            <p>Username:</p>
            <div class="username_txtbox">
                <input type="text" placeholder="Enter username" name="admin_username">
            </div>
            <p>Password:</p>
            <div class="password_txtbox">
                <input type="passWord" placeholder="Enter password" name="admin_password">
            </div>
            <input type="submit" value="Login" class="loginBtn" name="login_Btn">
            <input type="submit" value="Go Back" class="loginBtn" name="login_Btn" formaction="form0.php">
        </form>
    </body>
</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "rvmdatabase"); // specify the database name
if(isset($_POST['login_Btn'])){
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $sql = "SELECT * FROM rvmtable WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
    $result = mysqli_query($conn, $sql); // execute the query

    if ($result) { // check if the query was successful
        if (mysqli_num_rows($result) > 0) { // check if any rows were returned
            // Redirect to dashboard if username and password match
            header('Location: adminDashboard.php');
            exit(); // stop further execution
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_free_result($result); // free the result set
    mysqli_close($conn); // close the connection
}
?>