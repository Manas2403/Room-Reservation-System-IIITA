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
function getAllRoomsList()
{
    $sql = "SELECT * from location";
    $result = execute($sql);
    $locationList = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); ++$i) {
        $locationList = $row;
    }
    return $locationList;
}
function getAllRoom()
{

    $sql = "SELECT * FROM classroom";
    $result = execute($sql);

    $roomList = array();

    for ($i = 0; $row = mysqli_fetch_assoc($result); ++$i) {
        $roomList[$i] = $row;
    }

    return $roomList;
}
function getRoomType($typeId)
{

    $sql = "SELECT * FROM roomtype WHERE id ='$typeId'";
    $result = execute($sql);

    $typeName = mysqli_fetch_array($result);
    return $typeName;

}

function getRoomLocation($annexId)
{

    $sql = "SELECT * FROM annex WHERE id ='$annexId'";
    $result = execute($sql);

    $locationName = mysqli_fetch_array($result);
    return $locationName;
}
function addUser($uid, $fullname, $email, $userType)
{
    $sql = "INSERT into user VALUES ('$uid','$fullname','$email','$userType')";
    $result = execute($sql);
    return $result;
}
function getUser($uid)
{
    $sql = "SELECT * from user where username='$uid'";
    $result = execute($sql);
    $user = mysqli_fetch_array($result);
    return $user;
}
function getCourses()
{
    $sql = "SELECT * from course";
    $result = execute($sql);
    $courseList = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $courseList[$i] = $row;
    }
    return $courseList;
}
function cancelBookingStatus($bookId, $cancelledBy)
{
    $sql1 = "UPDATE booking SET status=0 where id='$bookId'";
    $sql2 = "UPDATE booking SET cancelledBy='$cancelledBy' where id='$bookId'";
    $result1 = execute($sql1);
    $result2 = execute($sql2);
    if ($result1 == 1 && $result2 == 1)
        return true;
    return false;
}
function getDeptName()
{
    $sql = "SELECT * from department";
    $result = execute($sql);
    $deptlist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $deptlist[$i] = $row;
    }
    return $deptlist;
}
function addDepartment($dept)
{
    $sql = "INSERT into department(deptname) values ('$dept')";
    $result = execute($sql);
    if ($result)
        return true;
    return false;
}
?>