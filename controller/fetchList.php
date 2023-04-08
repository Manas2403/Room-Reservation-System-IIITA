<?php
require('./model/connect.php');
require('./model/query.php');
function getFacultyBooking($username)
{
    $booklist = getFacultyBookingInfo($username);
    return $booklist;
}
function getClassRoomNum($classId)
{
    $roomname = getClassRoomName($classId);
    return $roomname;
}
function getAllBookingDetailsPagination($offset, $no_of_records_per_page)
{
    $bookingListPagination = getAllBookingDetailsPaginationModel($offset, $no_of_records_per_page);
    return $bookingListPagination;
}
function getNameCourse($courseId)
{

    $courseName = getCourseName($courseId);

    return $courseName;
}
function getAllRooms()
{
    $locationList = getAllRoomsList();
    return $locationList;
}
function getAllRoomList()
{

    $roomList = getAllRoom();

    return $roomList;
}
function roomType($typeId)
{

    $type = getRoomType($typeId);
    return $type;
}

function roomLocation($annexId)
{

    $location = getRoomLocation($annexId);
    return $location;
}
?>
