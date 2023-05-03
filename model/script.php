<?php
// Set the time zone to match your server's time zone
date_default_timezone_set('Asia/Kolkata');

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "orr";
$port = 3307;
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Calculate the date 1 week ago
$one_week_ago = date('Y-m-d H:i:s', strtotime('-1 week'));

// Delete old records from the student_ticket table
$sql = "DELETE FROM booking WHERE date < '$one_week_ago'";
if ($conn->query($sql) === TRUE) {
    echo "Old records deleted successfully.";
} else {
    echo "Error deleting old records: " . $conn->error;
}


// Close the database connection
mysqli_close($conn);
?>