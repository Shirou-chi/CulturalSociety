<?php
include('connect.php');
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];


    $q = "SELECT * FROM admin 
    WHERE username = '$username' 
    AND 
    password = '$pass'";
    $result = mysqli_query($condb, $q);

    if (mysqli_num_rows($result) == 1) {
        $m = mysqli_fetch_array($result);

        $_SESSION['adminId'] = $m['admin_id'];
        echo "<script>alert('Welcome,{$username}!\\nYou will be redirected to the admin page.')</script>";
        echo "<script>window.location.href='adminMenu.php';</script>";
    } else {
        echo "<script>alert('Please enter your details correctly.')</script>";
        echo "<script>window.location.href='admin_login.php';</script>";
    }
} else {
    echo "<script>alert('Please enter both admin ID and password.')</script>";
    echo "<script>window.location.href='admin_login.php';</script>";
}
