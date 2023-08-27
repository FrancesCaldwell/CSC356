<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked Posts</title>
    <!-- Link to CSS -->
    <link rel="stylesheet" href="home.css">
    <!-- Link to FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="saved-page">
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
    <h2>Saved Posts</h2>
    <div id="liked-posts-container">
        <!-- Liked posts will be displayed here -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var likedPosts = JSON.parse(localStorage.getItem('likedPosts')) || [];

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
            likeBlogPost(blogId);
        });
    });

    function likeBlogPost(blogId) {
        var index = likedPosts.indexOf(blogId);
        if (index === -1) {
            likedPosts.push(blogId);
        } else {
            likedPosts.splice(index, 1);
        }
        localStorage.setItem('likedPosts', JSON.stringify(likedPosts));
        console.log("Liked posts:", likedPosts);
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
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var likedPosts = JSON.parse(localStorage.getItem('likedPosts')) || [];

    // Make an AJAX request to retrieve liked posts content
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_liked_posts.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            // Update the HTML content using JavaScript
            document.getElementById('liked-posts-container').innerHTML = response;
        }
    };
    var postData = 'likedPosts=' + JSON.stringify(likedPosts);
    xhr.send(postData);
});
    </script>
</body>
</html>
