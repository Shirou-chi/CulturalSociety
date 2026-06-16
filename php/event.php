<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>CULTURANET</title>
    <link rel="stylesheet" href="/Assignment/css/event.css">
    <link rel="stylesheet" href="/Assignment/css/filter.css">
    <?php
    include("connect.php");
    include("navbar.php");
    include("preloader.php");
    ?>
</head>

<body>

    <div class="eventContainer">

        <div class="leftEvent">
            <div class="normal">
                <h1 class="eveCat">Event<br>Category</h1>
                <ul class="eventNav">
                    <li><a href="#">Music</a></li><br>
                    <li><a href="#">Art</a></li><br>
                    <li><a href="#">Heritage</a></li><br>
                    <li><a href="#">Cuisine</a></li><br>
                    <li><a href="#">Fashion</a></li><br>
                    <li><a href="#">Dance</a></li>
                </ul>
                <button id="filterButton" class="filterButton">
                    <ion-icon name="filter" style="font-size:15px; padding-top:2px;"></ion-icon> FILTER
                </button>


            </div>

            <form>
                <div class="wrapper">
                    <aside id="sidebar" class="js-sidebar">
                        <div class="h-100">
                            <a href="#" class="return" id="return"><ion-icon name="arrow-undo-circle-outline"></ion-icon></a>
                            <button id="resetButton" class="resetButton">
                                <ion-icon name="refresh-outline" style="margin-left:-4%; margin-top:-0.1%;font-size:22px;"></ion-icon> Reset Filter
                            </button>
                            <p style="font-size:20px;margin-left:11%;margin-top:5%;">Price</p>
                            <div class="checkboxes">
                                <label for="checkbox1">
                                    <input type="radio" id="checkbox1" name="creditCategory" value="Below 15"> Below CC
                                    15
                                </label><br>
                                <label for="checkbox2">
                                    <input type="radio" id="checkbox2" name="creditCategory" value="CC 15 - CC 20"> CC
                                    15 -
                                    CC 20
                                </label><br>
                                <label for="checkbox3">
                                    <input type="radio" id="checkbox3" name="creditCategory" value="CC 20 - CC 25"> CC
                                    20 -
                                    CC 25
                                </label><br>
                                <label for="checkbox4">
                                    <input type="radio" id="checkbox4" name="creditCategory" value="CC 25 - CC 30"> CC
                                    25 -
                                    CC 30
                                </label><br>
                                <label for="checkbox5">
                                    <input type="radio" id="checkbox5" name="creditCategory" value="Above 30"> Above CC
                                    30
                                </label><br>
                            </div>
                            <p style="font-size:20px;margin-left:11%;margin-top:3%;">Date</p>
                            <div class="date1">
                                <label for="date">
                                    <input type="date" id="date" name="date">
                                </label><br>
                            </div>
                            <button id="dokylggb" class="filterButton" style="margin-top:14%;width:130px;height:40px;margin-left:70px;">
                                FILTER
                            </button>
                        </div>
                    </aside>

                </div>
            </form>
        </div>

        <div class="rightEvent">

            <h2 class="musicLabel" id="musicLabel">MUSIC</h2>
            <div class="container-music" id="container-music">
                <?php

                $cardsPerPage = 3;
                $page = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                $sql = "SELECT * FROM events_table WHERE category = 'music'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15"; // Filter events with price less than 15
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20"; // Filter events with price between 15 and 20
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25"; // Filter events with price between 20 and 25
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30"; // Filter events with price between 25 and 30
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30"; // Filter events with price greater than 30
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";

                $result = mysqli_query($condb, $sql);
                $eventDisplayed = false;


                //music 
                if ($result->num_rows > 0) {
                    $totalCardsSql = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'music'";
                    $totalCardsResult = mysqli_query($condb, $totalCardsSql);
                    $totalCardsRow = mysqli_fetch_assoc($totalCardsResult);
                    $totalPages = ceil($totalCardsRow["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>

                    <?php if ($page < $totalPages) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&music_page=<?php echo $page + 1; ?><?php if ($currentArtPage)
                                                                                                                                                                                echo "&art_page=$currentArtPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                                        echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                        echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                        echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                        echo "&dance_page=$currentDancePage"; ?>#musicLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&music_page=<?php echo $page - 1; ?><?php if ($currentArtPage)
                                                                                                                                                                                echo "&art_page=$currentArtPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                    echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                        echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                        echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                        echo "&dance_page=$currentDancePage"; ?>#musicLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed = true;
                }
                ?>

                <?php
                // Display events if any
                if ($eventDisplayed) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row["image_path"]; ?>" alt="<?php echo $row["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px dashed black; padding-top: 2px;">
                                        <?php echo $row["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>



            <!-- art -->
            <h2 class="artLabel" id="artLabel">ART</h2>
            <div class="container-art" id="container-art">
                <?php
                // Assuming $condb is your database connection
                $cardsPerPage = 3;
                $page = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                // Get the search term from the GET parameter
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                // Build the SQL query
                $sql = "SELECT * FROM events_table WHERE category = 'art'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15";
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20";
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25";
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30";
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30";
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";
                // Execute the SQL query
                $result_art = mysqli_query($condb, $sql);
                $eventDisplayed_art = false;

                // Print Next and Previous Page links before displaying events
                if ($result_art->num_rows > 0) {
                    $totalCardsSql_art = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'art'";
                    $totalCardsResult_art = mysqli_query($condb, $totalCardsSql_art);
                    $totalCardsRow_art = mysqli_fetch_assoc($totalCardsResult_art);
                    $totalPages_art = ceil($totalCardsRow_art["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>



                    <?php if ($page < $totalPages_art) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&art_page=<?php echo $page + 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                echo "&music_page=$currentMusicPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                    echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                        echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                        echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                        echo "&dance_page=$currentDancePage"; ?>#artLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&art_page=<?php echo $page - 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                echo "&music_page=$currentMusicPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                    echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                        echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                        echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                        echo "&dance_page=$currentDancePage"; ?>#artLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed_art = true;
                }
                ?>
                <?php
                // Display events if any
                if ($eventDisplayed_art) {
                    while ($row_art = mysqli_fetch_assoc($result_art)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row_art["image_path"]; ?>" alt="<?php echo $row_art["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row_art["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row_art["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row_art["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px solid black; padding-top: 2px;">
                                        <?php echo $row_art["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <h2 class="heritageLabel" id="heritageLabel">Heritage</h2>
            <div class="container-heritage" id="container-heritage">
                <?php
                // Assuming $condb is your database connection
                $cardsPerPage = 3;
                $page = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                // Get the search term from the GET parameter
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                // Build the SQL query
                $sql = "SELECT * FROM events_table WHERE category = 'heritage'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15";
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20";
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25";
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30";
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30";
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";

                // Execute the SQL query
                $result_heritage = mysqli_query($condb, $sql);
                $eventDisplayed_heritage = false;

                // Print Next and Previous Page links before displaying events
                if ($result_heritage->num_rows > 0) {
                    $totalCardsSql_heritage = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'heritage'";
                    $totalCardsResult_heritage = mysqli_query($condb, $totalCardsSql_heritage);
                    $totalCardsRow_heritage = mysqli_fetch_assoc($totalCardsResult_heritage);
                    $totalPages_heritage = ceil($totalCardsRow_heritage["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>



                    <?php if ($page < $totalPages_heritage) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&heritage_page=<?php echo $page + 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                            echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                    echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                    echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#heritageLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&heritage_page=<?php echo $page - 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                            echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                    echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                    echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#heritageLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed_heritage = true;
                }
                ?>

                <?php
                // Display events if any
                if ($eventDisplayed_heritage) {
                    while ($row_heritage = mysqli_fetch_assoc($result_heritage)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row_heritage["image_path"]; ?>" alt="<?php echo $row_heritage["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row_heritage["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row_heritage["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row_heritage["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px solid black; padding-top: 2px;">
                                        <?php echo $row_heritage["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <h2 class="cuisineLabel" id="cuisineLabel">Cuisine</h2>
            <div class="container-cuisine" id="container-cuisine">
                <?php
                // Assuming $condb is your database connection
                $cardsPerPage = 3;
                $page = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                // Get the search term from the GET parameter
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                // Build the SQL query
                $sql = "SELECT * FROM events_table WHERE category = 'cuisine'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15";
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20";
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25";
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30";
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30";
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";

                // Execute the SQL query
                $result_cuisine = mysqli_query($condb, $sql);
                $eventDisplayed_cuisine = false;

                // Print Next and Previous Page links before displaying events
                if ($result_cuisine->num_rows > 0) {
                    $totalCardsSql_cuisine = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'cuisine'";
                    $totalCardsResult_cuisine = mysqli_query($condb, $totalCardsSql_cuisine);
                    $totalCardsRow_cuisine = mysqli_fetch_assoc($totalCardsResult_cuisine);
                    $totalPages_cuisine = ceil($totalCardsRow_cuisine["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>

                    <?php if ($page < $totalPages_cuisine) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&cuisine_page=<?php echo $page + 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                    echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#cuisineLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&cuisine_page=<?php echo $page - 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                    echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#cuisineLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed_cuisine = true;
                }
                ?>
                <?php
                // Display events if any
                if ($eventDisplayed_cuisine) {
                    while ($row_cuisine = mysqli_fetch_assoc($result_cuisine)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row_cuisine["image_path"]; ?>" alt="<?php echo $row_cuisine["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row_cuisine["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row_cuisine["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row_cuisine["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px solid black; padding-top: 2px;">
                                        <?php echo $row_cuisine["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <h2 class="fashionLabel" id="fashionLabel">Fashion</h2>
            <div class="container-fashion" id="container-fashion">
                <?php
                // Assuming $condb is your database connection
                $cardsPerPage = 3;
                $page = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                // Get the search term from the GET parameter
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                // Build the SQL query
                $sql = "SELECT * FROM events_table WHERE category = 'fashion'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15";
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20";
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25";
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30";
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30";
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";

                // Execute the SQL query
                $result_fashion = mysqli_query($condb, $sql);
                $eventDisplayed_fashion = false;

                // Print Next and Previous Page links before displaying events
                if ($result_fashion->num_rows > 0) {
                    $totalCardsSql_fashion = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'fashion'";
                    $totalCardsResult_fashion = mysqli_query($condb, $totalCardsSql_fashion);
                    $totalCardsRow_fashion = mysqli_fetch_assoc($totalCardsResult_fashion);
                    $totalPages_fashion = ceil($totalCardsRow_fashion["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>



                    <?php if ($page < $totalPages_fashion) : ?>
                        <a href='?seach=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&fashion_page=<?php echo $page + 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#fashionLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&fashion_page=<?php echo $page - 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                    echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?><?php if ($currentDancePage)
                                                                                                                                                                                                                                                                                                    echo "&dance_page=$currentDancePage"; ?>#fashionLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed_fashion = true;
                }
                ?>
                <?php
                // Display events if any
                if ($eventDisplayed_fashion) {
                    while ($row_fashion = mysqli_fetch_assoc($result_fashion)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row_fashion["image_path"]; ?>" alt="<?php echo $row_fashion["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row_fashion["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row_fashion["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row_fashion["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px solid black; padding-top: 2px;">
                                        <?php echo $row_fashion["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <h2 class="danceLabel" id="danceLabel">Dance</h2>
            <div class="container-dance" id="container-dance">
                <?php
                // Assuming $condb is your database connection
                $cardsPerPage = 3;
                $page = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                $startIndex = ($page - 1) * $cardsPerPage;

                // Get the search term from the GET parameter
                $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                $creditCategory = isset($_GET['creditCategory']) ? $_GET['creditCategory'] : '';

                $date = isset($_GET['date']) ? $_GET['date'] : '';

                // Build the SQL query
                $sql = "SELECT * FROM events_table WHERE category = 'dance'";
                if (!empty($searchTerm)) {
                    $sql .= " AND event_name LIKE '%$searchTerm%'";
                }
                if (!empty($creditCategory)) {
                    if ($creditCategory == 'Below 15') {
                        $sql .= " AND price < 15";
                    } elseif ($creditCategory == 'CC 15 - CC 20') {
                        $sql .= " AND price >= 15 AND price <= 20";
                    } elseif ($creditCategory == 'CC 20 - CC 25') {
                        $sql .= " AND price >= 20 AND price <= 25";
                    } elseif ($creditCategory == 'CC 25 - CC 30') {
                        $sql .= " AND price >= 25 AND price <= 30";
                    } elseif ($creditCategory == 'Above 30') {
                        $sql .= " AND price > 30";
                    }
                }
                if (!empty($date)) {
                    $sql .= " AND event_date = '$date'";
                }
                $sql .= " LIMIT $startIndex, $cardsPerPage";

                // Execute the SQL query
                $result_dance = mysqli_query($condb, $sql);
                $eventDisplayed_dance = false;

                // Print Next and Previous Page links before displaying events
                if ($result_dance->num_rows > 0) {
                    $totalCardsSql_dance = "SELECT COUNT(*) AS total FROM events_table WHERE category = 'dance'";
                    $totalCardsResult_dance = mysqli_query($condb, $totalCardsSql_dance);
                    $totalCardsRow_dance = mysqli_fetch_assoc($totalCardsResult_dance);
                    $totalPages_dance = ceil($totalCardsRow_dance["total"] / $cardsPerPage);
                    $currentArtPage = isset($_GET['art_page']) ? $_GET['art_page'] : 1;
                    $currentHeritagePage = isset($_GET['heritage_page']) ? $_GET['heritage_page'] : 1;
                    $currentCuisinePage = isset($_GET['cuisine_page']) ? $_GET['cuisine_page'] : 1;
                    $currentFashionPage = isset($_GET['fashion_page']) ? $_GET['fashion_page'] : 1;
                    $currentDancePage = isset($_GET['dance_page']) ? $_GET['dance_page'] : 1;
                    $currentMusicPage = isset($_GET['music_page']) ? $_GET['music_page'] : 1;
                ?>



                    <?php if ($page < $totalPages_dance) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&dance_page=<?php echo $page + 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?>#danceLabel' style='margin-left:68%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>▶</a>
                    <?php endif; ?>
                    <?php if ($page > 1) : ?>
                        <a href='?search=<?php echo $searchTerm ?>&creditCategory=<?php echo $creditCategory ?>&date=<?php echo $date ?>&dance_page=<?php echo $page - 1; ?><?php if ($currentMusicPage)
                                                                                                                                                                                echo "&music_page=$currentMusicPage"; ?><?php if ($currentArtPage)
                                                                                                                                                        echo "&art_page=$currentArtPage"; ?><?php if ($currentCuisinePage)
                                                                                                                                                                                                echo "&cuisine_page=$currentCuisinePage"; ?><?php if ($currentFashionPage)
                                                                                                                                                                                                                                                echo "&fashion_page=$currentFashionPage"; ?><?php if ($currentHeritagePage)
                                                                                                                                                                                                                                                                                                echo "&heritage_page=$currentHeritagePage"; ?>#danceLabel' style='margin-left:66%; margin-top: -5.4%; position: absolute; color: white; text-decoration: none;'>◀</a>
                    <?php endif; ?>
                <?php
                    // Set eventDisplayed to true
                    $eventDisplayed_dance = true;
                }
                ?>
                <?php
                // Display events if any
                if ($eventDisplayed_dance) {
                    while ($row_dance = mysqli_fetch_assoc($result_dance)) {
                ?>
                        <div class="card">
                            <div class="front">
                                <div class="imgFirst">
                                    <img src="<?php echo $row_dance["image_path"]; ?>" alt="<?php echo $row_dance["event_name"]; ?>" width="100%" height="335px">
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; margin-top:2px;color:black">
                                        <?php echo $row_dance["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="back">
                                <div class="desc">
                                    <p style="margin: 10px; font-family: 'Kode Mono', monospace; font-size:14px">
                                        <?php echo $row_dance["event_description"]; ?>
                                        <span style="display:block; text-align:center; color:blue;">
                                            <a href='event.php?event_id=<?php echo $row_dance["event_id"]; ?>' style="color: blue;">Click to read more.</a>
                                        </span>
                                    </p>
                                </div>
                                <div class="musicName1">
                                    <p style="text-align: center; font-family: 'Kode Mono', monospace; font-size:13px; border-top: 1px solid black; padding-top: 2px;">
                                        <?php echo $row_dance["event_name"]; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }

                ?>
            </div>

        </div>
    </div>



    <?php
    // Check if event ID is provided in URL
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

            <div id="backdrop"></div>

            <div class="contentEvents" id="contentEvents" style="display: block;">
                <a href="/Assignment/php/event.php"><ion-icon name="backspace" class="exitEventDescButton"></ion-icon></a>
                <div class="eventAlign">

                    <div class="eventContentLeft">

                        <div class="slider-container">

                            <div class="slider">

                                <div class="slide">
                                    <img src="<?php echo $row["image_path"]; ?>" alt="<?php echo $row["event_name"]; ?>" class="imageSlider">
                                </div>

                            </div>


                        </div>

                        <div class="descriptionContent">
                            <p>
                                <?php echo $row['event_fullDes']; ?>
                            </p>

                        </div>

                    </div>

                    <div class="eventContentRight">
                        <h2 style="text-decoration: underline; text-align: center;">
                            <?php echo $row['event_name']; ?>
                        </h2>
                        <div class="contentForm">
                            <form action="" id="contentForm">

                                <label for="timeEvent">TIME : </label>
                                <input type="text" id="timeEvent" class="timeEvent" name="timeEvent" value="<?php echo $row['event_time']; ?>"><br>

                                <label for="dateEvent">DATE : </label>
                                <input type="text" id="dateEvent" class="dateEvent" name="dateEvent" value="<?php echo $row['event_date']; ?>"><br>

                                <label for="contantEvent">CATEGORY : </label>
                                <input type="text" id="contantEvent" class="contantEvent" name="contantEvent" value="<?php echo $row['category']; ?>"><br>

                                <label for="priceEvent">TICKET PRICE : </label>
                                <input type="text" id="priceEvent" class="priceEvent" name="priceEvent" value="<?php echo $row['price']; ?>"><br>

                                <label for="remainTicketEvent">REMAINING TICKET : </label>
                                <input type="text" id="remainTicketEvent" class="remainTicketEvent" name="remainTicketEvent" value="<?php echo $row['available_tickets']; ?>">

                            </form>

                        </div>
                        <div class="purchaseTicketButtonDiv">
                            <a href="confirmPurchase.php?event_id=<?php echo $eventId ?>">
                                <input type="submit" value="PURCHASE TICKET NOW" class="purchaseTicketButton" id="purchaseTicketButton">
                            </a>
                            <br>
                            <p class="attentionPurchase">ATTENTION! Please proceed your payment before
                                <?php echo $row['due_date']; ?>. As the system will close down for this event after the specific
                                date.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            // Event not found
            echo "<p>Event not found.</p>";
        }
    }
    ?>
    <script src="/Assignment/js/filter.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>