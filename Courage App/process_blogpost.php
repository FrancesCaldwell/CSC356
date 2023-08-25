<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        echo "User ID not found.";
        exit();
    }
    $user_id = $_SESSION['user_id'];

    $title = $_POST["title"];
    $challengeType = $_POST["item"];
    $errors = [];

    if (empty($title)) {
        $errors[] = "Title is required.";
    }
    
    $content = $_POST["editorContent"];
    if (empty($content)) {
        $errors[] = "Content is required.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "Error: $error <br>";
        }
        exit();
    }

    $imageFileName = null;

    if ($_FILES['bimgs']['error'] === UPLOAD_ERR_OK) {
        $imageFileName = $_FILES['bimgs']['name'];
        $imageTempPath = $_FILES['bimgs']['tmp_name'];
        $targetDir = 'images/';
        $targetPath = $targetDir . $imageFileName;
        if (!move_uploaded_file($imageTempPath, $targetPath)) {
            echo "Error moving uploaded image.";
            exit();
        }
    }

    $tags = json_decode($_POST["tags"], true);

    $sql = "INSERT INTO tblBlogPosts (user_id, title, content, challenge_type, image_file_name) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        echo "Error creating prepared statement: " . mysqli_error($conn);
        exit();
    }
    mysqli_stmt_bind_param($stmt, "issss", $user_id, $title, $content, $challengeType, $imageFileName);

    if (mysqli_stmt_execute($stmt)) {
        $blogId = mysqli_insert_id($conn);

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

        header("Location: home.php");
        exit();
    } else {
        echo "Error executing statement: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>
<script>
tinymce.init({
  selector: '#editor',
  setup: function (editor) {
    editor.on('change', function () {
      editor.save();
    });
  }
});
</script>
