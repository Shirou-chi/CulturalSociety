<?php

if (isset($_GET['admin_id'])) {
    include("connect.php"); 
    $adminId = $_GET['admin_id'];
    $sql = "DELETE FROM admin WHERE admin_id = $adminId";

    if (mysqli_query($condb, $sql)) {    
        header("Location: adminList.php");
    } else {
        echo "<script>alert('Admin not found.'); window.location.href='adminList.php';</script>";
    }
} else {
    echo "<script>alert('Admin ID not provided.'); window.location.href='adminList.php';</script>";
}

