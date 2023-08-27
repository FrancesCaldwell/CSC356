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
        <a href="home.php" class="navtext">Home</a>
        <a href="saved.php" class="navtext">Saved</a>
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
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var likedPosts = JSON.parse(localStorage.getItem('likedPosts')) || [];
    var likedPostTags = {}; // Declare the object to store liked post tags

    var likeButtons = document.querySelectorAll('.like-button');

    likeButtons.forEach(function(button) {
        var blogId = button.getAttribute('data-blogid');
        var heartIcon = button.querySelector('i.fa-heart');

        // Check if the current post is liked and apply styles if necessary
        if (likedPosts.includes(blogId)) {
            button.classList.add('liked');
            heartIcon.classList.add('fas'); // Add filled heart class
            heartIcon.classList.add('liked');
        } else {
            button.classList.remove('liked');
            heartIcon.classList.remove('fas'); // Remove filled heart class
            heartIcon.classList.remove('liked');
        }

        button.addEventListener('click', function() {
            likeBlogPost(blogId, likedPostTags[blogId]); // Pass the associated tags
        });
    });

    function likeBlogPost(blogId, tags) {
        var index = likedPosts.indexOf(blogId);

        if (index === -1) {
            likedPosts.push(blogId);
            likedPostTags[blogId] = tags; // Store the tags for this liked post
        } else {
            likedPosts.splice(index, 1);
            delete likedPostTags[blogId]; // Remove tags for unliked post
        }

        localStorage.setItem('likedPosts', JSON.stringify(likedPosts));

        // Update button and heart icon classes after liking/unliking
        likeButtons.forEach(function(button) {
            var buttonBlogId = button.getAttribute('data-blogid');
            var heartIcon = button.querySelector('i.fa-heart');

            if (likedPosts.includes(buttonBlogId)) {
                button.classList.add('liked');
                heartIcon.classList.add('fas'); // Add filled heart class
                heartIcon.classList.add('liked');
            } else {
                button.classList.remove('liked');
                heartIcon.classList.remove('fas'); // Remove filled heart class
                heartIcon.classList.remove('liked');
            }
        });

        console.log("Liked posts:", likedPosts);
        
        // Function to fetch tags for a liked post (implement this function)
    function getTagsForLikedPost(blogId) {
        // You need to implement this function to fetch the tags for a liked post
        // You can use AJAX or any method you prefer to retrieve the tags
        // Return the tags associated with the blogId
        // For now, I'm assuming you have a placeholder implementation
        return likedPostTags[blogId] || [];
    }

    // Your existing AJAX code for the "For You" tab
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'foryou.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            // Update the HTML content using JavaScript
            document.getElementById('foryou-posts-container').innerHTML = response;
        }
    };

    // Modify this part to send the liked post tags
    var postData = 'likedPostTags=' + JSON.stringify(likedPostTags); // Send liked post tags
    xhr.send(postData);
    }
});
    </script>
</body>
</html>
