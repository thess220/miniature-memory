<?php
// Start session safely (only once)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .navbar {
            background-color: black;
            color: white;
            padding: 15px 30px;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1>YT Mover</h1>
</div>
