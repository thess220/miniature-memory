<?php

include "db_connect.php";

$order_id = $_POST['order_id'];
$payment_method = $_POST['payment_method'];

$payment_date = date("Y-m-d");
$payment_status = "Submitted";

$file_name = $_FILES['payment_proof']['name'];
$tmp_name = $_FILES['payment_proof']['tmp_name'];

$target = "uploads/" . $file_name;

move_uploaded_file($tmp_name, $target);

// upload payment proof//
$sql = "INSERT INTO payment
(order_id, payment_method, payment_date, payment_proof, payment_status)
VALUES
('$order_id','$payment_method','$payment_date','$file_name','$payment_status')";

mysqli_query($conn,$sql);

// update order status //
$update = "UPDATE orders SET order_status='Paid' WHERE order_id='$order_id'";

mysqli_query($conn,$update);

header("Location: my_orders.php");

?>