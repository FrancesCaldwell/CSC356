<?php
    session_start();
    
    $welcomeMessage = "";
    
    if ($_SESSION['isLoggedIn'] == 'true'){
        $welcomeMessage = "Welcome " . $_SESSION["username"];
    } else {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Intranet</title>
        <!-- Link to CSS -->
    <link rel="stylesheet" href="travelup.css" />
</head>
<body>
    <!-- Navbar section -->
    <div id="navbar">
      <!-- Logo image -->
      <img src="travelup.png" style="width: 110px; height: 40px" />
    </div>
        <!-- First Section -->
    <div class="light-grey" style="padding: 2%; margin-top: 3.5%">
      <div class="content">
        <div class="twothird" style="padding: 3% 9% 3% 1%">
          <!-- Section Title -->
          <h1>Captivating Martian Landscapes</h1>
          <!-- Section Description -->
          <h5 class="padding-16">
            Prepare to be mesmerized as you step foot on the red planet and
            witness an otherworldly spectacle like no other. Marvel at the
            grandeur of towering rusty-hued mountains, vast serene deserts
            stretching into the horizon, and deep valleys carved by ancient
            rivers. Immerse yourself in the ethereal beauty of Mars' unique
            geological formations, where every step unveils a breathtaking
            vista. From the hauntingly beautiful polar ice caps to the
            captivating dust storms that sweep across the barren plains, this
            journey promises an awe-inspiring encounter with a world that has
            fascinated humanity for centuries.
          </h5>
        </div>
        <div class="center"><img src="comms.png" style="width: 100%; height: 100%"/ ></div>
      </div>
    </div>
    <div class='container'>
    <button id="btn1">Tourist Bookings</button>
    <button id="btn2">HR Forms</button>
    <button id="btn3">Flight Updates</button>
    <button id="btn4">Employee Directory</button>
</div>

</body>
</html>
