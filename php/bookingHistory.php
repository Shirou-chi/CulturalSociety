<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ticket History</title>
    <link rel="stylesheet" href="/Assignment/css/bookingHistory.css">
    <link rel="stylesheet" href="/Assignment/css/print.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&family=Dancing+Script:wght@400..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <?php
    require_once('navbar.php');
    require_once('connect.php');
    ?>
</head>

<body>
    <br><br>
    <h1>Booked Ticket History</h1>
    <div class="bok-container">

        <div class="ticket-history">
            <?php
            $userid = $_SESSION['userid'];
            $sql = "SELECT * FROM bookingList WHERE user_id = $userid";
            $result = mysqli_query($condb, $sql);
            $found = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $found++;
            ?>
                <div class="ticket">
                    <div class="ticket-info">
                        <h3>Booking Reference: #<?php echo $row['booking_id']; ?></h3>
                        <p>Date: <?php echo $row['booking_date']; ?></p>
                    </div>
                    <div class="ticket-actions">
                        <a href="bookingHistory.php?event_id=<?php echo $row['event_id']; ?>">View Details</a>
                        <a href="print.php?booking_id=<?php echo $row['booking_id']; ?>" target="_blank">Print Ticket</a>
                    </div>
                </div>
            <?php
            }
            if ($found == 0) {
            ?>
                <h3 style="color:red">No booking history found!</h3>
            <?php
            }
            ?>
        </div>
    </div>
    <br><br>
    <?php
    require_once('footer.php') ?>
    <?php
    // Check if event ID is provided in URL
    if (isset($_GET['event_id'])) {
        // Assuming $condb is your database connection
        $eventId = $_GET['event_id'];
        $sql = "SELECT * FROM events_table WHERE event_id = $eventId";
        $result = mysqli_query($condb, $sql);
        $row = mysqli_fetch_assoc($result);
        // Check if the event exists
        if ($row) {
            // Event details found, display section
    ?>

            <div id="backdrop"></div>

            <div class="contentEvents" id="contentEvents" style="display: block;">
                <a href="/Assignment/php/bookingHistory.php"><ion-icon name="backspace" class="exitEventDescButton"></ion-icon></a>
                <div class="eventAlign">

                    <div class="eventContentLeft">

                        <div class="slider-container">

                            <div class="slider">

                                <div class="slide">
                                    <img src="<?php echo $row["image_path"]; ?>" alt="<?php echo $row["event_name"]; ?>" class="imageSlider">
                                </div>

                            </div>


                        </div>

                        <div class="descriptionContent">
                            <p>
                                <?php echo $row['event_fullDes']; ?>
                            </p>

                        </div>

                    </div>

                    <div class="eventContentRight">
                        <h2 style="text-decoration: underline; text-align: center;margin-top:5%">
                            <?php echo $row['event_name']; ?>
                        </h2>
                        <div class="contentForm">
                            <form action="" id="contentForm">

                                <label for="timeEvent">TIME : </label>
                                <input type="text" id="timeEvent" class="timeEvent" name="timeEvent" value="<?php echo $row['event_time']; ?>"><br>

                                <label for="dateEvent">DATE : </label>
                                <input type="text" id="dateEvent" class="dateEvent" name="dateEvent" value="<?php echo $row['event_date']; ?>"><br>

                                <label for="contantEvent">CATEGORY : </label>
                                <input type="text" id="contantEvent" class="contantEvent" name="contantEvent" value="<?php echo $row['category']; ?>"><br>

                                <label for="priceEvent">TICKET PRICE : </label>
                                <input type="text" id="priceEvent" class="priceEvent" name="priceEvent" value="<?php echo $row['price']; ?>"><br>

                                <label for="remainTicketEvent">REMAINING TICKET : </label>
                                <input type="text" id="remainTicketEvent" class="remainTicketEvent" name="remainTicketEvent" value="<?php echo $row['available_tickets']; ?>">

                            </form>

                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            // Event not found
            echo "<p>Event not found.</p>";
        }
    }
    ?>


</body>

</html>