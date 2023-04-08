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
function addCourseName($course, $deptId)
{
    if ($course && $deptId) {
        $result = addCourse($course, $deptId);
        if ($result) {
            return true;
        }
        return false;
    }
    return false;
}
@error_reporting(0);
session_start();
$course = $_POST['course'];
$dept = $_POST['dept'];
$res1 = getDeptByName($dept);
$deptId = $res1['id'];
if (addCourseName($course, $deptId)) {
    header('Location: ../addCourse.php');
}
?>