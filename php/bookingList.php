<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Title>Booking List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assignment/css/adminMenu.css">
    <?php require_once('checkAdmin.php'); ?>
</head>


<body>

    <body>
        <div class="wrapper">
            <?php require_once('adminNav.php') ?>

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
                <main class="content px-3 py-2">

                    <div class="container-fluid">


                        <!-- Table Element -->
                        <div class="card border-0">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Booking List
                                </h5>
                                <h6 class="card-subtitle text-muted">
                                    原来你也玩原神
                                </h6>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Booking ID</th>
                                            <th scope="col">Event ID</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Quanity</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Booking Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include("connect.php");
                                        $sql = "SELECT * FROM bookingList";
                                        $result = mysqli_query($condb, $sql);
                                        ?>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["booking_id"] ?></th>
                                                <td><?php echo $row["event_id"] ?></td>
                                                <td><?php echo $row["user_id"] ?></td>
                                                <td><?php echo $row["quantity"] ?></td>
                                                <td><?php echo $row["totalPrice"] ?></td>
                                                <td><?php echo $row["booking_date"] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <a href="#" class="theme-toggle" style="position:absolute">
                    <i class="fa-regular fa-moon"></i>
                    <ion-icon name="sunny-outline" class="sun-icon"></ion-icon>
                </a>
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

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/Assignment/js/adminMenu.js"></script>

</html>