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
function addRoomName($room, $locationId)
{
    if ($room && $locationId) {
        $result = addRoom($room, $locationId);
        if ($result) {
            return true;
        }
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$room = $_POST['room'];
$location = $_POST['roomlocation'];
$res1 = getLocationByName($location);
$locationId = $res1['id'];
if (addRoomName($room, $locationId)) {
    header('Location: ../addRoom.php');
}
?>