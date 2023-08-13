// This function is called when the login form is submitted for validation
function validateForm() {
  // Get the value entered in the "username" field of the form
  var username = document.forms["loginForm"]["username"].value;

  // Get the value entered in the "password" field of the form
  var password = document.forms["loginForm"]["password"].value;

  // Check if either the username or password field is empty
  if (username === "" || password === "") {
    // If either field is empty, display an alert to the user
    alert("Both fields must be filled out");

    // Return false to prevent the form from being submitted
    return false;
  }

  // If both fields are filled, the form will be submitted
}
