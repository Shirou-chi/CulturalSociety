<?php

session_start();

unset($_SESSION['adminId']);

echo"<script>window.location.href = 'admin_login.php'; </script>";

