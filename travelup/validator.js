// display error message on php page
function printError(elemId, msg) {
  document.getElementById(elemId).innerHTML = msg;
}

// this function will validate the form inputs
function validateForm() {
  // these are the inputs from the html text/input elements
  var fullName = document.appForm.fullName.value;
  var age = document.appForm.age.value;
  var location = document.appForm.location.value;
  var experience = document.appForm.experience.value;
  var challenge = document.appForm.challenge.value;
  var adapt = document.appForm.adapt.value;

  // tracks whether or not the inputs are valid
  var nameValid = true;
  var ageValid = true;
  var locationValid = true;
  var experienceValid = true;
  var challengeValid = true;
  var adaptValid = true;

  // clears out any errors when the form is resubmitted
  printError("fullNameErr", "");
  printError("ageErr", "");
  printError("locationErr", "");
  printError("experienceErr", "");
  printError("challengeErr", "");
  printError("adaptErr", "");

  // checks to see if the user entered a valid name
  if (fullName == "") {
    printError("fullNameErr", "Please enter your name.");
    nameValid = false;
  }
  // checks to see if the user entered a valid age
  if (age == "") {
    printError("ageErr", "Please enter your age.");
    ageValid = false;
  }
  // checks to see if the user entered a valid location
  if (location == "") {
    printError("locationErr", "Please enter your location.");
    locationValid = false;
  }
  // checks to see if the user entered a valid response
  if (experience == "") {
    printError("experienceErr", "Please choose an option.");
    experienceValid = false;
  }
  // checks to see if the user entered a valid response
  if (challenge == "") {
    printError("challengeErr", "Please enter your response.");
    challengeValid = false;
  }
  // checks to see if the user entered a valid response
  if (adapt == "") {
    printError("adaptErr", "Please enter your response.");
    adaptValid = false;
  }

  // if any of the inputs are not valid, return false
  if (
    !nameValid ||
    !ageValid ||
    !locationValid ||
    !experienceValid ||
    !challengeValid ||
    !adaptValid
  ) {
    return false;
  }

  // if all of the inputs are valid, go to congrats page
  if (
    nameValid &&
    ageValid &&
    locationValid &&
    experienceValid &&
    challengeValid &&
    adaptValid
  ) {
    // print the user inputted data
    var printName = "Name: " + fullName;
    var printAge = "Age: " + age;
    var printLocation = "Location: " + location;
    var printExperience = "Experience: " + experience;
    var printChallenge = "Challenge:<br />" + challenge;
    var printAdapt = "Adapt:<br />" + adapt;

    // checks to see if history.pushState exists
    function goTo(page, title, url) {
      if ("undefined" !== typeof history.pushState) {
        history.pushState({ page: page }, title, url);
      } else {
        window.location.assign(url);
      }
    }
    goTo("Application Accepted", "Application Accepted", "accepted.html");

    // change the content of the page
    const application = document.getElementById("application");
    application.style.textAlign = "left";
    application.innerHTML =
      "<h1>Application Accepted!</h1><h2>Here is your application summary: </h2><p>" +
      printName +
      "</p><p>" +
      printAge +
      "</p><p>" +
      printLocation +
      "</p><p>" +
      printExperience +
      "</p><p>" +
      printChallenge +
      "</p><p>" +
      printAdapt +
      "</p>";
  }
}
