<html>
<head>
     <link rel="stylesheet" href="index.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
     <title>Welcome to Recycle Earn</title>
    <style>
        body{
            background: linear-gradient(to bottom,#053d02,#187f13,#18d22e,#60ff04);;
            background-size: cover;
            margin: auto;
            padding: 0;
        }
        .container{
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        h1{
            text-align: center;
            margin-bottom: 65px;
            color: yellow;
            font-size: 45px;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight:400;
        }
        p{
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            text-align: center;
            margin-bottom: 20px;
            color: #ffff;
        }
        .studentBtn{
            height: 60px;
            width: 40%;
            margin-top: 25px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            border: none;
            outline: none;
            background: #053d02;
            background-size: 200%;
            color: white;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 17px;
            cursor: pointer;
            border-radius: 10px;
        }
        .studentBtn:hover {
            background-color: #0bd830;
            background-position: center;
            font-size: 17px;
            color: black;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .adminBtn{
            height: 60px;
            width: 40%;
            margin-top: 25px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            border: none;
            outline: none;
            background: #053d02;
            background-size: 200%;
            color: white;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 17px;
            cursor: pointer;
            border-radius: 10px;
        }
        .adminBtn:hover {
            background-color: #0bd830; 
            background-position: center;
            font-size: 17px;
            color: black;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .logo-container{
    text-align: center; 
        }
        form   {
            margin-top: 500px;
            max-width: 800px;
            margin: auto;
            padding: 0 20px;
            background-color: none;
        }
        .form p {
            font-family: 'Poppins', sans-serif; 
            font-size: 18px;
        }
        .logo {
            width: 250px;
            margin: auto;
            height: 35%;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        .container-form {
            text-align: center;
        }
        .card {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 5%; 
            width: 80%; 
            height: 50%;
            max-width: 400px; /* Set a maximum width */
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5.6px);
            -webkit-backdrop-filter: blur(5.6px);
            border: 1px solid rgba(255, 255, 255, 0.06);
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
    <div class="card">
        <div class="container-form">
            <form class="form">
                <img src="logoEarn.png" class="logo" alt="logo">
                <p style = "font-size: 20px;">Select your Role:</p>                
                <div class="container">
                    <input type="submit" value="Student User" class="studentBtn" name="student_Btn" formaction="studentLogin.php" target="_blank">
                    <input type="submit" value="System Admin" class="adminBtn" name="admin_Btn" formaction="adminLogin.php" target="_blank">
                </div>
            </form>
        </div>
    </div>
</body>
</html>