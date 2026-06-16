<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/Assignment/css/user_form.css">
    <title>User Form</title>
    <?php
    include("preloader.php");
    include("navbar.php");
    ?>
</head>



<body>
    <div class="user-form" id="user-form">
        <div class="form-container sign-up-container">

            <form id="signUpForm" action="user_register.php" method="post">
                <h1>Create Account</h1>
                <br>
                <input type="text" placeholder="First Name" name="fName">
                <input type="text" placeholder="Last Name" name="lName">
                <input type="text" placeholder="Username" name="username">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="pass">
                <button>Sign Up</button>
                <a href="#" id="showSignIn">Sign In</a>
            </form>

        </div>

        <div class="form-container sign-in-container">

            <form id="loginForm" action="user_login.php" method="post">
                <h1>Sign in</h1>
                <br><br>
                <input type="text" placeholder="Email/Username" name="loginData">
                <input type="password" placeholder="Password" name="pass">
                <div class="text">
                    <a href="#">Forgot your password?</a>
                    <a href="#" id="showSignUp">Sign Up</a>
                </div>

                <button>Sign In</button>

            </form>
        </div>

        <div class="overlay-container">

            <div class="overlay">

                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>

                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>

            </div>

        </div>

    </div>

    <script src="/Assignment/js/user_form.js"></script>
</body>

</html>