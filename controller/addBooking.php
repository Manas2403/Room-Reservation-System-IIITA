<?php
require_once("../model/connect.php");
require_once("../model/query.php");
require_once("./Email.php");
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);
    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function newBooking($id, $loc, $date, $startTime, $endTime, $roomId, $course, $desc)
{
    if ($id && $loc && $date && $startTime && $endTime && $roomId && $course && $desc) {
        $result = addNewBooking($id, $loc, $date, $startTime, $endTime, $roomId, $course, $desc);
        if ($result)
            return true;
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$id = $_POST['id'];
$loc = $_POST['location'];
$date = $_POST['selectDate'];
$startTime = $_POST['fromT'];
$endTime = $_POST['toT'];
$course = $_POST['course'];
$desc = $_POST['description'];
$location = getLocationById($loc)['name'];
$confirmedRoom = [];
foreach ($_POST['room'] as $room) {
    echo ($room);
    $res1 = getRoomByName($room);
    $roomId = $res1['id'];
    debug_to_console($id);
    if (newBooking($id, $loc, $date, $startTime, $endTime, $roomId, $course, $desc)) {
        $confirmedRoom[] = $room;
    }
}
$subject = "New Booking";
$body = "Hello " . $id . "<br>" . "Your booking has been confirmed for " . $date . " from " . $startTime . " to " . $endTime . " in " . join(", ", $confirmedRoom) . ", " . "$location" . ".";
sendEmail($id . "iiita.ac.in", $subject, $body);
debug_to_console("Hello");
header('Location: ../facultynewbookings.php');
?>