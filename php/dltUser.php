<?php

if (isset($_GET['userid'])) {
    include("connect.php"); 
    $userId = $_GET['userid'];
    $sql = "DELETE FROM users WHERE userid = $userId";

    if (mysqli_query($condb, $sql)) {    
        header("Location: userList.php");
    } else {
        echo "<script>alert('User not found.'); window.location.href='userList.php';</script>";
    }
} else {
    echo "<script>alert('User ID not provided.'); window.location.href='userList.php';</script>";
}

