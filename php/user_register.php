<?php
require_once('connect.php');

if (!empty($_POST)) {
    $fn = mysqli_real_escape_string($condb, $_POST['fName']);
    $ln = mysqli_real_escape_string($condb, $_POST['lName']);
    $user = mysqli_real_escape_string($condb, $_POST['username']);
    $e = mysqli_real_escape_string($condb, $_POST['email']);
    $pass = mysqli_real_escape_string($condb, $_POST['pass']);

    $registration_date = date("Y-m-d");
    $q = "INSERT INTO users (first_name, last_name, username, email, pass, registration_date) 
          VALUES ('$fn', '$ln', '$user', '$e', '$pass', '$registration_date')";
    $result = mysqli_query($condb, $q);

    if ($result) {
        // Retrieve the last inserted userid
        $userid = mysqli_insert_id($condb);

        // Insert a corresponding record into the useraddress table
        $insertAddressQuery = "INSERT INTO useraddress (userid) VALUES ('$userid')";
        mysqli_query($condb, $insertAddressQuery);

        echo "<script>alert('Thank you! You are now registered. You can login now.')</script>";
        echo "<script>window.location.href='user_form.php';</script>";
    } else {
        echo '<h1>System Error</h1>
        <p>You could not be registered due to a system error. We apologize for any inconvenience.</p>';
    }
} else {
    echo "<script>alert('Please enter your details completely.')</script>";
    echo "<script>window.location.href='user_form.php';</script>";
}

mysqli_close($condb);
?>

<script>
    function direct() {
        window.location.href = "user_form.php";
    }
</script>