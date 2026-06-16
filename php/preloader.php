<!DOCTYPE html>
<html>

<head>
    <style>
        .preloader {
            background: url("/Assignment/gif/loading.gif") no-repeat center center;
            background-size: 4;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 9999;
            backdrop-filter: blur(4px);
        }
    </style>
</head>

<body>
    <div class="preloader">

    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        setTimeout(function () {
            document.querySelector(".preloader").style.display = "none";
        }, 700);
    });
</script>

</html>