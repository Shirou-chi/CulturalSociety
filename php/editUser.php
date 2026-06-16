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
    <?php require_once ('checkAdmin.php');
    require_once ('connect.php'); ?>
</head>
<?php
if (isset($_GET['userid'])) {
    $userId = $_GET['userid'];
    $sql = "SELECT * FROM users WHERE userid = $userId";
    $result = mysqli_query($condb, $sql);
    $row = mysqli_fetch_assoc($result);
    // Check if the event exists
    if ($row) {
        // Event details found, display section

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $username = mysqli_real_escape_string($condb, $_POST['username']);
            $password = mysqli_real_escape_string($condb, $_POST['password']);
            $email = mysqli_real_escape_string($condb, $_POST['email']);

            // Update data in the database
            $updateSql = "UPDATE users SET 
            username = '$username', 
            pass = '$password', 
            email = '$email' 
            WHERE userid = $userId";

            if (mysqli_query($condb, $updateSql)) {
                header("Location: userList.php");
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

                                <form action="#" method="post" class="container">

                                    <div class="right">
                                        <div class="upper">

                                            <div class="nameAddAdmin">
                                                <label for="nameAddAdmin" style="font-size:17px;">USERNAME :</label><br>
                                                <input type="text" id="nameAddAdmin" name="username"
                                                    value="<?php echo $row["username"] ?>" placeholder="Enter Username">
                                            </div>

                                            <div class="passAddAdmin">
                                                <label for="passAddAdmin" style="font-size:17px;">PASSWORD :</label><br>
                                                <input type="password" id="passAddAdmin" name="password"
                                                    value="<?php echo $row["pass"] ?>" placeholder="Enter Password">
                                            </div>


                                            <div class="emailAddAdmin">
                                                <label for="emailAddAdmin" style="font-size:17px;">EMAIL :</label><br>
                                                <input type="email" id="emailAddAdmin" name="email"
                                                    value="<?php echo $row["email"] ?>" placeholder="Enter Email">
                                            </div>


                                            <input type="submit" id="addAdminBtn" value="Confirm Edit">
                                        </div>

                                    </div>
                                </form>
                                <?php
    } else {
        // Event not found
        echo "<p>Admin not found.</p>";
    }
}
?>

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="/Assignment/js/adminMenu.js"></script>
</body>

</html>


</body>

</html>