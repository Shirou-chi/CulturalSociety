<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>CULTURANET</title>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link rel="stylesheet" href="/Assignment/css/profile.css">
    <link rel="stylesheet" href="/Assignment/css/mobilePro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
</head>
<?php
session_start();

if (!isset($_SESSION["loginData"])) {

    echo "<script>alert('You need to login first')</script>";
    echo "<script>window.location.href='user_form.php';</script>";
}

require_once('connect.php');
include("preloader.php");
include("navbar.php");

$data = "SELECT * FROM users
    WHERE
    username = '" . $_SESSION['loginData'] . "'
    or
    email = '" . $_SESSION['loginData'] . "'";

$d = mysqli_query($condb, $data);


if (mysqli_num_rows($d) > 0) {
    $b = mysqli_fetch_array($d);
}


$add = "SELECT * FROM useraddress
WHERE
userid = '" . $b['userid'] . "'";

$a = mysqli_query($condb, $add);
if (mysqli_num_rows($a) > 0) {
    $ad = mysqli_fetch_array($a);
}


?>

<body>
    <!-- <div>
        <img src="../img/test/test030.jpg" alt="">
    </div> -->
    <div class="profile_container" id="container">
        <div class="left-section" id="left-section">
            <form action="image.php" method="post" enctype="multipart/form-data">
                <img src="<?php echo isset($b['image_path']) ? $b['image_path'] : "\Assignment\img\profile.jpg" ?>" alt="Profile" class="profile_pic" id="profile-pic">
                <label for="input-image" class="input-image">Update Image</label>
                <input type="file" accept="image/jpg, image/jpeg, image/png" id="input-image" name="input-image">
            </form>

            <br>
            <div class="balanceDiv">
                <label for="accBalance" class="balanceLabel">ACCOUNT BALANCE: </label>
                <input type="text" id="accBalance" class="accBalance" value=" <?php echo $b['c-coin']; ?>" disabled>
            </div>
            <br>
            <h1 class="accMan">Account<br>Management</h1>
            <br>
            <ul class="profileNav">
                <li><a href="#personal" style="color:white;"><ion-icon name="key" style="font-size:20px;"></ion-icon>
                        Personal
                        Information</a></li><br>
                <li><a href="#accountSignIn" style="color:white;"><ion-icon name="log-in" style="font-size:20px;"></ion-icon> Account
                        Sign-In</a></li><br>
                <li><a href="#address" style="color:white;"><ion-icon name="location" style="font-size:20px;"></ion-icon>
                        Address</a></li><br>
                <li><a href="bookingHistory.php" style="color:white;"><ion-icon name="list-circle-outline" style="font-size:20px;"></ion-icon>
                        Booking History</a></li>
            </ul>
            <input type="submit" value="Request Account Deletion" class="removeAcc" id="removeAcc">
        </div>

        <div class="right-section" id="right-section">
            <div class="personal" id="personal">

                <div class="leftPersonal">
                    <p style="font-size: 22px; margin-bottom: 0; margin-top: 10px;"><strong>Personal
                            Information</strong></p>
                    <p style="margin-top: 10px; font-size: 12px;">This information is private and will not be shared
                        with other users. Read the <a href="/Assignment/php/privacy.php" class="privacyPolicy">Privacy
                            Policy</a> anytime!</p>
                </div>

                <div class="rightPersonal">

                    <form action="personal.php" id="personalForm" method="post">

                        <div class="emailDiv">
                            <label for="emailProfile" class="emailLabel">EMAIL ADDRESS</label><br>
                            <input type="email" name="emailProfile" class="emailProfile" id="emailProfile" placeholder="example@gmail.com" value="<?php echo $b['email']; ?>">

                        </div>
                        <br>
                        <div class="personal2">

                            <div class="leftPersonalRow2">

                                <div class="firstNameDiv">
                                    <label for="firstNameProfile" class="firstNameLabel">FIRST NAME</label><br>
                                    <input type="text" class="firstNameProfile" name="fNameProfile" id="firstNameProfile" placeholder="John" value="<?php echo $b['first_name']; ?>">
                                </div>

                                <div class="lastNameDiv">
                                    <label for="lastNameProfile" class="lastNameLabel">LAST NAME</label><br>
                                    <input type="text" class="lastNameProfile" name="lNameProfile" id="lastNameProfile" placeholder="Dwanson" value="<?php echo $b['last_name']; ?>">
                                </div>


                                <br>

                                <div class="regisDiv">
                                    <label for="regisDateProfile" class="regisLabel">REGISTRATION DATE</label><br>
                                    <input type="date" class="regisDateProfile" id="regisDateProfile" value="<?php echo $b['registration_date']; ?>" disabled>
                                </div>

                                <br class="space">
                            </div>
                            <div class="rightPersonalRow2">

                                <div class="countryDiv">
                                    <label for="countryProfile" class="countryLabel">COUNTRY/REGION</label><br>
                                    <input type="text" class="countryProfile" id="countryProfile" placeholder="Country/Region" value="<?php echo $ad['region']; ?>" disabled>
                                </div>

                                <div class="phoneDiv">
                                    <label for="phoneProfile" class="phoneLabel">PHONE NUMBER</label><br>
                                    <input type="tel" class="phoneProfile" name="phoneProfile" id="phoneProfile" placeholder="+60XXXXXXXXX" value="<?php echo $b['phone']; ?>">
                                </div>

                                <br>

                                <div class="birthDiv">
                                    <label for="birthProfile" class="birthLabel">DATE OF BIRTH</label><br>
                                    <input type="date" name="birthProfile" class="birthProfile" id="birthProfile" value="<?php echo $b['birthday']; ?>">

                                </div>

                                <br>
                            </div>
                        </div>
                        <input type="submit" value="Confirm Changes" class="submitPersonal">
                    </form>
                </div>
            </div>

            <div class="accountSignIn" id="accountSignIn">

                <div class="leftAccount">
                    <p style="font-size: 22px; margin-bottom: 0; margin-top: 10px;"><strong>Account Sign-In</strong></p>
                    <p style="margin-top: 10px; font-size: 12px;">We recommend that you periodically update
                        your password to help prevent unauthorised access to your account.</p>
                </div>

                <div class="rightAccount">
                    <form action="account.php" id="accountForm" method="post">
                        <div class="userDiv">
                            <label for="userProfile" class="userLabel">USERNAME</label><br>
                            <input type="text" class="userProfile" name="userProfile" id="userProfile" placeholder="JOHN DWANSON" value="<?php echo $b['username']; ?>" disabled>
                        </div>

                        <p style="margin-left:20px; margin-bottom:0;">Change Password</p>

                        <div class="oldPassDiv">
                            <label for="oldPasswordProfile" class="oldLabel">OLD PASSWORD</label><br>
                            <input type="password" name="oldPass" class="oldPasswordProfile" id="oldPasswordProfile" placeholder="Enter Current Password">
                        </div>

                        <div class="newPassDiv">
                            <label for="newPassProfile" class="newLabel1">NEW PASSWORD</label><br>
                            <input type="password" name="newPass" class="newPassProfile" id="newPassProfile" placeholder="Enter New Password"><br>
                        </div>

                        <div class="newPassDiv2">
                            <label for="newPassProfile2" class="newLabel2">CONFIRM NEW PASSWORD</label><br>
                            <input type="password" name="newPass2" class="newPassProfile2" id="newPassProfile2" placeholder="Confirm New Password">
                        </div>

                        <input type="submit" value="Confirm Changes" class="submitAccount">
                    </form>
                </div>

            </div>

            <div class="address" id="address">

                <div class="leftAddress">
                    <p style="font-size: 22px; margin-bottom: 0; margin-top: 10px;"><strong>Address</strong></p>
                    <p style="margin-top: 10px; font-size: 12px;">We strongly advise you to provide the actual address.
                        In the event of a technical error occurring in our system, we will dispatch the ticket to this
                        address.</p>
                </div>

                <div class="rightAddress">
                    <form action="address.php" id="addressForm" method="post">
                        <div class="addLine1Div">
                            <label for="addLine1" class="line1Label">LINE 1</label><br>
                            <input type="text" id="addLine1" name="addLine1" class="addLine1" placeholder="Detailed Address" value="<?php echo $ad['addressLine1']; ?>">
                        </div>

                        <div class="addLine2Div">
                            <label for="addLine2" class="line2Label">LINE 2</label><br>
                            <input type="text" id="addLine2" name="addLine2" class="addLine2" placeholder="Address Line 2 (Optional)" value="<?php echo $ad['addressLine2']; ?>">
                        </div>

                        <div class="address2">
                            <div class="leftAddRow3">

                                <div class="postalDiv">
                                    <label for="postalCode" class="postalLabel">POSTAL CODE</label><br>
                                    <input type="text" id="postalCode" name="postCode" class="postalCode" placeholder="#####" value="<?php echo $ad['postCode']; ?>">
                                </div>

                                <div class="cityDiv">
                                    <label for="city" class="cityLabel">CITY</label><br>
                                    <input type="text" id="city" name="city" class="city" placeholder="Capital City" value="<?php echo $ad['city']; ?>">
                                </div>

                            </div>

                            <div class="rightAddRow3">

                                <div class="stateDiv">
                                    <label for="state" class="stateLabel">STATE</label>
                                    <input type="text" id="state" name="state" class="state" placeholder="State" value="<?php echo $ad['state']; ?>">
                                </div>

                                <div class="countryDiv2">
                                    <label for="country" class="countryLabel">COUNTRY</label>
                                    <input type="text" id="country" name="country" class="country" placeholder="Country" value="<?php echo $ad['region']; ?>">
                                </div>

                            </div>

                        </div>

                        <input type="submit" value="Confirm Changes" class="submitAddress">
                    </form>
                </div>
            </div>
            <?php
            include("footer.php");
            ?>
        </div>

        <div id="backdrop"></div>


        <div class="popUp" id="popUp">
            <ion-icon name="trash-outline" style="font-size: 40px; border: 1px solid black; border-radius: 20px; margin-top: 10px;"></ion-icon>
            <h3 style="margin-top: 1%;">ARE YOU SURE TO DELETE ACCOUNT?</h3>

            <p style="font-size: 14px;">You'll permanently lose your information such as:</p>
            <ul class="popUpList">
                <li style="list-style-position: inside;"><ion-icon name="person-circle" style="margin-right: 2%;"></ion-icon>Profile</li>
                <li style="list-style-position: inside;"><ion-icon name="mail" style="margin-right: 2%;"></ion-icon>Messages
                </li>
                <li style="list-style-position: inside;"><ion-icon name="images" style="margin-right: 2%;"></ion-icon>Photos
                </li>
            </ul>

            <p style="margin-bottom: 5px; font-size: 14px;">Please enter the information below in order to delete the
                account:</p>

            <form action="#" method="post" onsubmit="return SendOTP(event)">

                <div class="emailDeletionDiv">
                    <label for="emailDeletionProfile" class="emailDeletionLabel">EMAIL ADDRESS:</label><br>
                    <input type="email" name="emailDeletionProfile" class="emailDeletionProfile" id="emailDeletionProfile" placeholder="Enter Email Address" autocomplete="off">
                </div>

                <div class="otpDeletionDiv">
                    <label for="otpDeletionProfile" class="otpDeletionLabel">Enter Code:</label><br>
                    <input type="number" name="otpDeletionProfile" class="otpDeletionProfile" id="otpDeletionProfile" placeholder="Enter OTP" autocomplete="off">
                </div>

                <button class="btn-send-otp" onclick="SendOTP()">Send OTP</button>



                <div class="accountDeletionPasswordDiv">
                    <label for="accountDeletionPassword" class="accountDeletionPasswordLabel">PASSWORD:</label><br>
                    <input type="password" name="accountDeletionPassword" class="accountDeletionPassword" id="accountDeletionPassword" placeholder="Enter Current Password">
                </div>

                <div class="AlignLeftRight">
                    <div class="cancelDeleteButtonDiv" id="cancelDeleteDiv">
                        <input type="button" value="CANCEL" id="cancelDeleteButton">
                    </div>

                    <div class="submitDeleteButtonDiv">
                        <input type="submit" value="VERIFY & SUBMIT" id="submitDeleteButton" class="email-verify">
                    </div>
                </div>

            </form>


        </div>


    </div>


    <script src="/Assignment/js/profile.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


</body>


</html>