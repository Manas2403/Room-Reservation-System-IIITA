<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <style>
    a {
        text-decoration: none;
    }
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
    <?php include("model/query.php");
    session_start();
    if ($_SESSION['userType'] == 2 || $_SESSION['userType'] == 3) {
        header('Location: bookinglog.php');
    } ?>
</head>

<body id="top">
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
                    echo "<li><a href='adminhome.php'  style='text-decoration:none'>Home</a></li>
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
                    echo "<li class='has-children current'>
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
    <section class="s-content s-content--top-padding s-content--narrow">

        <div class="limiter">
            <div class="container-login100" style="gap:2rem">

                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41" style=" color: #fad02c;">
                        New DEPARTMENT
                        <br><br>
                    </span>
                    <form class="login100-form validate-form p-b-33 p-t-5" action="controller/addDept.php"
                        method="post">

                        <div>
                            <input id="dept" class="input100" type="text" name="department" placeholder="Department">
                            <span class="stopp" id="deptSpan"></span>
                        </div>

                        <br><br>
                        <div class="container-login100-form-btn m-t-32">
                            <button class="login100-form-btn" type="submit" value="submit">
                                CONFIRM
                            </button>
                        </div>
                    </form>

                </div>
                <div style="overflow: scroll;margin:0;height:60rem" class="row login102-form">
                    <h1 style=" color: #fad02c;padding:1rem">All Departments</h1>
                    <form action="controller/deleteDept.php" method="post">
                        <table class="login100-form validate-form p-b-33 p-t-5">
                            <tr>
                                <th>DEPARTMENT</th>
                                <th>Delete</th>
                            </tr>
                            <?php
                            $deptList = getDeptName();
                            foreach ($deptList as $b) {
                                if ($b['deptname'] != "admin") {
                                    ?>
                            <tr>
                                <td><?php echo $b['deptname']; ?></td>
                                <td><button type="submit" name="id" value="<?php echo $b['id'] ?>"><img
                                            src="./images/delete.png" style="width:24px;cursor:pointer" /></button>
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="_js/jquery-3.2.1.min.js"></script>
    <script src="_js/main.js"></script>
</body>

</html>