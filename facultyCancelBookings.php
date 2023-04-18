<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
   
    <meta charset="utf-8">
    <title>Room Reservation System</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/iiita.png"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/cancelBookingValidate.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php include("controller/fetchList.php");
    session_start(); ?>
</head>

<body id="top"style="background-color:#f5f4f7">
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
            <li><a href="facultyhome.php" title="" style="text-decoration:none">Home</a></li>
            <li class="has-children">
                <a href="#0" title="" style="text-decoration:none">Bookings</a>
                <ul class="sub-menu">
                    <li><a href="facultynewbookings.php" style="text-decoration:none">New Booking</a></li>
                    <li><a href="facultyCancelBookings.php"style="text-decoration:none">Cancel Booking</a></li>
                </ul>
            </li>
            <li><a href="bookinglog.php" title=""style="text-decoration:none">Booking Log</a></li>
            <li><a href="controller/logout.php" title=""style="text-decoration:none">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>

<section class="s-extra s-content s-content--top-padding s-content--narrow"style="margin:3rem">

    <div class="table-responsive booking-log">
     <table class="table align-middle">
        <thead>
        <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Course Name</th>
                        <th>Room No</th>
                        <th></th>
                        <th>Cancel Booking</th>
                    </tr>
        </thead>

                    <?php
                    $bookList = getFacultyBooking($_SESSION['username']);
                    date_default_timezone_set('Asia/Dhaka');
                    $day = date("d-m-Y");
                    foreach ($bookList as $b) {
                        if ($b['date'] >= $day && $b['status'] == 1) {
                            $roomName = getClassRoomNum($b['classid']);
                            $courseName = getNameCourse($b['courseid']); ?>
                                                                                                                                                                                                                                                                                                                                                                                        <tr style="margin:3rem">
                                                                                                                                                                                                                                                                                                                                                                                            <td><?php echo $b['date']; ?></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><?php echo $b['starttime'] . "-" . $b['endtime']; ?></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><?php echo $courseName['coursename']; ?></td>
                                                                                                                                                                                                                                                                                                                                                                                            <td><?php echo $roomName['roomname']; ?></td>
                                                                                                                                                                                                                                                 <td></td>                                                                                                                                           <td>
                                                                                                                                                                                                                                                                                                                                                                                                <form action="controller/cancelBookingDetails.php" method="POST">
                                                                                                                                                                                                                                                                                                                                                                                                    <button class="login100-form-btn" type="submit" value="<?php echo $b['id']; ?>" name="bookId"style="min-width:80px;height:40px">
                                                                                                                                                                                                                                                                                                                                                                                                        CANCEL
                                                                                                                                                                                                                                                                                                                                                                                                    </button>
                                                                                                                                                                                                                                                                                                                                                                                                </form>
                                                                                                                                                                                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                                                                                                                                                                                        </tr>
                                                                                                                                                                                                    <?php }
                    } ?>
                    
     </table>
    </div>
</section>
<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>

</body>

</html>