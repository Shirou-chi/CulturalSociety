<?php

session_start();

unset($_SESSION['loginData']);
unset($_SESSION['password']);
unset($_SESSION['userid']);

echo"<script>window.location.href = 'homepage.php'; </script>";

