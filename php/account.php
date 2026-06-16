<?php
session_start();
require_once('connect.php');


$oldPassword = mysqli_real_escape_string($condb, $_POST['oldPass']);
$newPassword = mysqli_real_escape_string($condb, $_POST['newPass']);



if ($oldPassword === $_SESSION['password']) {
    $updateQuery = "UPDATE users SET pass = '$newPassword' WHERE pass = '" . $_SESSION['password'] . "'";
    $result = mysqli_query($condb, $updateQuery);
    if ($result) {
        $_SESSION['password'] = $newPassword;
        header("Location: profile.php");
        exit();
    } else {
        echo "<script>alert('Failed to update password. Please try again.')</script>";
    }
} else {
    echo "<script>alert('Your old password did not match our records.')</script>";
    echo "<script>window.location.href='profile.php'</script>";
}
