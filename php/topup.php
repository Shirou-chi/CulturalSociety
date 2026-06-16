<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPUP</title>
    <script src="https://kit.fontawesome.com/bb515311f9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assignment/css/topup.css">
    <?php
    session_start();

    if (!isset($_SESSION["loginData"])) {

        echo "<script>alert('You need to login first')</script>";
        echo "<script>window.location.href='user_form.php';</script>";
    }

    require_once('connect.php');

    $data = "SELECT * FROM users
    WHERE
    username = '" . $_SESSION['loginData'] . "'
    or
    email = '" . $_SESSION['loginData'] . "'";

    $d = mysqli_query($condb, $data);

    if (mysqli_num_rows($d) > 0) {
        $b = mysqli_fetch_array($d);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatedCoin'])) {
        $updatedCoin = floatval($_POST['updatedCoin']);
        $userid = $_SESSION['userid'];

        $updateQuery = "UPDATE users SET `c-coin` = $updatedCoin WHERE userid = '$userid'";
        if (mysqli_query($condb, $updateQuery)) {
            echo "<script>alert('You successfully topped up');</script>";
            echo "<script>window.location.href='profile.php';</script>";
        } else {
            echo "<script>alert('Error updating C-Coin');</script>";
            echo "<script>window.location.href='profile.php';</script>";
        }
    }

    ?>
</head>

<body>
    <div class="checkout-container">
        <div class="left-side">
            <div class="text-box">
                <h1 class="home-heading">C-Coin</h1>
                <p class="home-price"><em>10 CC </em>= 1 MYR</p>
                <hr class="left-hr" />
            </div>
        </div>

        <div class="right-side">
            <p class="home-desc">Enter the amount of Bitcoin you want:</p>
            <input type="number" id="bitcoin-amount" name="bitcoin-amount" min="1" step="1" required onchange="updateReceipt()"/>
            <br>
            <br>
            <hr class="left-hr" />
            <br>
            <div class="receipt">
                <h2 class="receipt-heading">Receipt Summary</h2>
                <div>
                    <table class="table">
                        <tr>
                            <td id="btc-amount">0.00 CC</td>
                            <td class="price" id="btc-price">0.00 MYR</td>
                        </tr>
                        <tr>
                            <td>Discount (10%)</td>
                            <td class="price" id="dis-amount">0.00 MYR</td>
                        </tr>
                        <tr>
                            <td>Tax (6%)</td>
                            <td class="price" id="tax-amount">0.00 MYR</td>
                        </tr>
                        <tr class="total">
                            <td>Total</td>
                            <td class="price" id="total-amount">0.00 MYR</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="receipt">
                <h2 class="receipt-heading">Account Balance</h2>
                <div>
                    <table class="table">
                        <tr>
                            <td>USERNAME</td>
                            <td style="float: right;" class="username" id="username"><?php echo $b['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Original C-Coin</td>
                            <td class="price" id="original-coin"><?php echo $b['c-coin']; ?></td>
                        </tr>
                        <tr>
                            <td>Updated C-Coin</td>
                            <td style="float: right;" class="updated-price" id="updated-coin"><?php echo $b['c-coin']; ?></td>
                        </tr>

                    </table>
                </div>
            </div>

            <div class="payment-info">
                <h3 class="payment-heading">Payment Information</h3>
                <form class="form-box" method="post">
                    <input type="hidden" id="updated-coin-input" name="updatedCoin">
                    <button class="btn" id="payBtn" disabled>
                        <i class="fas fa-credit-card-back"></i> Pay Securely
                    </button>
                </form>


                <p class="footer-text">
                    <i class="fa-solid fa-lock"></i> Your payment information is encrypted
                </p>

                <!-- Cancel button -->
                <button class="btn-cancel" onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Cancel
                </button>
            </div>

        </div>
    </div>

    <script>
        function updateReceipt() {
            var originalCoin = <?php echo $b['c-coin']; ?>;
            var additionalAmount = parseInt(document.getElementById("bitcoin-amount").value);
            var updatedCoin = originalCoin + additionalAmount;
            updatedCoin = updatedCoin.toFixed(2);
            document.getElementById("updated-coin").textContent = updatedCoin;

            document.getElementById("updated-coin-input").value = updatedCoin;
        }
    </script>


    <script src="/Assignment/js/topup.js"> </script>

</body>

</html>