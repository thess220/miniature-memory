<?php

session_start();
//protect page
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

include "db_connect.php";

$order_id = $_GET['id'];

// Get order information
$sql = "SELECT orders.*, customer.name, customer.email, customer.phone
        FROM orders
        JOIN customer ON orders.customer_id = customer.customer_id
        WHERE orders.order_id='$order_id'";
$result = mysqli_query($conn,$sql);
$order = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Order Details</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:0;
}
.header{
    background:black;
    color:white;
    padding:15px 40px;
}
.container{
    width:70%;
    margin:40px auto;
    background:white;
    padding:30px;
}
img{
    max-width:300px;
}
.back-btn{
    display:inline-block;
    padding:10px 18px;
    background:black;
    color:white;
    text-decoration:none;
    border-radius:4px;
    margin-bottom:20px;
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

<h2>Order Information</h2>

<p><b>Order ID:</b> <?php echo $order['order_id']; ?></p>
<p><b>Pickup Location:</b> <?php echo $order['pickup_location']; ?></p>
<p><b>Delivery Location:</b> <?php echo $order['delivery_location']; ?></p>
<p><b>Moving Date:</b> <?php echo $order['moving_date']; ?></p>
<p><b>Recommended Truck:</b> <?php echo $order['recommended_truck']; ?></p>
<p><b>Total Price:</b> RM <?php echo $order['quotation_price']; ?></p>
<p><b>Status:</b> <?php echo $order['order_status']; ?></p>

<hr>
<h3>Customer Information</h3>

<p><b>Customer Name:</b> <?php echo $order['name']; ?></p>
<p><b>Email:</b> <?php echo $order['email']; ?></p>
<p><b>Phone:</b> <?php echo $order['phone']; ?></p>
<hr>
<h3>Payment Proof</h3>

<?php

// Get payment proof
$pay_sql = "SELECT * FROM payment WHERE order_id='$order_id'";
$pay_result = mysqli_query($conn,$pay_sql);

if(mysqli_num_rows($pay_result) > 0){

    $payment = mysqli_fetch_assoc($pay_result);

    echo "<img src='uploads/".$payment['payment_proof']."' alt='Payment Proof'>";

    echo "<p><b>Payment Status:</b> ".$payment['payment_status']."</p>";

}else{

    echo "Payment not uploaded yet.";

}

?>
<a href="manage_order.php" class="back-btn"> Back </a>
</div>
<div class="footer">
© 2026 YT Mover. All Rights Reserved.
</div>
</body>
</html>