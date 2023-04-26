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
@error_reporting(0);
session_start();
$func_name = $_POST['param_1'];
switch ($func_name) {
    case "isAvailable":
        AvailableRooms();
        break;
}

function AvailableRooms()
{
    $locId = $_POST['param_2'];
    $date = $_POST['param_3'];
    $startTime = $_POST['param_4'];
    $endTime = $_POST['param_5'];
    $roomList = listOfAvailableRooms($locId, $date, $startTime, $endTime);
    print_r(json_encode($roomList));
}
?>