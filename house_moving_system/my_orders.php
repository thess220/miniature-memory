<?php
// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "db_connect.php";

// Protect page
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];

// Get customer's orders
$sql = "SELECT * FROM orders 
        WHERE customer_id = '$customer_id' 
        ORDER BY order_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders | YT Mover</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            font-size: 14px;
        }

        th {
            background-color: black;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status {
            font-weight: bold;
        }

        .pending {
            color: orange;
        }

        .accepted {
            color: green;
        }

        .completed {
            color: blue;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .back:hover {
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
<?php include "header.php"; ?>

<div class="container">
    <h2>My Orders</h2>

    <table>
        <tr>
            <th>Order ID</th>
            <th>Pickup</th>
            <th>Delivery</th>
            <th>Moving Date</th>
            <th>Recommended Truck</th>
            <th>Price (RM)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?php echo $row['order_id']; ?></td>
    <td><?php echo $row['pickup_location']; ?></td>
    <td><?php echo $row['delivery_location']; ?></td>
    <td><?php echo $row['moving_date']; ?></td>
    <td><?php echo $row['recommended_truck']; ?></td>
    <td><?php echo $row['quotation_price']; ?></td>

    <td class="status <?php echo strtolower($row['order_status']); ?>">
        <?php echo $row['order_status']; ?>
    </td>
    <!-- Action column -->
    <td>
    <?php
    if ($row['order_status'] == "Accepted") {
    ?>
        <a href="upload_payment.php?order_id=<?php echo $row['order_id']; ?>">
            Upload Payment
        </a>

    <?php
    }
    ?>

    <?php
    if ($row['order_status'] == "Paid") {
    ?>
        <a href="feedback.php?order_id=<?php echo $row['order_id']; ?>">
            Give Feedback
        </a>
    <?php
    }
    ?>
    </td>
</tr>
<?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="7">No orders found.</td>
            </tr>
        <?php } ?>
    </table>

    <a href="customer_dashboard.php" class="back">Back to Dashboard</a>
</div>
    <div class="footer">
        © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>
