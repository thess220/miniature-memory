<?php
session_start();
$order_id = $_GET['order_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer Feedback | YT Mover</title>

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
    font-size:20px;
}

.container{
    width:420px;
    margin:60px auto;
    background:white;
    padding:30px;
    border-radius:6px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

label{
    font-weight:bold;
}

textarea{
    width:100%;
    height:100px;
    margin-top:10px;
}

select{
    width:100%;
    padding:8px;
    margin-top:10px;
}

button{
    margin-top:20px;
    padding:10px 20px;
    background:black;
    color:white;
    border:none;
    border-radius:4px;
}

.center{
    text-align:center;
}
.back-section{
    text-align: center;
    margin-top: 20px;
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

<h2 class="center">Service Feedback</h2>

<form action="feedback_process.php" method="POST">

<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

<label>Rating</label>

<select name="rating" required>
<option value="5">★★★★★ Excellent</option>
<option value="4">★★★★ Good</option>
<option value="3">★★★ Average</option>
<option value="2">★★ Poor</option>
<option value="1">★ Very Bad</option>
</select>

<br><br>

<label>Comment</label>

<textarea name="comment" placeholder="Write your feedback..."></textarea>

<div class="center">
<button type="submit">Submit Feedback</button>
</div>

</form>

</div>
<div class="back-section">
    <a href="my_orders.php" class="back-btn">Back</a>
</div>
<div class="footer">
© 2026 YT Mover. All Rights Reserved.
</div>
</body>
</html>