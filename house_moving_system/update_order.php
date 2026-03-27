<?php

// Connect database
include "db_connect.php";

// Get order id and action from URL
$order_id = $_GET['id'];
$action = $_GET['action'];

// Determine new status
if($action == "accept"){
    $status = "Accepted";
}

elseif($action == "reject"){
    $status = "Rejected";
}

elseif($action == "negotiate"){
    $status = "Negotiating";
}

// Update order status
$sql = "UPDATE orders SET order_status='$status' WHERE order_id='$order_id'";

mysqli_query($conn,$sql);

// Return to manage orders page
header("Location: manage_order.php");

?>