<?php
    session_start();

    if (!isset($_SESSION["adminId"])) {

    echo "<script>
        alert('You need to login first')
    </script>";
    echo "<script>
        window.location.href = 'admin_login.php';
    </script>";
    }
