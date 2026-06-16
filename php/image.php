<?php
session_start();
require_once('connect.php');

$img = $_FILES["input-image"];
$imgName = $_SESSION['userid'];

$target_dir = "../img/user/";
$target_file = $target_dir . basename($_FILES["input-image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$target_file = $target_dir . $imgName . "." . $imageFileType;

if (file_exists($target_file)) {
    unlink('$target_file');
    uploadFile();
} else {
    // If the file doesn't exist, directly upload the new file
    uploadFile();
}

function uploadFile()
{
    global $target_file, $condb, $img;
    move_uploaded_file($img["tmp_name"], $target_file);
    // Update user's image path in the database
    $q = "UPDATE users SET image_path = '$target_file'
    WHERE 
    userid = '" . $_SESSION['userid'] . "'";
    $result = mysqli_query($condb, $q);

    if ($result) {
        header("location:profile.php");
        exit;
    } else {
        echo "<script>alert('Failed to update database.');</script>";
        echo "<script>window.location.href='profile.php'</script>";
    }
}
