<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "db_connect.php";

if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$order_id = $_GET['order_id'];

$sql = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation | YT Mover</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .box {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        p {
            font-size: 15px;
            margin: 10px 0;
        }

        .highlight {
            font-weight: bold;
            color: #000;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        a:hover {
            background: #333;
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

<div class="box">
    <h2>Order Submitted Successfully ✅</h2>

    <p><span class="highlight">Estimated Load:</span> <?php echo round($order['total_volume'], 2); ?> ton</p>
    <p><span class="highlight">Recommended Truck:</span> <?php echo $order['recommended_truck']; ?></p>
    <p><span class="highlight">Estimated Price:</span> RM <?php echo $order['quotation_price']; ?></p>
    <p><span class="highlight">Order Status:</span> <?php echo $order['order_status']; ?></p>

    <a href="customer_dashboard.php">Back to Dashboard</a>
</div>
    <div class="footer">
        © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
