<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <Title>Event List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/Assignment/css/adminMenu.css">
  <?php require_once('checkAdmin.php'); ?>
</head>

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
                Event List
              </h5>
              <h6 class="card-subtitle text-muted">
                原来你也玩原神
              </h6>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">C-coin</th>
                    <th scope="col">Registration Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include("connect.php");
                  $sql = "SELECT * FROM users";
                  $result = mysqli_query($condb, $sql);
                  ?>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <th scope="row">
                        <?php echo $row["userid"] ?>
                      </th>
                      <td>
                        <?php echo $row["username"] ?>
                      </td>
                      <td>
                        <?php echo $row["email"] ?>
                      </td>
                      <td>
                        <?php echo $row["pass"] ?>
                      </td>
                      <td>
                        <?php echo $row["phone"] ?>
                      </td>
                      <td>
                        <?php echo $row["c-coin"] ?>
                      </td>
                      <td>
                        <?php echo $row["registration_date"] ?>
                      </td>
                      <td>
                        <button class="control" type="button" data-toggle="modal" data-target="#exampleModal" onclick="window.location.href='/Assignment/php/editUser.php?userid=<?php echo $row['userid']; ?>'">
                          <ion-icon name="create-outline"></ion-icon>
                          </a>
                        </button>
                        <button class="control" type="button" data-toggle="modal" data-target="#exampleModal" onclick="window.location.href='/Assignment/php/userList.php?userid=<?php echo $row['userid']; ?>'">
                          <ion-icon name="trash-outline"></ion-icon>
                        </button>
                      </td>
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
  <?php

  if (isset($_GET['userid'])) {
  ?>
    <!-- Modal -->
    <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block; background-color: rgba(0, 0, 0, 0.5);"">
        <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="container d-flex pl-0">
            <h5 class="modal-title ml-2" id="exampleModalLabel">Delete the user?</h5>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.href='userList.php'">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-muted">If you delete the link it will be gone forever. Are you sure you want to proceed?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" onclick="window.location.href='userList.php'">Cancel</button>
          <button type="button" class="btn btn-danger" onclick="window.location.href='dltUser.php?userid=<?php echo $_GET['userid']; ?>'">Delete</button>
        </div>
      </div>
    </div>
    </div>
  <?php
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="/Assignment/js/adminMenu.js"></script>
</body>

</html>