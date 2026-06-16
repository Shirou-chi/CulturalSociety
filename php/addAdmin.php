<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assignment/css/adminAddAdmin.css">
    <?php require_once('checkAdmin.php'); ?>
</head>
<?php

require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($condb, $_POST['username']);
    $pass = mysqli_real_escape_string($condb, $_POST['password']);
    $email = mysqli_real_escape_string($condb, $_POST['email']);




    $sql = "INSERT INTO admin (username,password,email)
            VALUES ('$name','$pass','$email')";

    if (mysqli_query($condb, $sql)) {
        header("Location: adminList.php");
        exit();
    }
}
?>

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
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <ion-icon name="sunny-outline" class="sun-icon"></ion-icon>
            </a>

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Add Admin
                            </h5>
                        </div>
                        <form action="#" method="post" class="container" id="addAdminForm">

                            <div class="card-body">

                                <div class="right">
                                    <div class="upper">

                                        <div class="nameAddAdmin">
                                            <label for="nameAddAdmin" style="font-size:17px;">USERNAME :</label><br>
                                            <input type="text" id="nameAddAdmin" name="username" placeholder="Enter Username">
                                        </div>

                                        <div class="passAddAdmin">
                                            <label for="passAddAdmin" style="font-size:17px;">PASSWORD :</label><br>
                                            <input type="password" id="passAddAdmin" name="password" placeholder="Enter Password">
                                        </div>

                                        <div class="emailAddAdmin">
                                            <label for="emailAddAdmin" style="font-size:17px;">EMAIL :</label><br>
                                            <input type="email" id="emailAddAdmin" name="email" placeholder="Enter Email">
                                        </div>

                                        <input type="submit" id="addAdminBtn" value="ADD ADMIN">
                                    </div>

                        </form>

                    </div>
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

    <script>
        document.getElementById("addAdminForm").addEventListener("submit", function(event) {
            // Prevent form submission
            event.preventDefault();

            // Get form values
            var username = document.getElementById("nameAddAdmin").value;
            var password = document.getElementById("passAddAdmin").value;
            var email = document.getElementById("emailAddAdmin").value;

            // Validation
            if (username.trim() === "") {
                alert("Please enter username");
                return;
            }
            if (password.trim() === "") {
                alert("Please enter password");
                return;
            }
            if (email.trim() === "") {
                alert("Please enter email");
                return;
            }

            // If all inputs are valid, submit the form
            document.getElementById("addAdminForm").submit();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/Assignment/js/adminMenu.js"></script>

</body>

</html>