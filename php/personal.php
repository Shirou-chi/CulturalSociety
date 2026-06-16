<?php
session_start();
require_once('connect.php');


$email = mysqli_real_escape_string($condb, $_POST['emailProfile']);
$fName = mysqli_real_escape_string($condb, $_POST['fNameProfile']);
$lName = mysqli_real_escape_string($condb, $_POST['lNameProfile']);
$phone = mysqli_real_escape_string($condb, $_POST['phoneProfile']);
$birth = mysqli_real_escape_string($condb, $_POST['birthProfile']);

$updateQuery = "UPDATE users 
SET 
email='$email', 
first_name='$fName', 
last_name='$lName', 
phone = '$phone', 
birthday = '$birth'
WHERE username='" . $_SESSION['loginData'] . "'";
$result = mysqli_query($condb, $updateQuery);




header("Location: profile.php");
