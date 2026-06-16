<!DOCTYPE html>
<html>

<?php
include("connect.php");
include("preloader.php");
?>

<head>
    <title>Confirm Purchase</title>
    <link rel="stylesheet" href="/Assignment/css/confirmPurchase.css">
</head>

<body>
    <?php
    if (isset($_GET['event_id'])) {
        // Assuming $condb is your database connection
        $eventId = $_GET['event_id'];
        $sql = "SELECT * FROM events_table WHERE event_id = $eventId";
        $result = mysqli_query($condb, $sql);
        $row = mysqli_fetch_assoc($result);
        // Check if the event exists
        if ($row) {
            // Event details found, display section
    ?>
            <div class="confirm">
                <a href="/Assignment/php/event.php"><ion-icon name="backspace" class="exit"></ion-icon></a>
                <div class="title">Confirm Purchase</div>
                <div class="content">
                    <form action="/Assignment/php/paymentProcess.php" id="contentForm" method="get">
                        <input type="hidden" id="event_id" name="event_id" value="<?php echo $eventId; ?>">

                        <label for="nameEvent">NAME : </label>
                        <input type="text" id="nameEvent" class="nameEvent" name="nameEvent" value="<?php echo $row['event_name']; ?>"><br>

                        <label for="timeEvent">TIME : </label>
                        <input type="text" id="timeEvent" class="timeEvent" name="timeEvent" value="<?php echo $row['event_time']; ?>"><br>

                        <label for="dateEvent">DATE : </label>
                        <input type="text" id="dateEvent" class="dateEvent" name="dateEvent" value="<?php echo $row['event_date']; ?>"><br>

                        <label for="contantEvent">CATEGORY : </label>
                        <input type="text" id="contantEvent" class="contantEvent" name="contantEvent" value="<?php echo $row['category']; ?>"><br>

                        <label for="priceEvent">TICKET PRICE : </label>
                        <input type="text" id="priceEvent" class="priceEvent" name="priceEvent" value="<?php echo $row['price']; ?>"><br>

                        <label for="remainTicketEvent">REMAINING TICKET : </label>
                        <input type="text" id="remainTicketEvent" class="remainTicketEvent" name="remainTicketEvent" value="<?php echo $row['available_tickets']; ?>"><br>

                        <p class="quantity-label">QUANTITY</p>
                        <div class="quantity-wrapper">
                            <span class="minus">-</span>
                            <span class="num">00</span>
                            <span class="plus">+</span>
                        </div>
                        <p id="error-msg" style="color: red; display: none;">Exceeds available tickets limit!</p>
                        <input type="hidden" id="quantityInput" name="quantity" value="00">
                        <div class="total-price">
                            <label for="totalPrice">TOTAL PRICE : CC</label>
                            <input type="text" id="totalPrice" class="totalPrice" name="totalPrice" value=""><br>
                        </div>

                        <div class="buyNow">
                            <input type="submit" value="BUY NOW" class="buyNow" id="buyNow" disabled></a>
                        </div>
                    </form>


                </div>
            </div>
    <?php
        } else {
            // Event not found
            echo "<p>Event not found.</p>";
        }
    }
    ?>


    <script>
        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num"),
            remainTicket = document.getElementById("remainTicketEvent"),
            errorMsg = document.getElementById("error-msg"),
            buyNowButton = document.getElementById("buyNow");
        total = document.getElementById("totalPrice");

        let a = 0;
        plus.addEventListener("click", () => {
            if (a < <?php echo $row['available_tickets']; ?>) {
                a++;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
                updateRemainingTickets();
                updateTotalPrices();
                errorMsg.style.display = "none";
                buyNowButton.disabled = false;
                quantityInput.value = a;
            } else {
                errorMsg.style.display = "block";
                buyNowButton.disabled = true;
            }
        });
        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                a = (a < 10) ? "0" + a : a;
                num.innerText = a;
                updateRemainingTickets();
                updateTotalPrices();
                errorMsg.style.display = "none";
                buyNowButton.disabled = false;
                quantityInput.value = a;
            }
        });

        function updateRemainingTickets() {
            const availableTickets = parseInt(<?php echo $row['available_tickets']; ?>);
            const selectedQuantity = parseInt(num.innerText);
            const remainingTickets = availableTickets - selectedQuantity;
            remainTicket.value = remainingTickets;
        }

        function updateTotalPrices() {
            const ticketPrice = parseInt(<?php echo $row['price']; ?>);
            const selectedQuantity = parseInt(num.innerText);
            const totalPrice = ticketPrice * selectedQuantity;
            total.value = totalPrice;
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>