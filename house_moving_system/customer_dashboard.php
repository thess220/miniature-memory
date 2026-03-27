<?php
// Start session ONLY once
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Protect page (customer must be logged in)
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard | YT Mover</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: black;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            background: #444;
            padding: 8px 15px;
            border-radius: 4px;
        }

        .navbar a:hover {
            background: #666;
        }

        .container {
            padding: 30px;
        }

        .welcome-box {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
            text-align: center;
        }

        .welcome-box h3 {
            margin-bottom: 15px;
        }

        .welcome-box p {
            color: #555;
        }

        .actions {
            margin-top: 25px;
        }

        .actions a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .actions a:hover {
            background: #333;
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
            font-size: 14pxpx;
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

<!--Main Content-->
<div class="container">
    <div class="welcome-box">
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['customer_name']); ?> 👋</h3>
        <p>You have successfully logged in to your account.</p>

        <div class="actions">
            <a href="create_order.php">Create Moving Order</a>
            <a href="my_orders.php">View My Orders</a>
        </div>
    </div>
</div>
<!--Back button-->
<div class="back-section">
    <a href="open_site.php" class="back-btn">Back</a>
</div>
    <div class="footer">
         © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
