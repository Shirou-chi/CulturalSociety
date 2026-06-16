<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assignment/css/adminMenu.css">
</head>

<body>
    <div class="wrapper">
        <?php require_once('checkAdmin.php'); ?>
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
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>

                    </div>
                    <div class="row" style="margin-top: 10%;margin-left:30%">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, Culturanet</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="/Assignment/img/welcomeadmin.jpg" class="img-fluid illustration-img" alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table Element -->

                </div>
            </main>
            <a href="#" class="theme-toggle">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/Assignment/js/adminMenu.js"></script>
</body>

</html>