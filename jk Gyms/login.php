<?php

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

// Connect to the created or existing database
$conn = new mysqli($servername, $username, $name, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Store email and name into the table

    $email = $_GET["cf-email"];
    $password = $_GET["password"];
     // Check if email already exists
     $check_sql = "SELECT * FROM user_credentials WHERE email='$email' AND password = '$password'";
    
     $reqular = "SELECT * FROM user_credentials WHERE email='$email' AND mt = 'm'";

     $premium = "SELECT * FROM user_credentials WHERE email='$email' AND mt = 'p'"; ;
    
     //regular
     $check_regular = $conn->query($reqular);
     $mem=$check_regular->num_rows;

     //premium
     $check_premium = $conn->query($premium);
     $pre =$check_premium->num_rows;


     $check_result = $conn->query($check_sql);
     $email_users = $check_result->num_rows;
     

     if ($email_users > 0) {
         echo "Valid User.";
        //S header("Location: index.html");
        echo "<br>email: ".$email.": ".$email_users;

        // echo '<script>alert("valid."); window.location.href = "premium.html";</script>';
        //exit();

        //CHECH MEMBERSHIP TYPE
        if($pre > 0){
            echo "<br> Premium Member";
            header("Location: premium.html?email=".$email);
            exit();
        }else if($mem > 0){
            echo "<br> Regular Member";
            header ("Location: member.html?email=".$email);
            exit();
        }else{
            echo "<br>Didn't finish registration";
            header("Location: membership.php?email=".$email);
            exit();
        }


     } else { 
        echo "invalid inputs";
        echo'<script>alert("invalid input"); window.location.href = "login.html";</script>';
 }


// Display the last inserted email
// Handle case where parameters are not provided
    


$conn->close();


