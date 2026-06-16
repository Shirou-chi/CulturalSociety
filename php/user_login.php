<?php
require_once('connect.php');
session_start();

if (!empty($_POST['loginData']) && !empty($_POST['pass'])) {
    // Escape user input
    $loginData = mysqli_real_escape_string($condb, $_POST['loginData']);
    $pass = mysqli_real_escape_string($condb, $_POST['pass']);

    $q = "SELECT * FROM users
    WHERE
        email = '$loginData' OR
        username = '$loginData'
    AND
        pass = '$pass'";

    $result = mysqli_query($condb, $q);

    if (mysqli_num_rows($result) == 1) {
        $m = mysqli_fetch_array($result);

        $_SESSION['loginData'] = $m['username'];
        $_SESSION['password'] = $m['pass'];
        $_SESSION['userid'] = $m['userid'];

        echo "<script>alert('Welcome, {$_SESSION['loginData']}!\\nYou will be redirected to the homepage.')</script>";
        echo "<script>window.location.href='homepage.php';</script>";
    } else {
        echo "<script>alert('Please enter your details correctly.')</script>";
        echo "<script>window.location.href='user_form.php';</script>";
    }
}
