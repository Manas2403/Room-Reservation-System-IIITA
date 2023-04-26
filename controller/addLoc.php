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
function addLocName($loc)
{
    if ($loc) {
        if (locExists($loc)) {
            header('Location: ../addLocation.php');
            return false;
        }
        $result = addLocation($loc);
        if ($result) {
            return true;
        }
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$loc = $_POST['loc'];
if (addLocName($loc)) {
    header('Location: ../addLocation.php');
}
?>