<?php

session_start();
require_once('connect.php');



$addressLine1 = mysqli_real_escape_string($condb, $_POST['addLine1']);
$addressLine2 = isset($_POST['addLine2']) ? mysqli_real_escape_string($condb, $_POST['addLine2']) : '';
$postCode = mysqli_real_escape_string($condb, $_POST['postCode']);
$city = mysqli_real_escape_string($condb, $_POST['city']);
$state = mysqli_real_escape_string($condb, $_POST['state']);
$region = mysqli_real_escape_string($condb, $_POST['country']);
$userid = $_SESSION['userid'];


$updateQuery = "UPDATE useraddress 
                    SET addressLine1 = '$addressLine1', 
                    addressLine2 = '$addressLine2', 
                        postCode = '$postCode', 
                        city = '$city', 
                        state = '$state', 
                        region = '$region' 
                    WHERE userid = '$userid'";

$result = mysqli_query($condb, $updateQuery);
mysqli_close($condb);
header("Location: profile.php");
