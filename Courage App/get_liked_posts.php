<?php
require_once('dbconnect.php'); // Include the database connection

// Get the liked post IDs from the AJAX request
$likedPosts = json_decode($_POST['likedPosts']);

// Query to select the liked blog posts along with their corresponding user information
$likedPostsQuery = "SELECT bp.*, u.username FROM tblBlogPosts bp
                    JOIN tblUsers u ON bp.user_id = u.user_id
                    WHERE bp.blog_id IN (" . implode(",", $likedPosts) . ")
                    ORDER BY bp.created_at DESC;";
$likedPostsResult = mysqli_query($conn, $likedPostsQuery);

// Start a container to display the blog posts
$html = "<div class='blog-container'>";

// Loop through each row in the result set
while ($row = mysqli_fetch_assoc($likedPostsResult)) {
    $html .= "<div class='blog-post'>";
    $html .= "<h6>{$row['title']}</h6>";
    $html .= "<p>@{$row['username']}</p>";
    $formattedCreatedAt = date("F j, Y", strtotime($row['created_at']));
    $html .= "<p> ⋅ $formattedCreatedAt</p>";

    // Display the blog post image
    $html .= "<img src='images/{$row['image_file_name']}' alt='{$row['title']}'/>";

    // Fetch and display tags for this blog post
    // ... (similar code for tags)

    // Like button
    $html .= "<button class='like-button active ' data-blogid='{$row['blog_id']}'><i class='fa fa-heart'></i></button>";

    $html .= "</div>";
}

// Close the container
$html .= "</div>";

// Echo the complete HTML content
echo $html;
?>
