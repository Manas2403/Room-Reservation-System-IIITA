<!DOCTYPE html>
<html class="no-js" lang="en"  >
<head>
    <style >
        a{text-decoration: none;
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
    <link rel="icon" type="image/png" href="images/iiita.png"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/validateDept.js"></script>
    <?php include("model/query.php"); ?>
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
            <li ><a href="adminhome.php" title="">Home</a></li>

                       <li class="has-children">
                <a href="#0" title="">Booking</a>
                <ul class="sub-menu">
           <li><a href="adminnewbookings.php">Create Booking</a></li>
            <li><a href="adminCancelBookings.php">Cancel Booking</a></li>
                </ul>
            </li>


            <li><a href="adminbookinglog.php" title="">Booking Log</a></li>
            <li class="has-children">
                <a href="#0" title="">Adding</a>
                <ul class="sub-menu">
                    <li><a href="addDepartment.php"">Department</a></li>
                    <li><a href="addCourse.php">Course</a></li>
                    <li><a href="addRoom.php">Room</a></li>
                    <li><a href="addLocation.php">Location</a></li>
                </ul>
            </li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
    </nav>

</header>
<section class="s-content s-content--top-padding s-content--narrow">

    <div class="limiter">
        <div class="container-login100" style="gap:2rem">

            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41"style=" color: #fad02c;">
                    New COURSE
                    <br><br>
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" action="controller/addNewCourse.php"  method="post">

                <p class="input100"style="padding:0">Department</p>
                    <select id="dept" name="dept" class="input102">
                        <option value="select">SELECT</option>
                        <?php
                        $locationList = getAllDepartments();
                        foreach ($locationList as $l) { ?>
                                                                                        <option value="<?php echo $l['deptname'] ?>"><?php echo $l['deptname'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="stopp" id="locationSpan"></span>
                    <br><br>
                    <div>
                        <input id="course" class="input100" type="text" name="course" placeholder="Course">
                        <span class="stopp" id="roomSpan"></span>
                    </div>
                    <br><br>
                    <div class="container-login100-form-btn m-t-32" >
                        <button class="login100-form-btn" type ="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>
                </form>

            </div>
            <div style="overflow: scroll;margin:0;height:60rem" class="row login102-form">
                <h1 style=" color: #fad02c;padding:1rem">All Courses</h1>
                <table class="login100-form validate-form p-b-33 p-t-5">
                    <tr>
                        <th>Course</th>
                        <th>Department</th>
                    </tr>
                    <?php
                    $courseList = getCourses();
                    foreach ($courseList as $b) {
                        $deptName = getDepartmentById($b['deptid'])

                            ?>
                                                                                                                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                                                                                                                        <td><?php echo $b['coursename']; ?></td>
                                                                                                                                                                                                                                                                                                        <td><?php echo $deptName['deptname']; ?></td>
                                                                                                                                                                                                                                                                                                    </tr>
                                                                                                                <?php }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>
<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>
</body>

</html>