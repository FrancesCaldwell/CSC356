document.addEventListener("DOMContentLoaded", function () {
  // Array of countdown events with dates and ship names
  var countdownEventsArray = [
    { date: new Date("August 5, 2023 15:37:25").getTime(), shipName: "Ship A" },
    {
      date: new Date("August 10, 2023 12:00:00").getTime(),
      shipName: "Ship B",
    },
    {
      date: new Date("August 15, 2023 18:30:00").getTime(),
      shipName: "Ship C",
    },
    {
      date: new Date("August 20, 2023 18:30:00").getTime(),
      shipName: "Ship D",
    },
  ];

  // Find the most recent event based on the date and not expired
  var currentTime = Date.now();
  var mostRecentEvent = countdownEventsArray
    .filter(function (event) {
      return event.date > currentTime;
    })
    .reduce(function (prev, current) {
      return current.date < prev.date ? current : prev;
    }, countdownEventsArray[0]);

  var currentIndex = countdownEventsArray.indexOf(mostRecentEvent);

  // Update the count down every 1 second
  var x = setInterval(function () {
    // Get today's date and time
    var now = new Date().getTime();

    // Check if there are any remaining countdown events
    if (currentIndex < countdownEventsArray.length) {
      // Find the distance between now and the current countdown date
      var distance = countdownEventsArray[currentIndex].date - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor(
        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Check if the time is within a week of the current countdown date
      var oneWeekBefore =
        countdownEventsArray[currentIndex].date - 7 * 24 * 60 * 60 * 1000;

      // Get the element to display countdown text (assuming you have different ids for each page)
      var countdownTextElement = document.getElementById("current-ship");

      if (now >= oneWeekBefore) {
        // Show "Pack your bags" message
        document.getElementById("countdown-timer").textContent =
          "Pack your bags";
        if (countdownTextElement) {
          // Show ship name on the specific page
          countdownTextElement.textContent =
            countdownEventsArray[currentIndex].shipName + " Launch";
        }
      } else {
        // Output the remaining time in the element with id="demo"
        document.getElementById("countdown-timer").textContent =
          days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        if (countdownTextElement) {
          // Show ship name on the specific page
          countdownTextElement.textContent =
            countdownEventsArray[currentIndex].shipName + " Launch";
        }
      }

      // Check if the current countdown date has expired
      if (now >= countdownEventsArray[currentIndex].date) {
        // Move to the next item in the array
        currentIndex++;
      }
    } else {
      // All countdown events have expired, clear the interval and hide the countdown
      clearInterval(x);
      document.getElementById("countdown-timer").style.display = "none";
      document.getElementById("current-ship").style.display = "none";
    }
  }, 1000);
});
