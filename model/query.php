<?php
require_once("connect.php");
function isUniqueRoom($room)
{
    $sql = "SELECT * from classroom where roomname='$room'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);
    if ($count)
        return false;
    else
        return true;
}
function userExists($email)
{
    $sql = "SELECT * from user where username='$email'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);
    if ($count)
        return true;
    else
        return false;
}
function getClassRoomName($classId)
{
    $sql = "SELECT roomname from classroom where id='$classId'";
    $result = execute($sql);
    $roomName = mysqli_fetch_array($result);
    return $roomName;
}
function getFacultyBookingInfo($username)
{
    $sql = "SELECT * from booking where userid='$username'";
    $result = execute($sql);
    $booklist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $booklist[$i] = $row;
    }
    return $booklist;
}
function getAllBookingDetailsPaginationModel($offset, $no_of_records_per_page)
{
    $sql = "select * from booking LIMIT $offset, $no_of_records_per_page";

    $result = execute($sql);

    $bookList = array();

    for ($i = 0; $row = mysqli_fetch_assoc($result); ++$i) {
        $bookList[$i] = $row;
    }

    return $bookList;
}
function getCourseName($courseId)
{

    $sql = "SELECT coursename FROM course WHERE id = '$courseId'";
    $result = execute($sql);

    $courseName = mysqli_fetch_array($result);

    return $courseName;
}
?>