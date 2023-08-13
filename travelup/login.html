<?php
    $errorMessage = "";
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        require_once('dbconnect.php');
        
        $username = $_POST["userID"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM tblUsers WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_fetch_array($result);
        
        if(isset($check)){
            $_SESSION['id'] = session_id();
            $_SESSION['isLoggedIn'] = 'true';
            $_SESSION['username'] = $check["username"];
            
            header('Location: employeeintranet.php');
        } else {
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
    <link rel="stylesheet" href="travelup.css" />
  </head>
  <body>
    <!-- Navbar section -->
    <div id="navbar">
      <!-- Logo image -->
      <img src="travelup.png" style="width: 110px; height: 40px" />
    </div>
    <!-- Header section with a background image -->
    <header id="landing-bg">
      <!-- Heading for the login page -->
      <h3 style="text-align: left">Login Page</h3>
      <div id="errorMessage">
          <?php
          echo $errorMessage
          ?>
      </div>
      <!-- Form for user login -->
      <form
        name="loginForm"
        method="post"
        action="login.php"
        style="
          border: 2px solid black;
          width: 95%;
          background: rgba(255, 255, 255, 0.25);
          box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
          backdrop-filter: blur(4px);
          -webkit-backdrop-filter: blur(4px);
          padding: 2.5%;
        "
      >
        <!-- userID input field -->
        <label
          for="userID"
          style="display: inline-block; text-align: left; width: 100%"
          >userID:</label
        >
        <input type="text" id="userID" name="userID" required/><br /><br />

        <!-- Password input field -->
        <label
          for="password"
          style="display: inline-block; text-align: left; width: 100%"
          >Password:</label
        >
        <input type="text" id="password" name="password"  required/><br /><br />

        <!-- Submit button for the login form -->
        <input type="submit" value="Login" />
      </form>
    </header>
        <script src="login.js"></script>
  </body>
</html>
