<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trailb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch classes from the database
$sql = "SELECT * FROM premium";
$result = $conn->query($sql);

$classes = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $classes[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

// Return classes as JSON
header('Content-Type: application/json');
echo json_encode($classes);
?>
