<?php
//make sure admin logged in
session_start();
if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard | YT Mover</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }
        /*Header*/
        .header{
            background:black;
            color:white;
            padding:15px 40px;
            font-size:20px;
            font-weight:bold;
        }
        /*Container*/
        .container{
            width:80%;
            margin:40px auto;
        }
        /*Card Buttons*/
        .card{
            background:white;
            padding:30px;
            margin-bottom:20px;
            border-radius:6px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        .card a{
            text-decoration:none;
            color:black;
            font-size:18px;
        }
        .card:hover{
            background:#eee;
        }
        .logout{
            text-align:center;
            margin-top:30px;
        }
        .logout a{
            background:black;
            color:white;
            padding:10px 20px;
            text-decoration:none;
            border-radius:4px;
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
        <h2>Welcome Admin</h2>
        <p>Manage the house moving system here.</p>

    <div class="card">
        <a href="manage_order.php">Manage Orders</a>
        </div>

    <div class="card">
        <a href="manage_customers.php">Manage Customers</a>
        </div>

    <div class="card">
        <a href="view_feedback.php">View Feedback</a>
        </div>

    <div class="logout">
        <a href="open_site.php">Logout</a>
        </div>

    </div>
    <div class="footer">
    © 2026 YT Mover. All Rights Reserved.
    </div>
    </body>
    </html>