<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> Completed </title>
      <!-- Style CSS -->
      <link rel="stylesheet" href="./complete Animation/css/style.css">
      <!-- Demo CSS  -->
      <link rel="stylesheet" href="./complete Animations/css/demo.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   
    <style>
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
    </style>
    </head>
   <body>
      <main class="cd__main">
         

         <div class="main-container">
	<div class="check-container">
		<div class="check-background">
			<svg viewBox="0 0 65 51" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7 25L27.3077 44L58.5 7" stroke="white" stroke-width="13" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
        
		</div>
		<div class="check-shadow">
      </div>
      
	</div>
    <h1>
        Successfully Registerd
     </h1> 
</div>
<div class="goback">
    <?php
    
    $class = $_GET['class'];
    $p = "premium.html";
    if ($class == 'p'){
        echo '<button id="p" value = "prime">Go To yours Page</button>';
    }elseif ($class == 'm'){
        echo '<button id="p" value = "regular">Go To yours Page</button>';
    }else{
        echo '<script>alert("Error Encountered"); window.location.href = "Membership.html";</script>';
    }
    
    ?>
</div>
      </main>
   </body>
   <script>
    
    var val = document.getElementById("p").value;
   
    document.getElementById("p").onclick=function(){
        if(val === "prime"){
            window.location.href="premium.html";
        }else if (val === "regular"){

            window.location.href="regular.html";

        }
    }
    //3306

   </script>
</html>