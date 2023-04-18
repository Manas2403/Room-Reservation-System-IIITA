<!DOCTYPE html>
<html class="no-js" lang="en"  >
<head>
    <meta charset="utf-8">
    <title>Room Reservation System IIITA</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/iiita.png"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/selectBookingInfo.js"></script>

    <?php
    include('model/query.php');
    session_start();
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
            <li ><a href="facultyhome.php" title="">Home</a></li>
            <li class="has-children">
                <a href="#0" title="" style="text-decoration:none">Bookings</a>
                <ul class="sub-menu">
                    <li><a href="facultynewbookings.php" style="text-decoration:none">New Booking</a></li>
                    <li><a href="facultyCancelBookings.php"style="text-decoration:none">Cancel Booking</a></li>
                </ul>
            </li>
            <li><a href="bookinglog.php" title="">Booking Log</a></li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>
<section class="s-content s-content--narrow"style="margin-top:2rem">

    <div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41"style="color:#fad02c">
                    New <span >Booking</span>
                    <br><br>
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" action="controller/addBooking.php" onsubmit="return validateBooking()" method="post">
                    <div>
                        <input class="input100" type="text" name="id"
                               value="<?php
                               $user = getUser($_SESSION['username']);
                               echo $user['fullname'] ?>" readonly>
                    </div>
                    <div style="display:flex;align-items:center;gap:1rem">
                        <input class="input102" type="date" name="date" id="selectDate">
                        <span class="stopp" id="dateSpan"></span>
                        <select id="location" name="location" class="input102">
                         <option value="location">Location</option>
                         <?php
                         $locations = getAllLocations();
                         foreach ($locations as $l) {
                             ?><option value="<?php echo $l['name'] ?>"><?php echo $l['name'] ?></option>
                         <?php } ?>
                        </select>
                    </div>
                    <!-- <div>
                        <select id="classType" class="input102" name="classType" onchange="showTime(this)">
                            <option value="classType">Class Type</option>
                            <option value="lab">Lab (3 hrs)</option>
                            <option value="theory1">Theory (1.5hrs)</option>
                            <option value="theory2">Theory (2 hrs)</option>
                        </select>
                        <span class="stopp" id="classSpan"></span>
                    </div> -->
                    <div class="input104">
                        <p style="font-size: 18px">Class Time</p>
                        <span class="stopp" id="timeSpan"></span>
                    </div>
                    <div>
                        <select id="course" name="course" class="input102">
                            <option value="course">Course Name</option>
                            <?php
                            $course = getCourses();
                            foreach ($course as $c) { ?>
                                                                                                                                                                    <option value="<?php echo $c['coursename']; ?>"><?php echo $c['coursename']; ?></option>
                            <?php } ?>
                        </select>
                        <span class="stopp" id="courseSpan"></span>
                    </div>
                    <div>
                        <textarea class="input102" style="background-color:#f5f3f3;margin-top:1rem" name="description" id="description" placeholder="Enter Description" ></textarea>
                    </div>
                <div class="container-login100-form-btn m-t-32" >
                    <button class="login100-form-btn" type="submit" value="submit">
                        CONFIRM
                    </button>
                    <br><br>
                </div>
                </form>
            </div>
        </div>
    </div>

</section>
<footer>
</footer>
<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>

</body>
</html>