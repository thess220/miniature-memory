<?php 
session_start();
include "db_connect.php";//database connection

$email = $_POST['email'];
$password = $_POST['password'];

//Find admin by email
$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    //Verify password
    if (password_verify($password, $row['password'])) {

        //set session
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['name'];

        //Redirect to dashboard
        header("Location: admin_dashboard.php");
        exit();

    } else {

        echo "<script>
                alert('Incorrect password!');
                window.location.href='admin_login.php';
              </script>";
    }

} else {

    echo "<script>
            alert('Admin account not found!');
            window.location.href='admin_login.php';
          </script>";

}
?>
