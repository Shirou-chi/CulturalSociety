<!DOCTYPE html>
<html>

<head>
    <title>Filter</title>
    <link rel="stylesheet" href="/Assignment/css/filter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <a href="#"><ion-icon name="arrow-undo-circle-outline"></ion-icon></a>
                <button id="filterButton" class="filterButton">
                    <ion-icon name="refresh-outline"
                        style="margin-left:-4%; margin-top:-0.1%;font-size:22px;"></ion-icon> Reset Filter
                </button>
                <p style="font-size:20px;margin-left:11%;margin-top:5%;">Price</p>
                <div class="checkboxes">
                    <label for="checkbox1">
                        <input type="radio" id="checkbox1" name="creditCategory" value="Below 15"> Below CC 15
                    </label><br>
                    <label for="checkbox2">
                        <input type="radio" id="checkbox2" name="creditCategory" value="CC 15 - CC 20"> CC 15 - CC 20
                    </label><br>
                    <label for="checkbox3">
                        <input type="radio" id="checkbox3" name="creditCategory" value="CC 20 - CC 25"> CC 20 - CC 25
                    </label><br>
                    <label for="checkbox4">
                        <input type="radio" id="checkbox4" name="creditCategory" value="CC 25 - CC 30"> CC 25 - CC 30
                    </label><br>
                    <label for="checkbox5">
                        <input type="radio" id="checkbox5" name="creditCategory" value="Above 30"> Above CC 30
                    </label><br>
                </div>

                <p style="font-size:20px;margin-left:11%;margin-top:3%;">Date</p>
                <div class="date1">
                    <label for="date">
                        <input type="date" id="date" name="date">
                    </label><br>
                </div>
            </div>
        </aside>

    </div>

    <script src="/Assigment/js/filter.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>