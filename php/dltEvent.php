<?php

if (isset($_GET['event_id'])) {
    include("connect.php"); 
    $eventId = $_GET['event_id'];
    $sql = "DELETE FROM events_table WHERE event_id = $eventId";

    if (mysqli_query($condb, $sql)) {    
        header("Location: eventList.php");
    } else {
        echo "<script>alert('Event not found.'); window.location.href='eventList.php';</script>";
    }
} else {
    echo "<script>alert('Event ID not provided.'); window.location.href='eventList.php';</script>";
}

