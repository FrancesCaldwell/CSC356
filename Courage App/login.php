<?php
// Initialize an empty error message
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start a session and include the database connection
    session_start();
    require_once('dbconnect.php');

    // Get the submitted username and password
    $username = $_POST["userID"];
    $password = $_POST["password"];

    // Query to fetch the hashed password and user_id for the provided username
    $userQuery = "SELECT user_id, password FROM tblUsers WHERE username = ?";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "s", $username);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);

    // Check if a user with the given username exists
    if ($userRow = mysqli_fetch_assoc($userResult)) {
        $hashedPassword = $userRow["password"];
        $user_id = $userRow["user_id"];

        // Verify the entered password against the stored hashed password
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['id'] = session_id();
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id; // Store the user_id in the session

            // Redirect the user to the home page
            header('Location: home.php');
        } else {
            // Set an error message if login fails
            $errorMessage = "Invalid username or password";
        }
    } else {
        // Set an error message if the username does not exist
        $errorMessage = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Link to external CSS stylesheet -->
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <!-- Header section with a background image -->
    <header id="landing-bg">
      <!-- Left side of the split layout -->
      <div class="split left">
        <div class="centered background">
          <!-- Heading and button for the left side -->
          <h2 style="margin-left: 6%; margin-right: 27%; margin-bottom: 6%">
            Every journey begins with a <u>single step</u>.
          </h2>
          <button
            class="button purple-bg"
            style="
              width: 65%;
              margin-left: 8%;
              margin-right: 12%;
              margin-top: 50%;
            "
          >
            Start Your Journey
          </button>
        </div>
      </div>
      <!-- Right side of the split layout -->
      <div class="split right">
        <div class="centered">
          <!-- Logo and heading for the right side -->
          <img src="courage.png" style="width: 125px; height: 35px" />
          <p style="text-align: left">Embark on daily challenges!</p>
          <!-- Display error message if login fails -->
          <div id="errorMessage">
            <?php
            echo $errorMessage;
            ?>
          </div>
          <!-- Form for user login -->
          <form
            name="loginForm"
            method="post"
            action="login.php"
            style="border: 1px solid black; width: 100%; padding: 2.5%"
          >
            <!-- userID input field -->
            <label
              for="userID"
              style="display: inline-block; text-align: left; width: 100%"
              >Username:</label
            >
            <input
              type="text"
              id="userID"
              name="userID"
              style="width: 95%; height: 4vh"
              required
            /><br /><br />

            <!-- Password input field -->
            <label
              for="password"
              style="display: inline-block; text-align: left; width: 100%"
              >Password:</label
            >
            <input
              type="text"
              id="password"
              name="password"
              style="width: 95%; height: 4vh"
              required
            /><br /><br />

            <!-- Submit button for the login form -->
            <input type="submit" class="button red-bg" value="Login" />
            <!-- Horizontal divider -->
            <p>--------------------- OR ---------------------</p>
            <!-- Submit button for sign up -->
            <a href="signup.php">
            <input class="button purple-bg" value="Sign Up" /> <a/>
          </form>
        </div>
      </div>
    </header>
  </body>
</html>
