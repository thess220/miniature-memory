<?php
session_start();
include "db_connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

// Find customer by email
$sql = "SELECT * FROM customer WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    // Verify password
    if (password_verify($password, $row['password'])) {

        // Set session
        $_SESSION['customer_id'] = $row['customer_id'];
        $_SESSION['customer_name'] = $row['name'];

        // Redirect to dashboard
        header("Location: customer_dashboard.php");
        exit();
    //Pop up message
    } else {
        echo "<script>
                alert('Incorrect password!');
                window.location.href='login.php';
              </script>";

    }

} else {
    //Pop up message
    echo "<script>
            alert('Customer account not found!');
            window.location.href='login.php';
          </script>";
}
?>
