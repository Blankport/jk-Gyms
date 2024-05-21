<?php

session_start();

$servername = "localhost";
$username = "root"; // Your MySQL username
$name = ""; // Your MySQL name
$dbname = "credentials"; // Your desired database name

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
$sql = "CREATE TABLE IF NOT EXISTS user_credentials (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    mt VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully or already exists";
} else {
    echo "Error creating table: " . $conn->error;
}

// Store email and name into the table

    $email = $_GET["cf-email"];
    $name = $_GET["cf-name"];
    $password = $_GET["password"];
     // Check if email already exists
     $check_sql = "SELECT * FROM user_credentials WHERE email='$email'";
     $check_result = $conn->query($check_sql);
     if ($check_result->num_rows > 0) {
         echo "Email already exists.";
        //S header("Location: index.html");
        $_SESSION['submitted'] = true;
         echo '<script>alert("Email taken."); window.location.href = "index.html#feature";</script>';
     exit();
     } else { 
        $check_sql = "SELECT * FROM user_credentials WHERE email='$email'";
        $check_result = $conn->query($check_sql);
        if ($check_result->num_rows > 0) {
           // echo "<br>Email already exists.";
           
        } else {
    $sql = "INSERT INTO user_credentials (email, name, password) VALUES ('$email', '$name', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "User credentials stored successfully";
        $_SESSION["submitted"] = true;
        header('Location: Membership.html');
        exit();
    } else {
        echo "Error storing user credentials: " . $conn->error;
    }
  }
 }


// Display the last inserted email
$sql = "SELECT email FROM user_credentials ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>Last Inserted Email:</h3>";
        echo $row["email"];
    }
} else {
    echo "No email stored yet.";
}


    // Handle case where parameters are not provided
    


$conn->close();

