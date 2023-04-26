<?php
require_once("../model/connect.php");
require_once("../model/query.php");
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
$room = $_POST['room'];
$course = $_POST['course'];
$desc = $_POST['description'];
$res1 = getRoomByName($room);
$roomId = $res1['id'];
debug_to_console($id);
if (newBooking($id, $loc, $date, $startTime, $endTime, $roomId, $course, $desc)) {
    debug_to_console("Hello");
    header('Location: ../facultynewbookings.php');
}
?>