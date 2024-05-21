<?php

$servername = "localhost";
$username = "root"; // Your MySQL username
$name = ""; // Your MySQL name
$dbname = "TrailB"; // Your desired database name

// Create connection
$conn = new mysqli($servername, $username, $name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists";
} else {
    echo "Error creating database: " . $conn->error;
}

// Connect to the created or existing database
$conn = new mysqli($servername, $username, $name, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table to store emails and names if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Premium (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
 )   
";
if($conn->query($sql) === TRUE) {
    echo "Table created successfully or already exists";
    echo '<script>window.location.href = "/jk gyms/members/premium.html";</script>';
  
} else {
    echo "Error creatinsg table: " . $conn->error;
}

// Store email and name into the table

   $classes = [
    "Pilates",
    "Yoga & Spin", 
    "Cardio",
    "Personal trainer sessions"
   ];

   

     // Check if email already exists
for($i = 0; $i<count($classes); $i++){
        $check_sql = "SELECT * FROM Premium WHERE name='$classes[$i]'";
        $check_result = $conn->query($check_sql);
        if ($check_result->num_rows > 0) {
            echo "<br>class already exists.";
        exit();
        } else { 
           $check_sql = "SELECT * FROM Premium WHERE name='$classes[$i]'";
           $check_result = $conn->query($check_sql);
           if ($check_result->num_rows > 0) {
              // echo "<br>Email already exists.";
              
           } else {
       $sql = "INSERT INTO Premium (name) VALUES ('$classes[$i]')";
       if ($conn->query($sql) === TRUE) {
           echo "<br>".$classes[$i]." NEW CLASSS stored successfully";
       } else {
           echo "Error storing CLASSES " . $conn->error;
       }
     }
     }
  
      
 };

 exit();

