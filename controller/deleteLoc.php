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
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    debug_to_console($id);
    $res = deleteLocation($id);
    if ($res) {
        debug_to_console("Hello");
        header('Location: ../addLocation.php');
    }
}
?>