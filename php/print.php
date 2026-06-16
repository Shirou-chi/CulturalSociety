<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Print ticket</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/Assignment/css/print.css">
  <?php
  require_once('connect.php');
  ?>
</head>

<body>
  <?php
  // Check if event ID is provided in URL
  if (isset($_GET['booking_id'])) {
    // Assuming $condb is your database connection
    $bookID = $_GET['booking_id'];
    $sql = "SELECT * FROM bookinglist WHERE booking_id = $bookID";
    $result = mysqli_query($condb, $sql);
    $row = mysqli_fetch_assoc($result);
    $event_id = $row['event_id'];

    $event = "SELECT * FROM events_table WHERE event_id = $event_id";
    $eventResult = mysqli_query($condb, $event);
    $yuanshen =  mysqli_fetch_assoc($eventResult);

    // Check if the event exists
    if ($row) {
      // Event details found, display section
  ?>
      <section class="container">
        <div class="row">
          <article class="card fl-left">
            <section class="date">
              <time datetime="23th feb">
                <span><?php echo date('d', strtotime($yuanshen['event_date'])); ?></span>
                <span><?php echo date('M', strtotime($yuanshen['event_date'])); ?></span>
              </time>
            </section>
            <section class="card-cont">
              <small>USER ID:<?php echo $row['user_id']; ?></small>
              <h3><?php echo $yuanshen['event_name']; ?></h3>
              <div class="even-date">
                <i class="fa fa-calendar"></i>
                <time>
                  <span><?php echo $yuanshen['event_date']; ?></span>
                  <span><?php echo $yuanshen['event_time']; ?></span>
                </time>
              </div>
              <div class="even-info">
                <i class="fa fa-map-marker"></i>
                <p>
                  <?php echo $row['totalPrice'];?> CC
                </p>
              </div>
              <button onclick="printTicket()">Print</button>
            </section>
          </article>
        </div>
      </section>
  <?php
    } else {
      // Event not found
      echo "<p>Event not found.</p>";
    }
  }
  ?>
  <script>
    function printTicket() {
      window.print();
    }
  </script>

</body>

</html>