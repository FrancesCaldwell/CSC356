<?php
// Start a session
session_start();

$welcomeMessage = "";

// Check if user is logged in, otherwise redirect to login page
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == 'true'){
    $welcomeMessage = "Welcome " . $_SESSION["username"];
} else {
    header('Location: login.php');
    exit; // Terminate the script after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courage - Home</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="home.css">
    <!-- Link to FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Added styling -->
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Navbar section -->
    <div class="topnav">
        <a class="active" href="blog.php">
            <img src="post.png" style="width: 55px; height: 45px">
        </a>
        <a href="#drafts" class="navtext">Drafts</a>
        <a href="#saved" class="navtext">Saved</a>
        <a href="#profile" class="split">
            <i class="fa fa-user" style="font-size: 30px"></i>
        </a>
        <a href="#messages" class="split">
            <i class="fa fa-comment" style="font-size: 30px"></i>
        </a>
        <a href="#notifications" class="split">
            <i class="fa fa-bell" style="font-size: 30px"></i>
        </a>
        <input style="margin-top: 1.5%;" class="split" type="text" placeholder="Search..">
    </div>

    <!-- Home Content -->
    <div id="home-content" class="home active">
        <button class="tablink active custom-tab" data-tab="following" onclick="openTab(event, 'followingContent')">Following</button>
        <button class="tablink custom-tab" data-tab="foryou" onclick="openTab(event, 'foryouContent')">For You</button>
    </div>
    <div id="followingContent" class="content active">
        <?php include 'display_blog_content.php'; ?>
    </div>
    <div id="foryouContent" class="content">
        <?php include 'display_blog_content.php'; ?>
    </div>
    <script src="tabs.js"></script>
</body>
</html>
