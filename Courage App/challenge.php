<?php
// Include your database connection and other dependencies
require_once('dbconnect.php');
// ...

// Get the post ID from the URL parameter
if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];
} else {
    // Redirect back to the home page if post_id parameter is not provided
    header('Location: home.php');
    exit;
}

// Query to fetch the detailed content of the selected post
$query = "SELECT bp.*, u.username FROM tblBlogPosts bp
          JOIN tblUsers u ON bp.user_id = u.user_id
          WHERE bp.blog_id = $postId;";
$result = mysqli_query($conn, $query);

// Fetch the data
$row = mysqli_fetch_assoc($result);

// Query to fetch tags for the selected post
$tagsQuery = "SELECT tag_name FROM tblTags WHERE blog_id = $postId;";
$tagsResult = mysqli_query($conn, $tagsQuery);

// Initialize the $tags array
$tags = [];

if ($tagsResult) {
    while ($tagRow = mysqli_fetch_assoc($tagsResult)) {
        $tags[] = $tagRow['tag_name'];
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include your CSS and other dependencies -->
    <link rel="stylesheet" href="challenge.css">
    <title><?php echo $row['title']; ?></title>
</head>
<body>
        <!-- Add a back button to navigate back to the home page -->
    <a href="home.php">←</a>
    <div class="post-container">
        <h1><?php echo $row['title']; ?></h1>
        <p>@<?php echo $row['username']; ?> ⋅ <?php echo date("F j, Y", strtotime($row['created_at'])); ?></p>
        <!-- Display challenge_type, tags, and content if applicable -->
        <?php if ($row['challenge_type']) { ?>
            <p>Challenge Type: <?php echo $row['challenge_type']; ?></p>
        <?php } ?>
        <p>Tags: <?php echo implode(', ', $tags); ?></p>
        <!-- Display the blog post image -->
        <img src="images/<?php echo $row['image_file_name']; ?>" alt="<?php echo $row['title']; ?>"/>
        <div class="content"><?php echo $row['content']; ?></div>
    </div>
</body>
</html>
