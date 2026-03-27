<?php
session_start();
include "db_connect.php";

if(!isset($_SESSION['customer_id'])){
    header("Location: login.php");
    exit();
}
$customer_id = $_SESSION['customer_id'];
$order_id = $_POST['order_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

$sql = "INSERT INTO feedback (order_id, customer_id, rating, comment)
VALUES ('$order_id','$customer_id','$rating','$comment')";

$result = mysqli_query($conn,$sql);

if($result){
    echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href='my_orders.php';
          </script>";
}else{
    echo "Database Error: " . mysqli_error($conn);
}
?>