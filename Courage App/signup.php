<?php
    // Initialize an empty error message
    $errorMessage = "";
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        // Start a session and include the database connection
        session_start();
        require_once('dbconnect.php');
        
        // Get the submitted username and password
        $username = $_POST["userID"];
        $password = $_POST["password"];
        
        // Query to check if the username already exists
        $checkQuery = "SELECT * FROM tblUsers WHERE username = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $username);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);
        
        // If the username is already taken, show an error message
        if (mysqli_num_rows($checkResult) > 0) {
            $errorMessage = "Username already exists.";
        } else {
            // Insert the new user into the database
            $insertQuery = "INSERT INTO tblUsers (username, password) VALUES (?, ?)";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            mysqli_stmt_bind_param($insertStmt, "ss", $username, $hashedPassword);
            
            if (mysqli_stmt_execute($insertStmt)) {
                // Redirect the user to the login page
                header('Location: login.php');
                exit(); // Add this line to ensure the script stops execution
            } else {
                $errorMessage = "Error creating account";
            }
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
            action="signup.php"
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

<!-- Submit button for sign up -->
            <input type="submit" class="button purple-bg" value="Sign Up" />
    <!-- Horizontal divider -->
            <p>--------------------- OR ---------------------</p>
            <!-- Submit button for the login form -->
            <a href="login.php">
            <input class="button red-bg" value="Login" />
            </a>
          </form>
        </div>
      </div>
    </header>
  </body>
</html>
