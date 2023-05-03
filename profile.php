<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    </style>
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
    <?php include("model/query.php") ?>
</head>

<body id="top">
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("location:index.php");
    }

    ?>
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="adminhome.php">
                <img src="images/iiita.png" alt="Homepage">
            </a>
        </div>



        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <?php
                if ($_SESSION['userType'] != 3) {
                    if ($_SESSION['userType'] == 2) {
                        echo "<li><a href='facultyhome.php'  style='text-decoration:none'>Home</a></li>
                <li class='has-children'>
                    <a href='#0' style='text-decoration:none'>Booking</a>
                    <ul class='sub-menu'>
                        <li><a href='facultynewbookings.php' style='text-decoration:none'>New Booking</a></li>
                        <li><a href='facultyCancelBookings.php' style='text-decoration:none'>Cancel Booking</a></li>
                    </ul>
                </li>";
                    } else {
                        echo "<li><a href='adminhome.php'  style='text-decoration:none'>Home</a></li>
                        <li class='has-children'>
                            <a href='#0' style='text-decoration:none'>Booking</a>
                            <ul class='sub-menu'>
                                <li><a href='facultynewbookings.php' style='text-decoration:none'>New Booking</a></li>
                                <li><a href='adminCancelBookings.php' style='text-decoration:none'>Cancel Booking</a></li>
                            </ul>
                        </li>";
                    }
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
    <section class="s-content s-content--top-padding s-content--narrow"
        style="background-image: url('images/bg-01.jpg');">
        <div class="login100-form validate-form p-b-33 p-t-5" style="padding:4rem">
            <h4 style="color:#fad02c;margin-bottom:1rem">ABOUT</h4>

            <p>
                <?php
                $user = getUser($_SESSION['username']);

                echo "<div>" . $user['fullname'] . "</div>" . "<br>";
                ?>

                <?php
                echo "<div>" . "Username:    " . $user['username'] . "</div>" . "<br>";
                ?>
                <?php
                echo "<div>" . "Role:    " . (($_SESSION['userType'] == 2 ? "Faculty" : $_SESSION['userType'] == 3) ? "User" : "Admin") . "</div>" . "<br>";
                ?>
            </p>

        </div>
        <br>
        <div class="login100-form validate-form p-b-33 p-t-5" style="padding:4rem">
            <h4 style="color:#fad02c;margin-bottom:1rem">Contact Info</h4>

            <p>
                <?php

                echo "<div>" . $user['email'] . "</div>" . "<br>";
                echo "Phone: " . $_SESSION['mobile'] . "<br>";
                ?>
            </p>

        </div>
    </section>
    <footer style=" position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 2rem;
  background: white;
  color: #fad02c;
  font-weight: 500;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 0.2rem;">
        <div>&copy;2023 Group 6 All rights reserved.</div>
    </footer>
    <script src="_js/jquery-3.2.1.min.js"></script>
    <script src="_js/main.js"></script>
</body>

</html>