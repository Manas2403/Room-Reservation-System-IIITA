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
        header("location:index.html");
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
                <li class="current"><a href="adminhome.php" title="">Home</a></li>
                <li class="has-children">
                    <a href="#0" title="">Booking</a>
                    <ul class="sub-menu">
                        <li><a href="adminnewbookings.php">Create Booking</a></li>
                        <li><a href="adminCancelBookings.php">View Booking</a></li>
                    </ul>
                </li>
                <li><a href="adminbookinglog.php" title="">Booking Log</a></li>
                <li class="has-children">
                    <a href="#0" title="">Adding</a>
                    <ul class="sub-menu">
                        <li><a href="departmentAdding.php"">Department</a></li>
                    <li><a href=" courseAdding.php">Course</a></li>
                        <li><a href="roomAdding.php">Room</a></li>
                    </ul>
                </li>
                <li><a href="profile.php" title="">Profile</a></li>
                <li><a href="controller/logout.php" title="">Log Out</a></li>
            </ul>

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav>

    </header>
    <section class="s-content s-content--top-padding s-content--narrow"
        style="background-image: url('images/bg-01.jpg');">
        <div class="login100-form validate-form p-b-33 p-t-5">
            <h4 style="color:#fad02c">ABOUT</h4>

            <p>
                <?php
                $user = getUser($_SESSION['username']);

                echo $user['fullname'] . "<br>";
                ?>
                Username:
                <?php
                echo $user['username'] . "<br>";
                ?>
                Role:
            </p>

        </div>
        <br>
        <div class="login100-form validate-form p-b-33 p-t-5">
            <h4 style="color:#fad02c">Contact Info</h4>

            <p>
                <?php

                echo $user['email'] . "<br>";
                echo "Phone: " . $user['phone'] . "<br>";
                ?>
            </p>

        </div>
    </section>
    <script src="_js/jquery-3.2.1.min.js"></script>
    <script src="_js/main.js"></script>
</body>

</html>