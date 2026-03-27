<!DOCTYPE html>
<html>
<head>
    <title>Customer Sign Up | YT Mover</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(115vh - 60px);
        }
        .signup-box {
            background: white;
            padding: 40px;
            width: 380px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .signup-box h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .signup-box p {
            text-align: center;
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

        button {
            width: 100%;
            padding: 12px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
        }

        .login-link a {
            text-decoration: none;
            color: #007BFF;
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
<div class="center-container">
<div class="signup-box">
    <h2>Create Account</h2>
    <p>Please fill in your details</p>

    <form action="customer_signup_process.php" method="POST">
        <label>Full Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone Number</label>
        <input type="text" name="phone" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Sign Up</button>
    </form>

    <div class="login-link">
        <a href="login.php">Already have an account? Login</a>
    </div>
</div>
</div>
    <div class="footer">
        © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
