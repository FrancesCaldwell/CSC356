<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require_once('dbconnect.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form inputs
    $title = $_POST["title"];
    $content = $_POST["editorContent"]; // Using the hidden field for content
    $challengeType = $_POST["item"]; // Get the selected challenge type

    // Validate title and content
    if (empty($title) || empty($content)) {
        echo "Error: Title and content are required.";
        exit();
    }

    // Get the uploaded image file
    $imageFileName = null;

    if ($_FILES['bimgs']['error'] === UPLOAD_ERR_OK) {
        $imageFileName = $_FILES['bimgs']['name'];
        $imageTempPath = $_FILES['bimgs']['tmp_name'];

        // Define the target directory for image uploads
        $targetDir = 'images/';
        $targetPath = $targetDir . $imageFileName;

        // Move the uploaded image to the target directory
        if (!move_uploaded_file($imageTempPath, $targetPath)) {
            echo "Error moving uploaded image.";
            exit();
        }
    }

    // Decode the JSON-encoded tags from the hidden input
    $tags = json_decode($_POST["tags"], true);

    // Insert data into the blog_posts table using prepared statement
    $sql = "INSERT INTO tblBlogPosts (title, content, challenge_type, image_file_name) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        echo "Error creating prepared statement: " . mysqli_error($conn);
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $challengeType, $imageFileName);

    if (mysqli_stmt_execute($stmt)) {
        // Get the last inserted blog_id
        $blogId = mysqli_insert_id($conn);

        // Insert tags into the tags table using prepared statement
        if (!empty($tags)) {
            $tagSql = "INSERT INTO tblTags (blog_id, tag_name) VALUES (?, ?)";
            $tagStmt = mysqli_prepare($conn, $tagSql);
            mysqli_stmt_bind_param($tagStmt, "is", $blogId, $tag);

            foreach ($tags as $tag) {
                $tag = mysqli_real_escape_string($conn, $tag);
                mysqli_stmt_execute($tagStmt);
            }

            mysqli_stmt_close($tagStmt);
        }

        // Redirect or show a success message
        header("Location: home.php");
        exit();
    } else {
        echo "Error executing statement: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>
