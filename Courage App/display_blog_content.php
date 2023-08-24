<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require_once('dbconnect.php');

// Query to select 12 random blog posts
$query = "SELECT * FROM tblBlogPosts ORDER BY RAND() LIMIT 12;";
$result = mysqli_query($conn, $query);

// Start a container to display the blog posts
echo "<div class='blog-container'>";

// Loop through each row in the result set
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='blog-post'>";
    
    // Display title, challenge type, and created date
    echo "<h6>{$row['title']}</h6>";
    echo "<p>{$row['challenge_type']} Challenge</p>";
    $formattedCreatedAt = date("F j, Y", strtotime($row['created_at']));
    echo "<p> ⋅ $formattedCreatedAt</p>";
    
    // Display the blog post image
    echo "<img src='images/{$row['image_file_name']}' alt='{$row['title']}'/>";

    // Fetch and display tags for this blog post
    $tagsQuery = "SELECT tag_name FROM tblTags WHERE blog_id = {$row['blog_id']};";
    $tagsResult = mysqli_query($conn, $tagsQuery);

    if ($tagsResult) {
        $tags = [];
        while ($tagRow = mysqli_fetch_assoc($tagsResult)) {
            $tags[] = $tagRow['tag_name'];
        }
        if (!empty($tags)) {
            echo "<p id='floatingTags'>" . implode(', ', $tags) . "</p>";
        }
    } else {
        echo "Error fetching tags: " . mysqli_error($conn);
    }

    // Close the individual blog post div
    echo "</div>";
}

// Close the container
echo "</div>";

// Free the result set
mysqli_free_result($result);
?>
