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
function cancelBooking($bookId, $uid)
{
    if ($bookId && $uid) {
        $result = cancelBookingStatus($bookId, $uid);
        if ($result) {
            return true;
        }
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$bookId = $_POST['bookId'];
$uid = $_SESSION['username'];
if (cancelBooking($bookId, $uid)) {
    header('Location: ../facultyhome.php');
}
?>