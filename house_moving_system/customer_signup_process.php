<?php
include "db_connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Check password match
if ($password !== $confirm_password) {
    header("Location: customer_signup.php?error=password");
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$check = "SELECT * FROM customer WHERE email = '$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    header("Location: customer_signup.php?error=email");
    exit();
}

// Insert customer
$sql = "INSERT INTO customer (name, email, phone, password)
        VALUES ('$name', '$email', '$phone', '$hashed_password')";

if (mysqli_query($conn, $sql)) {
    header("Location: login.php?msg=registered");
    exit();
} else {
    header("Location: customer_signup.php?error=system");
    exit();
}
?>
