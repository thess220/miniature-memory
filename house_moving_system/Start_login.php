<!DOCTYPE html>
<html>
<head>
    <title>YT Mover</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        button {
            width: 200px;
            padding: 12px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
        }
        .back-section{
            text-align: center;
            margin-top: 20px;
        }
        .back-btn{
            display: inline-block;
            background: black;
            color:white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .footer{
            background:black;
            color:white;
            text-align:center;
            padding:12px;
            position:fixed;
            bottom:0;
            width:100%;
            font-size:14px;
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>

<div class="container">
    <h2>Welcome to YT Mover</h2>
    <p>Are you a customer or an admin?</p>

    <a href="login.php">
        <button>Customer</button>
    </a>

    <a href="admin_login.php">
        <button>Admin</button>
    </a>
</div>
<div class="back-section">
    <a href="open_site.php" class="back-btn">Back</a>
</div>
    <div class="footer">
        © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
