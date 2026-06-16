<head>
  <?php
  include('connect.php');
  if (!isset($_SESSION)) {
    // If session hasn't been started, start it
    session_start();
  }
  ?>
  <link rel="stylesheet" type="text/css" href="/Assignment/css/navbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>

  <!-- mobile version -->

  <nav class="navMobile">
    <ul>
      <li class="list active">
        <a href="homepage.php">
          <span class="title">Home</span>
        </a>
      </li>
      <li class="list">
        <a href="blog.php">
          <span class="title">Blog/Article</span>
        </a>
      </li>
      <li class="list">
        <a href="membership.php">
          <span class="title">Membership</span>
        </a>
      </li>
      <li class="list">
        <a href="event.php">
          <span class="title">Event</span>
        </a>
      </li>
      <?php
      if (isset($_SESSION['loginData'])) {
        $data = "SELECT * FROM users
        WHERE
        username = '" . $_SESSION['loginData'] . "'
        or
        email = '" . $_SESSION['loginData'] . "'";
        $d = mysqli_query($condb, $data);

        if (mysqli_num_rows($d) > 0) {
          $b = mysqli_fetch_array($d);
        }
        echo '<li class="list">
              <a href="profile.php">
                <span class="title">Profile</span>
              </a>
            </li>';
        echo '<li class="list">
              <a href="topup.php">
                <span class="title">Balance: $' . $b['c-coin'] . '</span>
              </a>
            </li>';
        echo '<li class="list">
              <a href="logout.php">
                <span class="title">Logout</span>
              </a>
            </li>';
      } else {
        echo '<li class="list">
              <a href="user_form.php">
                <span class="title">Get Started</span>
              </a>
            </li>';
      }
      ?>
    </ul>
  </nav>

  <div class="toggle">
    <img src="/Assignment/img/menu.png" alt="open" class="open">
    <img src="/Assignment/img/close.png" alt="close" class="close hide" style="  float: left;">
  </div>


  <!-- desktop version -->
  <nav class="navbar-container">
    <header>
      <div class="logo"><img src="/Assignment/img/logoNoBackground.png" alt="logo" width="150px" height="40px"></div>
      <ul class="menu-bar">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="blog.php">Blog/Article</a></li>
        <li><a href="membership.php">Membership</a></li>
        <li>
          <a href="event.php">Event</a>
        </li>
      </ul>
      <div>
        <form id="searchForm" action="event.php" method="GET">
          <input id="searchInput" type="text" name="search" placeholder="Search" class="searchContainer">
          <div class="btn" id="searchButton">
            <ion-icon name="search-outline"></ion-icon>
          </div>
        </form>


        <div class="profile-container">
          <div class="dropdown">
            <?php
            if (isset($_SESSION['loginData'])) {
              $data = "SELECT * FROM users
              WHERE
              username = '" . $_SESSION['loginData'] . "'
              or
              email = '" . $_SESSION['loginData'] . "'";
              $d = mysqli_query($condb, $data);

              if (mysqli_num_rows($d) > 0) {
                $b = mysqli_fetch_array($d);
              }
              echo '<button id="profileButton" class="dropdown-btn"><ion-icon name="person-circle"></ion-icon></button>';
              echo '<div class="dropdown-content">';
              echo '<a href="profile.php">Manage Account</a>';
              echo '<a href="topup.php">Balance: $' . $b['c-coin'] . '<ion-icon name="add-circle-outline"></ion-icon></a>';
              echo '<a href="logout.php">Logout</a>';
              echo '</div>';
            } else {
              echo '<a href="user_form.php"><button class="button">Get Started</button></a>';
            }
            ?>

          </div>
        </div>
      </div>
    </header>
  </nav>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const toggle = document.querySelector('.toggle');
      const openIcon = document.querySelector('.open');
      const closeIcon = document.querySelector('.close');

      toggle.addEventListener('click', function() {
        const navMobile = document.querySelector('.navMobile');
        navMobile.classList.toggle('active');

        toggle.classList.toggle('active');

        openIcon.classList.toggle('hide');
        closeIcon.classList.toggle('hide');
      });
    });


    document.getElementById("searchButton").addEventListener("click", function() {
      var searchTerm = document.getElementById("searchInput").value;
      document.getElementById("searchForm").submit();
    });
  </script>

</body>

</html>
