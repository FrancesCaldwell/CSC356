<?php
// Start the session if not already started
session_start();

// Check if user is logged in
if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}

// Include your database connection and other dependencies
require_once('dbconnect.php');

// Retrieve logged-in user's username
$loggedInUsername = $_SESSION['username'];

// Query to retrieve blog posts created by the logged-in user
$userBlogPostsQuery = "SELECT * FROM tblBlogPosts WHERE user_id = {$_SESSION['user_id']};";
$userBlogPostsResult = mysqli_query($conn, $userBlogPostsQuery);

// Check if the query was executed successfully
if (!$userBlogPostsResult) {
    echo "Error executing user blog posts query: " . mysqli_error($conn);
    exit; // Stop further execution
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your CSS and other dependencies -->
    <link rel="stylesheet" href="profile.css">
    <title>User Profile</title>
</head>
<body>
    <!-- Add a back button to navigate back to the home page -->
    <a id="back-button" href="home.php">←</a>

        <div class="page-container">
                    <h2><?php echo $loggedInUsername; ?></h2>

    <!-- Display user's created blog posts -->
    <h3>Blog Posts</h3>
        <div id="user-posts-container">
    <div class="blog-container">
        <?php
        while ($row = mysqli_fetch_assoc($userBlogPostsResult)) {
            ?>
            <div class="blog-post">
                <h6><?php echo $row['title']; ?></h6>
                
                <?php
                // Fetch and display tags for this blog post
                $tagsQuery = "SELECT tag_name FROM tblTags WHERE blog_id = {$row['blog_id']};";
                $tagsResult = mysqli_query($conn, $tagsQuery);

                // Check if the tags query was executed successfully
                if (!$tagsResult) {
                    echo "Error executing tags query: " . mysqli_error($conn);
                } else {
                    $tags = [];
                    while ($tagRow = mysqli_fetch_assoc($tagsResult)) {
                        $tags[] = $tagRow['tag_name'];
                    }
                    
                    if (!empty($tags)) {
                        echo "<p>Tags: " . implode(', ', $tags) . "</p>";
                    } else {
                        echo "<p>No tags found for this post.</p>";
                    }
                }
                ?>
                
                <!-- Display the blog post image -->
                <img src="images/<?php echo $row['image_file_name']; ?>" alt="<?php echo $row['title']; ?>"/>
            </div>
            <?php
        }
        ?>
    </div>
    </div>
    </div>
</body>
</html>
