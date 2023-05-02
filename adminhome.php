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
    <?php
    include("controller/fetchList.php");
    session_start();
    if ($_SESSION['userType'] == 2 || $_SESSION['userType'] == 3) {
        header('Location: bookinglog.php');
    }
    ?>
</head>

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
                <?php
                if ($_SESSION['userType'] != 3) {
                    echo "<li class='current'><a href='adminhome.php'  style='text-decoration:none'>Home</a></li>
                <li class='has-children'>
                    <a href='#0' style='text-decoration:none'>Booking</a>
                    <ul class='sub-menu'>
                        <li><a href='facultynewbookings.php' style='text-decoration:none'>New Booking</a></li>
                        <li><a href='adminCancelBookings.php' style='text-decoration:none'>Cancel Booking</a></li>
                    </ul>
                </li>";
                } ?>
                <li><a href="bookinglog.php" title="" style="text-decoration:none">Booking Log</a></li>
                <li><a href="calendar.php" title="" style="text-decoration:none">Calendar</a></li>
                <?php
                if ($_SESSION['userType'] == 1) {
                    echo "<li class='has-children'>
                    <a href='#0' title=''style='text-decoration:none'>Adding</a>
                    <ul class='sub-menu'>
                        <li><a href='addDepartment.php'style='text-decoration:none'>Department</a></li>
                    <li><a href='addCourse.php'style='text-decoration:none'>Course</a></li>
                        <li><a href='addRoom.php'style='text-decoration:none'>Room</a></li>
                        <li><a href='addLocation.php'style='text-decoration:none'>Location</a></li>
                    </ul>
                </li>";
                }
                ?>
                <li class="has-children" style="vertical-align:middle">
                    <a href="#0" title="" style="text-decoration:none"><img src="./images/person-circle.svg"
                            width="32" /></a>
                    <ul class="sub-menu">
                        <li><a href="profile.php" style="text-decoration:none">Profile</a></li>
                        <li><a href="controller/logout.php" style="text-decoration:none">Logout</a></li>
                    </ul>
                </li>
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
                        echo "<div style='display:flex;gap:1rem;font-size:1.8rem;'>" . "<div>" . "<span style='color:#fad02c;font-weight:bold'>Room No:</span> " . $roomName['roomname'] . "</div>" . "<div>" . "<span style='color:#fad02c;font-weight:bold'>Time:</span> " . $b['starttime'] . "-" . $b['endtime'] . "</div>" . "</div>" . "<br>";
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
                        echo "<div style='display:flex;gap:1rem;font-size:1.8rem;'>" . "<div>" . "<span style='color:#fad02c;font-weight:bold'>Room No:</span> " . $roomName['roomname'] . "</div>" . "<div>" . "<span style='color:#fad02c;font-weight:bold'>Time:</span> " . $b['starttime'] . "-" . $b['endtime'] . "</div>" . "</div>" . "<br>";
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