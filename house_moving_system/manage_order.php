<?php
// Start session to check admin login
session_start();

// If admin is not logged in, redirect to login page
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

// Connect to database
include "db_connect.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Manage Orders | YT Mover</title>

<style>

/* Page background*/
body{
    font-family: Arial, sans-serif;
    margin:0;
    background:#f4f4f4;
}

/* Top header bar*/
.header{
    background:black;
    color:white;
    padding:15px 40px;
    font-size:20px;
}

/* Page container*/
.container{
    width:85%;
    margin:40px auto;
}

/* Table styling*/
table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

/* Table cells*/
th, td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

/* Table header*/
th{
    background:black;
    color:white;
}

/* Action links*/
.action a{
    margin:0 5px;
    text-decoration:none;
    font-weight:bold;
}

/* Colors for actions*/
.accept{
    color:green;
}

.reject{
    color:red;
}

.negotiate{
    color:orange;
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

<div class="container">

<h2>Customer Moving Orders</h2>

<!-- Orders Table -->
<table>

<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Pickup Location</th>
<th>Delivery Location</th>
<th>Moving Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php

// Query to retrieve all orders
$sql = "SELECT * FROM orders";

// Execute query
$result = mysqli_query($conn, $sql);

// Check if orders exist
if(mysqli_num_rows($result) > 0){

    // Loop through each order
    while($row = mysqli_fetch_assoc($result)){

        echo "<tr>";

        // Display order information
        echo "<td>".$row['order_id']."</td>";
        echo "<td>".$row['customer_id']."</td>";
        echo "<td>".$row['pickup_location']."</td>";
        echo "<td>".$row['delivery_location']."</td>";
        echo "<td>".$row['moving_date']."</td>";
        echo "<td>".$row['order_status']."</td>";

        // Action buttons
        echo "<td class='action'>
        
        <a class='accept' href='update_order.php?id=".$row['order_id']."&action=accept'>
        Accept
        </a>
        
        <a class='reject' href='update_order.php?id=".$row['order_id']."&action=reject'>
        Reject
        </a>
        
        <a class='negotiate' href='update_order.php?id=".$row['order_id']."&action=negotiate'>
        Negotiate
        </a>
        
        <a href='order_details.php?id=".$row['order_id']."'>View</a>
        </td>";

        echo "</tr>";
    }

}
else{

    // If no orders exist
    echo "<tr><td colspan='7'>No orders found</td></tr>";

}

?>

</table>
</div>
<!-- back BUTTON -->
<div class="back-section">
    <a href="admin_dashboard.php" class="back-btn">Back</a>
</div>
<div class="footer">
         © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>