<!DOCTYPE html>
<html>
<head>
    <title>Admin Login | YT Mover</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            
        }
        .login-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 70px); /* subtract header height */
        }
        .login-box {
            background: white;
            padding: 40px;
            width: 360px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .login-box h2 {
            margin-bottom: 10px;
        }
        .login-box p {
            color: #555;
            margin-bottom: 25px;
        }
        label {
            font-size: 14px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0 18px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-center {
            text-align: center;
        }
        button {
            width: 50%;
            padding: 12px;
            background-color: black;
            color: white;
            border:cent;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #333;
        }
        .footer{
            background:black;
            color:white;
            text-align:center;
            padding:12px;
            position:fixed;
            bottom:0;
            left:0;
            width:100%;
            font-size:14px;
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>

<div class="login-wrapper">
    <div class ="login-box">
    <h2>Login as Admin</h2>
    <p>Please login for continue your access</p>

    <form action="admin_login_process.php" method="POST">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <div class="btn-center">
        <button type="submit">Login</button>
    </form>
    <br>
    <p style="text-align: center;">
    <a href="open_site.php">Back to Home</a>
    </p>
    <div class="footer">
    © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
