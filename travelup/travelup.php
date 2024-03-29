<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TravelUp</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Link to Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Link to CSS -->
    <link rel="stylesheet" href="travelup.css" />
  </head>
  <body>
        <!-- Navbar -->
    <div id="navbar">
      <img src="travelup.png" style="width: 110px; height: 40px;"/ >
      <a href="countdown.php" id="countdown-timer" class="navItem timer"></a>
      <a href="login.php"
        ><img
          src="spaceman.png"
          style="width: 45px; height: 45px"
          class="navItem profile"
      /></a>
    </div>

    <!-- Landing Section -->
    <header id="landing-bg">
      <h1 style="margin-top: 15%">Plan Your Visit To Mars</h1>
      <p class="padding-16" style="font-size: 18px">
        Embark on the ultimate adventure of a lifetime and transcend the
        boundaries of Earth, as you journey to the captivating crimson
        landscapes of Mars, where the mysteries of the universe await your
        exploration.
      </p>
      <button style="padding: 12px 24px; margin: 3%">Get Started</button>
    </header>

    <!-- First Section -->
    <div class="light-grey" style="padding: 3%; margin-bottom: 1%">
      <div class="content">
        <div class="twothird" style="padding: 3% 3% 3% 0%">
          <!-- Section Title -->
          <h1>Captivating Martian Landscapes</h1>
          <!-- Section Description -->
          <h5 class="padding-16">
            Prepare to be mesmerized as you step foot on the red planet and
            witness an otherworldly spectacle like no other. Marvel at the
            grandeur of towering rusty-hued mountains, vast serene deserts
            stretching into the horizon, and deep valleys carved by ancient
            rivers. Immerse yourself in the ethereal beauty of Mars' unique
            geological formations, where every step unveils a breathtaking
            vista. From the hauntingly beautiful polar ice caps to the
            captivating dust storms that sweep across the barren plains, this
            journey promises an awe-inspiring encounter with a world that has
            fascinated humanity for centuries.
          </h5>
        </div>
        <div class="center"><img src="landscape.png" id="sectImgs" / ></div>
      </div>
    </div>

    <!-- Second Section -->
    <div class="light-grey" style="padding: 3%; margin-bottom: 1%">
      <div class="content">
        <div class="center"><img src="view.png" id="sectImgs"/ ></div>
        <div class="twothird" style="padding: 3% 0% 3% 3%">
          <!-- Section Title -->
          <h1>Earth from the Celestial Frontier</h1>
          <!-- Section Description -->
          <h5 class="padding-16">
            Experience a perspective unlike any other as you gaze upon our
            beloved blue planet from the depths of outer space. Behold the
            awe-inspiring view of Earth as a radiant jewel suspended in the inky
            vastness, casting a mesmerizing glow against the backdrop of the
            star-studded cosmos. Witness the delicate swirls of clouds, the
            vibrant tapestry of land and water, and the breathtaking hues of
            sunrise and sunset that paint the skies. From this vantage point,
            gain a profound appreciation for the interconnectedness of our
            planet and the fragility of our existence. Let this unparalleled
            view of Earth from space forever change the way you perceive our
            home.
          </h5>
        </div>
      </div>
    </div>

    <!-- Third Section -->
    <div class="light-grey" style="text-align: center; margin-bottom: 1%">
      <br />
      <!-- Section Title -->
      <h1>Choose Your Room Plan</h1>
      <!-- Silver -->
      <div class="row">
        <div class="column">
          <div class="card">
            <img src="bedroom 2.png" class="roomImgs" />
            <h2 id="silver">SILVER</h2>
            <h1 class="title"><b>$1,500</b></h1>
            <span>/ a month</span>
            <div class="desc-margin">
              <p>
                A 1 bedroom, 1 bathroom pod room designed for functional and
                comfortable living. While storage is limited, the room is
                thoughtfully arranged to optimize the available space. Ideal for
                those seeking simplicity and functionality.
              </p>
            </div>
            <p><button class="book">Book Now</button></p>
          </div>
        </div>
        <!-- Gold -->
        <div class="column">
          <div class="card">
            <img src="bedroom 1.png" class="roomImgs" />
            <h2 id="gold">GOLD</h2>
            <h1 class="title"><b>$2,500</b></h1>
            <span>/ a month</span>
            <div class="desc-margin">
              <p>
                Can be a 1 or 2 bedroom suite. The bathroom is complete with
                modern amenities and a shower. Ample storage space allows for
                organization of belongings, while a TV ensures entertainment.
                Experience comfort and convenience.
              </p>
            </div>
            <p><button class="book">Book Now</button></p>
          </div>
        </div>
        <!-- Platinum -->
        <div class="column">
          <div class="card">
            <img src="bedroom 3.png" class="roomImgs" />
            <h2 id="platinum">PLATINUM</h2>
            <h1 class="title"><b>$5,000</b></h1>
            <span>/ a month</span>
            <div class="desc-margin">
              <p>
                Can be a 1 or 2 bedroom living area adorned with plants and a
                state-of-the-art TV. Abundant storage space ensures a
                clutter-free environment, while the luxury bathroom provides a
                sanctuary of relaxation. Indulge in the epitome of lavish
                comfort.
              </p>
            </div>
            <p><button class="book">Book Now</button></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Fourth Section -->
    <div class="light-grey" style="padding: 3%">
      <div class="content">
        <!-- Subscribe to Newsletter -->
        <form action="/action_page.php">
          <h2>Subscribe to Our Newsletter</h2>
          <p>
            Subscribe to the TravelUp newsletter and join the pioneers of Mars
            exploration. Stay informed about captivating insights, cutting-edge
            research, and exclusive updates as we unravel the mysteries of the
            Red Planet. Be part of a community of space enthusiasts and witness
            history in the making. Let the wonders of Mars ignite your
            imagination. Subscribe now and fuel your passion for exploration.
          </p>
          <!-- Email Input -->
          <input type="text" placeholder="Email address" name="mail" required />
          <!-- Daily Newsletter Checkbox -->
          <label>
            <input type="checkbox" checked="checked" name="subscribe" /> Daily
            Newsletter
          </label>
          <!-- Subscribe Button -->
          <input type="submit" value="Subscribe" />
        </form>

        <!-- Social Media -->
        <div style="margin-left: 5%">
          <h3 id="follow">Follow Our Journey On Social Media</h3>
          <div style="display: inline-block">
            <img src="video.png" id="video" style="width: 90%" />
            <div style="float: right; margin-right: 0%">
              <i class="fa fa-facebook-official hover-opacity i-large"></i>
              <br />
              <i class="fa fa-instagram hover-opacity i-large"></i>
              <br />

              <i class="fa fa-snapchat hover-opacity i-large"></i>
              <br />

              <i class="fa fa-pinterest-p hover-opacity i-large"></i>
              <br />

              <i class="fa fa-twitter hover-opacity i-large"></i>
              <br />

              <i class="fa fa-linkedin hover-opacity i-large"></i>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="padding-16" style="margin-left: 3%">
      <p>Website by Frances Caldwell</p>
      <span
        ><a href="application.php"
          >Apply to be a Pilot on the Celestial Frontier</a
        ></span
      >
    </footer>
    <script src="travelup.js"></script>
  </body>
</html>
