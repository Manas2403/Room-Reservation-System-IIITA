<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Room Reservation System IIITA</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/iiita.png" />
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<?php
session_start();
include("controller/fetchList.php");
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>

<body id="top">
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="facultyhome.php">
                <img src="images/iiita.png" alt="Homepage">
            </a>
        </div>



        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li class="current"><a href="facultyhome.php" title="">Home</a></li>
                <li class="has-children">
                <a href="#0" title="" style="text-decoration:none">Bookings</a>
                <ul class="sub-menu">
                    <li><a href="facultynewbookings.php" style="text-decoration:none">New Booking</a></li>
                    <li><a href="facultyCancelBookings.php"style="text-decoration:none">Cancel Booking</a></li>
                </ul>
            </li>
                <li><a href="facultybookinglog.php" title="">Booking Log</a></li>
                <li><a href="controller/logout.php" title="">Log Out</a></li>
            </ul>

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav>

    </header>



    <section class="s-extra s-content s-content--top-padding s-content--narrow">
        <div style="display:flex;align-items:center;justify-content:center;">
            <button class="login100-form-btn"><a style="font-size: large;text-decoration:none;"
                    href="./facultynewbookings.php">New Booking</a></button>
        </div>
        <br><br><br>
        <div class="row login100-form" style="border:2px solid #FAD02C">

            <div class="col-seven md-six tab-full popular">
                <h3>Your Bookings (Today)</h3>

                <?php
                $bookList = getFacultyBooking($_SESSION['username']);
                date_default_timezone_set('Asia/Dhaka');
                $day = date("Y-m-d");
                foreach ($bookList as $b) {
                    $status = $b['status'];
                    if ($b['date'] == $day && $status == 1) {
                        $roomName = getClassRoomNum($b['classid']);
                        echo "Room No:" . $roomName['roomname'] . " Time: " . $b['starttime'] . "-" . $b['endtime'] . "<br>";
                    }
                }

                ?>

            </div>

        </div>
        <br><br><br>
        <div class="row login100-form" style="border:2px solid #FAD02C">

            <div class="col-seven md-six tab-full popular">
                <h3>Your Bookings (Upcoming)</h3>
                <?php
                $bookList = getFacultyBooking($_SESSION['username']);
                date_default_timezone_set('Asia/Dhaka');
                $day = date("Y-m-d");

                foreach ($bookList as $b) {
                    $status = $b['status'];
                    if ($b['date'] > $day && $status == 1) {
                        $roomName = getClassRoomNum($b['classid']);
                        echo "Room No:" . $roomName['roomname'] . " Time: " . $b['starttime'] . "-" . $b['endtime'] . " on " . $b['date'] . "<br>";
                    }
                }

                ?>

            </div>

        </div>
    </section>
    <footer>
    </footer>

    <script src="_js/jquery-3.2.1.min.js"></script>
    <script src="_js/main.js"></script>

</body>

</html>