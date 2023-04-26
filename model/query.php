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
function roomExists($room, $locationId)
{
    $sql = "SELECT * from classroom where roomname='$room' and locationid='$locationId'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);
    if ($count)
        return true;
    else
        return false;
}
function locExists($loc)
{
    $sql = "SELECT * from location where name='$loc'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);
    if ($count)
        return true;
    else
        return false;
}
function deptExists($dept)
{
    $sql = "SELECT * from department where name='$dept'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);
    if ($count)
        return true;
    else
        return false;
}
function courseExists($course, $deptId)
{
    $sql = "SELECT * from course where coursename='$course' and deptid='$deptId'";
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
function getAllBookingDetails()
{
    $sql = "select * from booking";

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
function getAllDepartments()
{
    $sql = "SELECT * from department";
    $result = execute($sql);
    $deptlist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $deptlist[$i] = $row;
    }
    return $deptlist;
}
function getDepartmentById($id)
{
    $sql = "SELECT * from department where id='$id'";
    $result = execute($sql);
    $locationname = mysqli_fetch_array($result);
    return $locationname;
}
function getDeptByName($dept)
{
    $sql = "SELECT * from department where deptname='$dept'";
    $result = execute($sql);
    $locationname = mysqli_fetch_array($result);
    return $locationname;
}
function getAllLocations()
{
    $sql = "SELECT * from location";
    $result = execute($sql);
    $locationlist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $locationlist[$i] = $row;
    }
    return $locationlist;
}
function addLocation($loc)
{
    $sql = "INSERT into location(name) values ('$loc')";
    $result = execute($sql);
    if ($result)
        return true;
    return false;
}
function getLocationByName($location)
{
    $sql = "SELECT * from location where name='$location'";
    $result = execute($sql);
    $locationId = mysqli_fetch_array($result);
    return $locationId;
}
function addRoom($room, $locationId)
{
    $sql = "INSERT INTO classroom(roomname,locationid) values('$room','$locationId')";
    $result = execute($sql);

    if ($result == true) {

        return true;
    } else {

        return false;
    }
}
function addCourse($course, $deptId)
{
    $sql = "INSERT INTO course(coursename,deptid) values('$course','$deptId')";
    $result = execute($sql);

    if ($result == true) {

        return true;
    } else {

        return false;
    }
}
function getAllRooms()
{
    $sql = "SELECT * from classroom";
    $result = execute($sql);
    $locationlist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $locationlist[$i] = $row;
    }
    return $locationlist;
}
function getLocationById($id)
{
    $sql = "SELECT * from location where id='$id'";
    $result = execute($sql);
    $locationname = mysqli_fetch_array($result);
    return $locationname;
}
function deleteClassroom($id)
{
    $sql = "DELETE from classroom where id='$id'";
    $result = execute($sql);
    if ($result == 1)
        return true;
    return false;
}
function deleteLocation($id)
{
    $sql = "DELETE from location where id='$id'";
    $result = execute($sql);
    if ($result == 1)
        return true;
    return false;
}
function deleteCourse($id)
{
    $sql = "DELETE from course where id='$id'";
    $result = execute($sql);
    if ($result == 1)
        return true;
    return false;
}
function deleteDept($id)
{
    $sql = "DELETE from department where id='$id'";
    $result = execute($sql);
    if ($result == 1)
        return true;
    return false;
}
function getAvailableRooms()
{

}
function getFacultyCanCancelBooking($username)
{
    $sql = "SELECT * from booking where userid='$username' and status=1";
    $result = execute($sql);
    $booklist = array();
    for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
        $booklist[$i] = $row;
    }
    return $booklist;
}

?>