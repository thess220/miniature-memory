<?php 
session_start();
include "db_connect.php";

$order_id = $_GET['order_id'];

/* Get order price */
$sql = "SELECT quotation_price FROM orders WHERE order_id='$order_id'";
$result = mysqli_query($conn,$sql);
$order = mysqli_fetch_assoc($result);

$price = $order['quotation_price'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Payment Proof</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

.container{
    width:400px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:6px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

button{
    padding:10px 20px;
    background:black;
    color:white;
    border:none;
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

<h2>Upload Payment Proof</h2>

<p><b>Total Payment Amount:</b> RM <?php echo $price; ?></p>
<form action="payment_process.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

<label>Payment Method</label>
<select name="payment_method" required>
<option value="DuitNow">DuitNow</option>
<option value="Bank Transfer">Bank Transfer</option>
</select>

<br><br>

<label>Upload Receipt</label>
<input type="file" name="payment_proof" accept="image/png" required>

<br><br>

<button type="submit">Submit Payment</button>

</form>

</div>
<!-- back BUTTON -->
<div class="back-section">
    <a href="my_orders.php" class="back-btn">Back</a>
</div>
<div class="footer">
         © 2026 YT Mover. All Rights Reserved.
    </div>
</body>
</html>