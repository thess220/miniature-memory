<?php
// Show errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include "db_connect.php";

// Check if customer is logged in //
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['customer_id'];

// Get form inserted data //
$pickup = $_POST['pickup_location'] ?? '';
$delivery = $_POST['delivery_location'] ?? '';
$moving_date = $_POST['moving_date'] ?? '';

//Item quantities (default = 0 if empty) //
$cabinet = $_POST['cabinet'] ?? 0;
$sofa_bed = $_POST['sofa_bed'] ?? 0;
$bed = $_POST['bed'] ?? 0;
$chair = $_POST['chair'] ?? 0;
$fridge = $_POST['fridge'] ?? 0;

//Calculate total load//
$total_load =
    ($cabinet * 0.8) +
    ($sofa_bed * 0.6) +
    ($bed * 0.7) +
    ($chair * 0.2) +
    ($fridge * 0.5);

//Recommend truck//
if ($total_load <= 3) {
    $recommended_truck = "16 ft (3 ton)";
    $quotation_price = 400;
} elseif ($total_load <= 10) {
    $recommended_truck = "26 ft (10 ton)";
    $quotation_price = 500;
} else {
    $recommended_truck = "40 ft (30 ton)";
    $quotation_price = 650;
}

//Distance discount//
if ($pickup == "Pengkalan" && $delivery == "Botani") {
    $quotation_price -= 50;
}

//Order status//
$order_status = "Pending";

//Insert order into database//
$sql = "INSERT INTO orders
(customer_id, pickup_location, delivery_location, moving_date, total_volume, quotation_price, order_status, recommended_truck)
VALUES
('$customer_id', '$pickup', '$delivery', '$moving_date', '$total_load', '$quotation_price', '$order_status', '$recommended_truck')";

$result = mysqli_query($conn, $sql);


if ($result) {
//Pop up message//
    echo "<script>
            alert('Congratulations! Your order has been created successfully.');
            window.location.href='my_orders.php'; 
          </script>";
} else {
    echo "Database Error: " . mysqli_error($conn);
}
exit();
?>