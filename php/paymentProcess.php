<!DOCTYPE html>
<html>

<?php
include ("connect.php");
include ("preloader.php");
?>

<head>
    <title>Payment Process</title>
    <link rel="stylesheet" href="/Assignment/css/paymentProcess.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if (isset($_POST['hiddenBalance'])) {
        $updatedCoin = $_POST['hiddenBalance'];
        $userid = $_POST['userid'];

        $updateUserBalanceQuery = "UPDATE users SET `c-coin` = '$updatedCoin' WHERE userid = '$userid'";
        mysqli_query($condb, $updateUserBalanceQuery);
    }

    if (isset($_POST['event_id']) && isset($_POST['quantity'])) {
        $eventId = $_POST['event_id'];
        $quantity = $_POST['quantity'];

        $updateEventTicketsQuery = "UPDATE events_table SET available_tickets = available_tickets - $quantity WHERE event_id = $eventId";
        mysqli_query($condb, $updateEventTicketsQuery);
    }

    if (isset($_POST['event_id'], $_POST['quantity'], $_POST['totalPrice'], $_POST['userid'])) {
        $eventId = $_POST['event_id'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];
        $userid = $_POST['userid'];
        $totalPrice = floatval($totalPrice);

        $insertBookingQuery = "INSERT INTO bookingList (event_id, user_id, quantity, totalPrice) VALUES ($eventId, $userid, $quantity, $totalPrice)";
        mysqli_query($condb, $insertBookingQuery);
    }

    echo "<script>alert('Payment processed successfully!')</script>";
    echo "<script>window.location.href='event.php'</script>";
}
?>



<body>
    <?php
    session_start();

    if (!isset($_SESSION["loginData"])) {

        echo "<script>alert('You need to login first')</script>";
        echo "<script>window.location.href='user_form.php';</script>";
    }

    $data = "SELECT * FROM users
    WHERE
    username = '" . $_SESSION['loginData'] . "'
    or
    email = '" . $_SESSION['loginData'] . "'";

    $d = mysqli_query($condb, $data);

    if (mysqli_num_rows($d) > 0) {
        $b = mysqli_fetch_array($d);
    }

    if (isset($_GET['event_id'])) {
        // Assuming $condb is your database connection
        $eventId = $_GET['event_id'];
        $quantity = $_GET['quantity'];
        $tPrice = $_GET['totalPrice'];
        $sql = "SELECT * FROM events_table WHERE event_id = $eventId";
        $result = mysqli_query($condb, $sql);
        $row = mysqli_fetch_assoc($result);
        // Check if the event exists
        if ($row) {
            // Event details found, display section
            ?>
            <div class="container">
                <form action="#" method="post">
                    <a href="/Assignment/php/confirmPurchase.php"><ion-icon name="backspace" class="exit"></ion-icon></a>
                    <h1>Confirm Your Payment</h1>
                    <div class="first-row">
                        <div class="username">
                            <h3>Username</h3>
                            <div class="input-field">
                                <input type="text" name="username" value="<?php echo $b['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="userid">
                            <h3>User ID</h3>
                            <div class="input-field">
                                <input type="text" name="userid" value="<?php echo $b['userid']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="eventName">
                        <h3>Original C-COIN</h3>
                        <div class="input-field">
                            <input type="text" name="c-coin" value="<?php echo $b['c-coin']; ?> CC" readonly>
                        </div>
                    </div>
                    <div class="second-row">
                        <div class="eventName">
                            <h3>Event Name</h3>
                            <div class="input-field">
                                <input type="hidden" id="eventid" name="event_id" value="<?php echo $row['event_id']; ?>">
                                <input type="text" name="event_name" value="<?php echo $row['event_name']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="third-row">
                        <div class="quantity">
                            <h3>Quantity</h3>
                            <div class="input-field">
                                <input type="text" name="quantity" value="<?php echo $quantity; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="quard-row">
                        <div class="totalPrice">
                            <h3>Total Price</h3>
                            <div class="input-field">
                                <input type="text" id="totalPrice" name="totalPrice" value="<?php echo $tPrice; ?> CC">
                            </div>
                        </div>
                    </div>
                    <div class="balance">
                        <h3>Balance C-Coin</h3>
                        <div class="input-field">
                            <span id="balance"><?php echo $b['c-coin']; ?> CC</span>
                        </div>
                    </div>
                    <input type="hidden" id="hiddenBalance" name="hiddenBalance">

                    <button type="submit">Confirm</button>
                </form>
            </div>
            <?php
        } else {
            // Event not found
            echo "<p>Event not found.</p>";
        }
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            updateReceipt();

            var balance = document.getElementById("hiddenBalance").value;

            if (balance < 0) {
                alert("Not enough C-COIN for payment.");
                window.location.href = "evnt.php";
            }
        });

        function updateReceipt() {
            var originalCoin = <?php echo $b['c-coin']; ?>;
            var totalPrice = parseInt(document.getElementById("totalPrice").value);
            var updatedCoin = originalCoin - totalPrice;
            updatedCoin = updatedCoin.toFixed(2);
            document.getElementById("balance").textContent = updatedCoin + " CC";
            document.getElementById("hiddenBalance").value = updatedCoin;
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>