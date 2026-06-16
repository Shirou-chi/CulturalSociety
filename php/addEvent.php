<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Add Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assignment/css/adminAddEvent.css">
    <?php require_once ('checkAdmin.php');
    require_once ('connect.php'); ?>
    <style>
        label.input-image {
            display: none;
        }

        input#input-image {
            display: none;
        }

        .profile_pic {
            border-radius: 50%;
            width: 140px;
            height: 140px;
            margin-top: 0;
            margin-left: 140px;
            position: relative;
        }

        .profile_pic:hover {
            filter: brightness(85%);
            cursor: pointer;
        }
    </style>

</head>
<?php
// Assuming you have a database connection established already

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($condb, $_POST['eventTitle']);
    $time = $_POST['time'];
    $date = $_POST['date'];
    $ticketPrice = $_POST['ticket-price'];
    $ticketAmount = $_POST['ticket-amount'];
    $dueDate = $_POST['due-date'];
    $short = mysqli_real_escape_string($condb, $_POST['short-des']);
    $full = mysqli_real_escape_string($condb, $_POST['full-des']);
    $category = $_POST['category'];

    if (isset($_FILES["input-image"])) {
        $img = $_FILES["input-image"];
        $imgName = '';

        $sql = "SELECT MAX(event_id) AS max_event_id FROM events_table";
        $result = mysqli_query($condb, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row && isset($row['max_event_id'])) {
            $imgName = $row['max_event_id'] + 1;
        } else {
            $imgName = 1;
        }

        $target_dir = "../img/event/";
        $target_file = $target_dir . basename($_FILES["input-image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $target_file = $target_dir . $imgName . "." . $imageFileType;

        if (file_exists($target_file)) {
            unlink($target_file);
        }

        move_uploaded_file($img["tmp_name"], $target_file);
    } else {
        echo "No file uploaded.";
    }

    $sql = "INSERT INTO events_table (event_name, event_description, event_fullDes, event_date, event_time, due_date, price, available_tickets,category,image_path)
            VALUES ('$name','$short', '$full', '$date','$time','$dueDate', '$ticketPrice', '$ticketAmount' ,'$category','$target_file')";

    if (mysqli_query($condb, $sql)) {
        header("Location: eventList.php");
        exit();
    }
}
?>

<body>
    <div class="wrapper">
        <?php require_once ('adminNav.php') ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="/Assignment/img/profileTest.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="adminLogout.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <a href="#" class="theme-toggle" style="position:absolute">
                <i class="fa-regular fa-moon"></i>
                <ion-icon name="sunny-outline" class="sun-icon"></ion-icon>
            </a>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Add Event
                            </h5>
                        </div>
                        <form action="#" method="post" class="container" id="addEvent" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="alignmentLeft">

                                    <div class="upper">
                                        <img src="\Assignment\img\profile.jpg" alt="Profile" class="profile_pic"
                                            id="profile-pic">
                                        <label for="input-image" class="input-image">Update Image</label>
                                        <input type="file" accept="image/jpg, image/jpeg, image/png" id="input-image"
                                            name="input-image">

                                    </div>

                                    <div class="lower">
                                        <h4 style="margin-left:5.5%; margin-top:8%;">Short Description</h4>
                                        <textarea id="description" name="short-des"
                                            style="margin-left:5.5%; margin-top:0.5%;"></textarea>

                                        <h4 style="margin-left:5.5%; margin-top:10%;">Long Description</h4>
                                        <textarea id="description2" name="full-des"
                                            style="margin-left:5.5%; margin-top:0.5%;"></textarea>
                                    </div>
                                </div>

                                <div class="alignmentRight">

                                    <input type="text" id="eventTitle" name="eventTitle" placeholder="Event Title"><br>
                                    <!-- Corrected field name -->

                                    <div class="timeEvent">
                                        <label for="timeEvent" style="font-size:17px;">TIME :</label><br>
                                        <input type="time" id="timeEvent" name="time">
                                    </div>

                                    <div class="dateEvent">
                                        <label for="dateEvent" style="font-size:17px;">DATE :</label><br>
                                        <input type="date" id="dateEvent" name="date" onchange="calculateDueDate()">
                                    </div>

                                    <div class="priceEvent">
                                        <label for="priceEvent" style="font-size:17px;">PRICE :</label><br>
                                        <input type="text" id="priceEvent" name="ticket-price"
                                            placeholder="Enter Ticket Price">
                                    </div>

                                    <div class="availableEvent">
                                        <label for="availableEvent" style="font-size:17px;">AVAILABLE TICKET
                                            :</label><br>
                                        <input type="text" id="availableEvent" name="ticket-amount"
                                            placeholder="Enter the amount of ticket">
                                    </div>

                                    <div class="dueEvent">
                                        <label for="dueEvent" style="font-size:17px;">DUE DATE :</label><br>
                                        <input type="date" id="dueEvent" name="dueEvent" readonly>
                                    </div>

                                    <div class="categoryEvent">
                                        <label for="categoryEvent" style="font-size:17px;">CATEGORY :</label><br>
                                        <input type="text" id="categoryEvent" name="category"
                                            placeholder="Enter the event category">
                                    </div>
                                    
                                    <input type="submit" id="addEventBtn" value="ADD EVENT">

                                </div>
                        </form>
                    </div>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-14 text-end">
                            <p class="mb-0">
                                <strong>Culturanet</strong>
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let profilePic = document.getElementById("profile-pic");
            let inputImg = document.getElementById("input-image");
            let imageLabel = document.getElementById("image-label");

            profilePic.onclick = function () {
                inputImg.click();
            };

            inputImg.onchange = function () {
                profilePic.src = URL.createObjectURL(inputImg.files[0]);
                console.log(inputImg.files[0]);
            };

            const addEvent = document.getElementById('addEvent');

            addEvent.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the form from submitting

                // Validate the form inputs
                const title = addEvent.querySelector('input[name="eventTitle"]');
                const short = addEvent.querySelector('textarea[name="short-des"]');
                const full = addEvent.querySelector('textarea[name="full-des"]');
                const date = addEvent.querySelector('input[name="date"]');
                const time = addEvent.querySelector('input[name="time"]');
                const price = addEvent.querySelector('input[name="ticket-price"]');
                const ticket = addEvent.querySelector('input[name="ticket-amount"]');
                const category = addEvent.querySelector('input[name="category"]');
                const validCategories = ["music", "art", "heritage", "cuisine", "fashion", "dance"];

                if (title.value.trim() === '') {
                    alert('Please fill event title');
                    return;
                }

                if (short.value.trim() === '') {
                    alert('Please fill short description');
                    return;
                }

                if (full.value.trim() === '') {
                    alert('Please fill full description');
                    return;
                }

                if (date.value.trim() === '') {
                    alert('Please fill date');
                    return;
                }

                if (time.value.trim() === '') {
                    alert('Please fill time');
                    return;
                }

                if (price.value.trim() === '') {
                    alert('Please fill ticket price');
                    return;
                }

                if (price.value.trim() < 5) {
                    alert('Ticket price must at least 5');
                    return;
                }

                if (ticket.value.trim() === '') {
                    alert('Please fill available ticket');
                    return;
                }

                if (ticket.value.trim() < 100) {
                    alert('Available ticket at least 100');
                    return;
                }

                if (category.value.trim() === '') {
                    alert('Please fill category');
                    return;
                }


                if (!validCategories.includes(category.value.trim())) {
                    alert('Invalid category value. Please choose one of the following categories: ' + validCategories.join(', '));
                    return;
                }

                addEvent.submit();
            });


        });



        function calculateDueDate() {
            var eventDate = new Date(document.getElementById('dateEvent').value);
            var dueDate = new Date(eventDate);
            dueDate.setDate(eventDate.getDate() - 7);

            document.getElementById('dueEvent').value = dueDate.toISOString().split('T')[0];
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/Assignment/js/adminMenu.js"></script>
</body>

</html>