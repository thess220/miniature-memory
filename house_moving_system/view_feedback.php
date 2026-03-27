<?php

session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}
include "db_connect.php";

/* Join tables to get customer name */
$sql = "SELECT feedback.*, customer.name
        FROM feedback
        JOIN orders ON feedback.order_id = orders.order_id
        JOIN customer ON orders.customer_id = customer.customer_id";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>View Feedback | YT Mover</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f4f4f4;
}
.container{
    width:80%;
    margin:40px auto;
}
table{
    width:100%;
    border-collapse:collapse;
    background:white;
}
th,td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}
th{
    background:black;
    color:white;
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
    left:0;
    width:100%;
}

</style>
</head>

<body>

<?php include "header.php"; ?>

<div class="container">

<h2>Customer Feedback</h2>

<table>

<tr>
<th>Feedback ID</th>
<th>Order ID</th>
<th>Customer Name</th>
<th>Rating</th>
<th>Comment</th>
</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

echo "<tr>";

echo "<td>".$row['feedback_id']."</td>";
echo "<td>".$row['order_id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['rating']."</td>";
echo "<td>".$row['comment']."</td>";

echo "</tr>";

}

}else{

echo "<tr><td colspan='5'>No feedback found</td></tr>";

}

?>

</table>

</div>
<div class="back-section">
    <a href="admin_dashboard.php" class="back-btn">Back</a>
</div>
<div class="footer">
© 2026 YT Mover. All Rights Reserved.
</div>

</body>
</html>