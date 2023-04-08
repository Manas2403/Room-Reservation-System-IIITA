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
function addDeptName($dept)
{
    if ($dept) {
        $result = addDepartment($dept);
        if ($result) {
            return true;
        }
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$dept = $_POST['department'];
if (addDeptName($dept)) {
    header('Location: ../addDepartment.php');
}
?>