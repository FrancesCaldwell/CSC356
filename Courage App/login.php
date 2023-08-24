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
        
        // Query to check if the username and password match
        $sql = "SELECT * FROM tblUsers WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_fetch_array($result);
        
        // If the query result contains a match, log the user in
        if(isset($check)){
            $_SESSION['id'] = session_id();
            $_SESSION['isLoggedIn'] = 'true';
            $_SESSION['username'] = $check["username"];
            
            // Redirect the user to the home page
            header('Location: home.php');
        } else {
            // Set an error message if login fails
            $errorMessage = "Login failed";
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
              >userID:</label
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
            <input type="submit" class="button purple-bg" value="Sign Up" />
          </form>
        </div>
      </div>
    </header>
  </body>
</html>
