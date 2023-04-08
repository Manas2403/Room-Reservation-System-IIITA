<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <script>
        function showResult(str) {
            if (str.length==0) {
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("livesearch").innerHTML=this.responseText;
                    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
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
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php
    include("controller/fetchList.php");
    ?>
</head>
<body id="top" style="background-color:#f5f4f7">
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>

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
            <li ><a href="facultyhome.php" title="" style="text-decoration:none">Home</a></li>
            <li class="current"><a href="facultybookinglog.php" title="" style="text-decoration:none">Booking Log</a></li>
            <li><a href="controller/logout.php" title="" style="text-decoration:none">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>



<section class="s-extra s-content s-content--top-padding s-content--narrow"style="margin:3rem">
    <?php
    $conn = mysqli_connect('localhost', 'root', 'root', 'orr', 3307);



    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 5;
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM booking";
    $result = mysqli_query($conn, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $statement = "select * from booking LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn, $statement);

    if (mysqli_num_rows($res_data) > 0) {
        echo "<div class=\"table-responsive booking-log\">";
        echo "<table class=\"table align-middle\">";
        ?>
                                                                            <thead>
                                                                            <tr>
                                                                                <th >Date</th>
                                                                                <th >Time</th>
                                                                                <th >Room</th>
                                                                                <th>Course Name</th>
                                                                                <th >Booked By</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <?php
                                                                            $bookList = getAllBookingDetailsPagination($offset, $no_of_records_per_page);
                                                                            foreach ($bookList as $b) {
                                                                                $roomName = getClassRoomNum($b['classid']);
                                                                                $courseName = getNameCourse($b['courseid']);
                                                                                $user = $b['userid'];
                                                                                ?>
                                                                                                                                                    <tr>
                                                                                                                                                        <td><?php echo $b['date']; ?></td>
                                                                                                                                                        <td><?php echo $b['starttime'] . " - " . $b['endtime']; ?></td>
                                                                                                                                                        <td><?php echo $roomName['roomname']; ?></td>
                                                                                                                                                        <td><?php echo $courseName['coursename']; ?></td>
                                                                                                                                                        <td><?php echo $user; ?></td>
                                                                                                                                                        <td>
                                                                                                                                                            <?php if ($b['status'] == 1) {
                                                                                                                                                                echo "<h6 style='color:darkgreen'>" . "Confirmed." . "</h6>";
                                                                                                                                                            } else {
                                                                                                                                                                echo "<h6 style='color:#ff1627'>" . "Cancelled." . "</h6>"; ?>
                                                                                                                                                                                                                            </td>
                                                                                                                                                                                                                            <td><?php } ?></td>
                                                                                                                                                    </tr>

                                                                                                                                                    <?php
                                                                            }

                                                                            echo "</table>";
                                                                            echo "</div>";
    } else {
        echo "Nothing found in db";
    }
    mysqli_close($conn);
    ?>
    <div class="pagination">
        <button class="<?php if ($pageno <= 1) {
            echo 'disabled';
        } ?> login100-form-btn"><a style="font-size: large;text-decoration:none;" href="<?php if ($pageno <= 1) {
              echo '#';
          } else {
              echo "?pageno=" . ($pageno - 1);
          } ?>">Prev</a></button>
        <button class="<?php if ($pageno >= $total_pages) {
            echo 'disabled';
        } ?> login100-form-btn"><a style="font-size: large;text-decoration:none;" href="<?php if ($pageno >= $total_pages) {
              echo '#';
          } else {
              echo "?pageno=" . ($pageno + 1);
          } ?>">Next</a></button>
    </div>
</section>
<footer>
</footer>
<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>

</body>

</html>