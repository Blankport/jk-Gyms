<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 a<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


 <title>Pricing</title>

 <style>
    body {
        background-image:url('images/gym_equip.jpg');
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;  
        height: 100%;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: rgba(232, 230, 230, 0.909);
    }

    section{
        background-color: #000000c4;
        margin: 0;
        padding-top: 20px;
    }
    .container {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        margin: 50px auto;
        max-width: 1000px;
       
    }

    .pack {
        background-color: #05040499;
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        margin: 20px;
        width: 30%;
        text-align: center;
        box-shadow: 0px 0px 10px 0px rgba(236, 87, 7, 0.5);
    }

    .pack h2 {
        margin-top: 0;
    }

    .pack h5 {
        margin-top: 0;
    }

    .pack button {
        background-color: #ddd;
        color: #333;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .pack button:hover {
        background-color: #ccc;
    }

    .goback {
        text-align: center;
        margin-top: 50px;
    }

    .goback button {
        background-color: #ddd;
        color: #333;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .goback button:hover {
        background-color: #ccc;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .pack {
            width: 80%;
        }
    }
  
  h1{
    background-color: rgba(67, 66, 66, 0.785) ;
    color:rgba(252, 137, 5, 0.865);
    box-shadow: 0px 0px 10px 0px;
    text-align: center;
    border: 200px;
    border-radius: 5% ;
    width: 100%;
  }
  li{
    text-decoration: none;
    text-align:left;
  }
 #phoneNo{
    text-align:center;
    margin:0 auto;
    background-color:rgba(171, 169, 165, 0.388);
    width: 50%;
    padding: 20px;
    font-size: 20px;
    border-radius: 2%;
}

.fade-in {
    opacity: 0;
    animation: fadeInAnimation 1.4s ease forwards;
}

@keyframes fadeInAnimation {
    from {
        opacity: 0;
        background-color: #333;
        background-image:none;
    }
    to {
        opacity: 1;
    }
}


 </style>
</head>
<body class="fade-in">



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


?>



 <section >
        <h1><strong>20% </strong><i>off to New Members</i></h1>

<form role="form" action="submit.php" method="get">
    <div id="phoneNo" data-aos="fade-up" data-aos-delay="400">
        <label for="phone">Mpesa.no: </label>
        <input type="tel" name="phone" id="phone" pattern="254[0-9]{9}" placeholder="254xxxxxxxxx" required>
       </div>

<div class="container">

<div class="pack">
        <h2>Starter Pack</h2>
        <h5>KSH 3500 /month</h5>
    
      <ul>
        <li>Access to Ammenties and Gym Facilities, ie;<i> Shower, Looker Room, Toiletry, Wifi and more. </i></li>
        <li><i>Boxing Training Room</i></li>
      </ul>
      <br/> 
      <input type="hidden"  id = "3.5k" class="amount" value="3500">
      <br/><button type ="submit" id ='3500'>Apply</button>

    
</div>
<div class="pack" data-aos="fade-up" data-aos-delay="400">
   
    <h2>Group Pack</h2>
    <h5>KSH10k /month</h5>
 <ul>
    <li>Team of 5</li>
  <li>Access to Amenities and Gym Facilities</li>
  <li><i>Free Cardio & Aerobics</i></li>
 </ul>
  <br/>
  <br/>
  <input type="hidden"  id = "10k" class="amount" value="10000">
  <button type ="submit" id="10000">Apply</button>

</div>
<div class="pack" data-aos="fade-up" data-aos-delay="400">
    
    <h2>Premium Pack</h2>
    <h5>KSH10.5k /month</h5>
  <ul>
    <li>Starter Pack privileges</li>
    <li>Free Clasess</li>
    <li>Nutrition consoltation</li>
    
  </ul>
  <input type="hidden"  id = "10.5k" class="amount" value="10500">
  <button type ="submit" id="10500" >Apply</button>

</div>
</div>
</form>   

<div class="goback" data-aos="fade-up" data-aos-delay="400">
    <button onclick="window.location.href='index.html'">Go Back Home</button>
</div>
 </section>

</body>

<script>
  
   var phone = document.getElementById("phone").value;
    var amount;
    var ngrok = "";
    
    document.getElementById('3500').onclick=function(){
        document.getElementById('3.5k').setAttribute("name", "amount");
    }   

    document.getElementById('10000').onclick=function(){
        document.getElementById('10k').setAttribute("name", "amount");
    }
    document.getElementById('10500').onclick=function(){
        document.getElementById('10.5k').setAttribute("name", "amount");
    }

</script>

</html>