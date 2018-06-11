<!DOCTYPE html>
<html>
  <head>
    <title>eDrive - Welcome to eDrive</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/LOGO.png"/>
    <!-- CSS Libs -->
    <link rel="stylesheet" href="css/w3css.css">
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <!-- Navigation Bar -->
    <nav class="w3-bar w3-top w3-theme w3-padding-large">
      <a href="index.php" class="w3-bar-item w3-animate-zoom">
        <img src="images/LOGO Word White.png" height="30" alt="Logo"/>
      </a>
      <a href="#" class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom w3-hide-large" onclick="w3.toggleShow('#min-menu')"><i class="fa fa-bars fa-2x"></i></a>
      <div class="w3-hide-small w3-hide-medium">
        <button class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom" onclick="w3.toggleShow('#reg');"><i class="fa fa-user-circle"></i> Register</button>
        <button class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom" onclick="w3.toggleShow('#login')"><i class="fa fa-sign-in"></i> Login</button>
        <a href="#features" class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom"><i class="fa fa-diamond"></i> Features</a>
        <a href="#about" class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom"><i class="fa fa-vcard"></i> About</a>
        <a href="#get-started" class="w3-bar-item w3-button w3-right w3-hover-opacity w3-animate-zoom"><i class="fa fa-send"></i> Get Started</a>
      </div>
      <div id="min-menu" style="display: none;" class="w3-bar w3-hide-large w3-bar-block w3-padding-small w3-theme w3-border-top w3-border-white">
        <a href="#get-started" class="w3-bar-item w3-button w3-hover-opacity w3-animate-zoom"><i class="fa fa-send"></i> Get Started</a>
        <a href="#about" class="w3-bar-item w3-button w3-hover-opacity w3-animate-zoom"><i class="fa fa-vcard"></i> About</a>
        <a href="#features" class="w3-bar-item w3-button w3-hover-opacity w3-animate-zoom"><i class="fa fa-vcard"></i> Features</a>
        <button class="w3-bar-item w3-button w3-hover-opacity w3-animate-zoom" onclick="w3.toggleShow('#login')"><i class="fa fa-sign-in"></i> Login</button>
        <button class="w3-bar-item w3-button w3-hover-opacity w3-animate-zoom" onclick="w3.toggleShow('#reg');"><i class="fa fa-user-circle"></i> Register</button>
      </div>
    </nav>
    
    <?php if(isset($_COOKIE['error']) && $_COOKIE['error'] != ""){ ?>
    <!-- Error Message -->
    <div class="w3-panel w3-red w3-animate-top w3-top w3-display-container w3-display-topmiddle" style="width: 50%; margin-top: 70px; position: absolute;" id="error">
      <span onclick="w3.toggleShow('#error')" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
      <h3><i class="fa fa-exclamation-triangle"></i> Error</h3>
      <p><?php echo($_COOKIE["error"]) ?></p>
    </div>
    <?php setcookie("error", "", 1); } ?>

    <!-- Slider -->
    <div class="w3-display-container" style="margin-top: 70px;">
      <div class="slide w3-animate-opacity">
        <img src="images/slide4.png" alt="Slide 1" style="width: 100%"/>
        <div class="w3-display-topmiddle w3-center w3-padding-64">
          <h1 class="w3-text-theme"><img src="images/LOGO Word.png" height="60" alt="Logo"/></h1>
          <p class="w3-xlarge">All your documents in one drive.</p>
          <a href="#get-started" class="w3-button w3-round-large w3-xlarge w3-theme-d1 w3-bottombar w3-border-theme w3-hover-theme">
            <i class="fa fa-send"></i> Get Started
          </a>
        </div>
      </div>
      <div class="slide w3-animate-opacity">
        <img src="images/slide2.png" alt="Slide 2" style="width: 100%"/>
        <div class="w3-display-topmiddle w3-center w3-padding-64">
          <h1 class="w3-text-theme"><i class="fa fa-desktop fa-2x"></i> <i class="fa fa-tablet fa-2x"></i> <i class="fa fa-mobile fa-2x"></i></h1>
          <p class="w3-xlarge">Take your documents everywhere with you.</p>
          <button onclick="w3.toggleShow('#login')" class="w3-button w3-round-large w3-xlarge w3-theme-d1 w3-bottombar w3-border-theme w3-hover-theme">
            <i class="fa fa-sign-in"></i> Login
          </button>
        </div>
      </div>
      <div class="slide w3-animate-opacity">
        <img src="images/slide1.png" alt="Slide 3" style="width: 100%"/>
        <div class="w3-display-topleft w3-center w3-padding-64 w3-margin w3-margin-left">
          <h1 class="w3-text-theme"><i class="fa fa-play fa-2x"></i><i class="fa fa-pause fa-2x"></i></h1>
          <p class="w3-xlarge">Get your media files along with you on <span class="w3-tag w3-theme w3-xlarge w3-round">eDrive</span></p>
          <button class="w3-button w3-round-large w3-xlarge w3-theme-d1 w3-bottombar w3-border-theme w3-hover-theme" onclick="w3.toggleShow('#reg');">
            <i class="fa fa-user-circle"></i> Register Now
          </button>
        </div>
      </div>
      <div class="slide w3-animate-opacity">
        <img src="images/slide3.png" alt="Slide 4" style="width: 100%"/>
        <div class="w3-display-topright w3-center w3-padding-64 w3-margin w3-margin-right w3-margin-bottom">
          <h1 class="w3-text-theme"><i class="fa fa-cloud-upload fa-2x"></i></h1>
          <p class="w3-xlarge">Get your cloud drive runing now!.</p>
          <a href="#get-started" class="w3-button w3-round-large w3-xlarge w3-theme-d1 w3-bottombar w3-border-theme w3-hover-theme">
            <i class="fa fa-send"></i> Get Started Today
          </a>
        </div>
      </div>

      <a class="w3-display-left w3-button w3-hover-text-theme w3-text-white w3-opacity w3-hover-opacity-off" onclick="slider.previous()">
        <i class="fa fa-chevron-left fa-2x"></i>
      </a>
      <a class="w3-display-right w3-button w3-hover-text-theme w3-text-white w3-opacity w3-hover-opacity-off" onclick="slider.next()">
        <i class="fa fa-chevron-right fa-2x"></i>
      </a>
    </div>
    
    <!-- First Grid -->
    <div id="get-started" class="w3-row-padding w3-padding-64 w3-container">
      <div class="w3-content">
        <div class="w3-third">
          <h1 class="w3-xxxlarge">
            <i class="fa fa-send w3-padding-64 w3-text-theme fa-5x"></i>
          </h1>
        </div>
        <div class="w3-twothird">
          <h1 class="w3-text-theme w3-xxxlarge">Getting Started</h1>
          <h5 class="w3-padding-32 w3-xlarge">It takes just one steps to get your eDrive runing.<br/>Register with your google account, and enjoy the awesome cloud storage that eDrive provides.<br/>Click the button below to get started.</h5>
          <button class="w3-button w3-round-large w3-xlarge w3-theme-d1 w3-bottombar w3-border-theme w3-hover-theme" onclick="w3.toggleShow('#reg');">
            <i class="fa fa-user-circle"></i> Register Now
          </button>
        </div>
      </div>
    </div>
    
    <!-- Second Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container paralax-1">
      <div class="w3-content w3-padding-64 w3-display-container">
        <h1 class="w3-display-middle">
          <span class="w3-tag w3-theme w3-round-large">
            <i class="fa fa-diamond"></i> Designed Just For You
          </span>
        </h1>
        <br/><br/><br/><br/>
      </div>
    </div>
    
    <!-- About Section -->
    <div class="w3-container" style="padding:128px 16px" id="about">
      <h1 class="w3-text-theme w3-xxxlarge w3-center">About eDrive</h1>
      <h3 class="w3-center">Key features of eDrive</h3>
      <div class="w3-row-padding w3-center" style="margin-top:64px">
        <div class="w3-third">
          <i class="fa fa-desktop w3-text-theme w3-margin-bottom fa-5x w3-center"></i>
          <p class="w3-large w3-text-theme">Responsive</p>
          <p class="w3-large">eDrive is designed with a mobile first priority design, for easy access across different devices.</p>
        </div>
        <div class="w3-third">
          <i class="fa fa-play w3-text-theme w3-margin-bottom fa-5x"></i>
          <i class="fa fa-pause w3-text-theme w3-margin-bottom fa-5x"></i>
          <p class="w3-large w3-text-theme">Media</p>
          <p class="w3-large">eDrive is built with support for media files, which enable access to media on the go.</p>
        </div>
        <div class="w3-third">
          <i class="fa fa-diamond w3-text-theme w3-margin-bottom fa-5x"></i>
          <p class="w3-large w3-text-theme">Design</p>
          <p class="w3-large">eDrive is designed just for you, with our user friendly UI(User Interface) and UX(User Experience)</p>
        </div>
      </div>
    </div>
    
    <!-- Features Section -->
    <div id="features" class="w3-container w3-padding-64 w3-dark-grey w3-center paralax-2">
      <h1 class="w3-jumbo"><b>Features</b></h1>
      <p>eDrive offers the following awesome features.</p>

      <div class="w3-row" style="margin-top:64px">
        <div class="w3-col s4">
          <i class="fa fa-bolt w3-text-orange w3-jumbo"></i>
          <p>Fast</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-image w3-text-pink w3-jumbo"></i>
          <p>HD</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-diamond w3-text-white w3-jumbo"></i>
          <p>Design</p>
        </div>
      </div>

      <div class="w3-row" style="margin-top:64px">
        <div class="w3-col s4">
          <i class="fa fa-cloud w3-text-blue w3-jumbo"></i>
          <p>Cloud</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-globe w3-text-amber w3-jumbo"></i>
          <p>Global</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-hdd-o w3-text-cyan w3-jumbo"></i>
          <p>Storage</p>
        </div>
      </div>

      <div class="w3-row" style="margin-top:64px">
        <div class="w3-col s4">
          <i class="fa fa-user w3-text-sand w3-jumbo"></i>
          <p>Stable</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-shield w3-text-orange w3-jumbo"></i>
          <p>Safe</p>
        </div>
        <div class="w3-col s4">
          <i class="fa fa-play w3-text-pink w3-jumbo"></i><i class="fa fa-pause w3-text-pink w3-jumbo"></i>
          <p>Media</p>
        </div>
      </div>
    </div>
    
    <!-- Login Modal -->
    <div id="login" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-border w3-border-theme w3-animate-zoom" style="max-width:500px">

        <div class="w3-center"><br>
          <span onclick="w3.toggleShow('#login')" class="w3-button w3-xlarge w3-text-red w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <span class="w3-xxlarge w3-text-theme"><i class="fa fa-sign-in"></i> Login</span>
        </div>

        <form class="w3-container" action="?login" method="post">
          <div class="w3-section">
            <label class="w3-text-theme"><b><i class="fa fa-envelope"></i> Email Address</b></label>
            <input required class="w3-input w3-border-theme w3-border w3-margin-bottom" type="email" placeholder="Email" name="mail" required>
            <label class="w3-text-theme"><b><i class="fa fa-key"></i> Password</b></label>
            <input required w3-border-theme class="w3-input w3-border-theme w3-border" type="password" placeholder="Password" name="pass" required>
            <button class="w3-button w3-theme w3-block w3-green w3-section w3-padding" name="submit" type="submit"><i class="fa fa-sign-in"></i> Login</button>
          </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <button onclick="w3.toggleShow('#login')" type="button" class="w3-button w3-red">Cancel</button>
          <a class="w3-right w3-padding w3-button w3-hover-light-gray w3-hide-small" onclick="w3.toggleShow('#login'); w3.toggleShow('#reg');">Register</a>
        </div>

      </div>
    </div>
    
    <!-- Register Modal -->
    <div id="reg" class="w3-modal">
      <div class="w3-modal-content w3-card-4 w3-border w3-border-theme w3-animate-zoom" style="max-width:500px">

        <div class="w3-center"><br>
          <span onclick="w3.toggleShow('#reg')" class="w3-button w3-xlarge w3-text-red w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
          <span class="w3-xxlarge w3-text-theme"><i class="fa fa-user-circle"></i> Register</span>
        </div>

        <form class="w3-container" action="?reg" method="post">
          <div class="w3-section">
            <label class="w3-text-theme"><b><i class="fa fa-user-circle"></i> Name</b></label>
            <input required class="w3-input w3-border-theme w3-border w3-margin-bottom" type="text" placeholder="Name" name="name" required>
            <label class="w3-text-theme"><b><i class="fa fa-envelope"></i> Email Address</b></label>
            <input required class="w3-input w3-border-theme w3-border w3-margin-bottom" type="email" placeholder="Email" name="mail" required>
            <label class="w3-text-theme"><b><i class="fa fa-key"></i> Password</b></label>
            <input required w3-border-theme class="w3-input w3-border-theme w3-border" type="password" placeholder="Password" name="pass" required>
            <button class="w3-button w3-theme w3-block w3-green w3-section w3-padding" name="submit" type="submit"><i class="fa fa-user-circle"></i> Register</button>
          </div>
        </form>

        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
          <button onclick="w3.toggleShow('#reg')" type="button" class="w3-button w3-red">Cancel</button>
          <a class="w3-right w3-padding w3-button w3-hover-light-gray w3-hide-small" onclick="w3.toggleShow('#reg'); w3.toggleShow('#login');">Login</a>
        </div>

      </div>
    </div>
    
    <!-- Footer Grid -->
    <div class="w3-container w3-theme-dark w3-padding-24 w3-display-container">
      <p class="w3-center">Designed & Developed By: Mohammed Odunayo Fatai</p>
      <p class="w3-center">Email Address: factman60@gmail.com</p>
      <p class="w3-center">Phone Number: +2347066780373</p>
      <a href="#" class="w3-button w3-large w3-theme-dark w3-hover-opacity w3-circle w3-display-topright w3-padding-16 w3-margin-right" style="margin-top: -30px;">
        <i class="fa fa-arrow-up fa-2x"></i>
      </a>
    </div>

    <!-- JavaScript Libs -->
    <script src="js/w3js.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript">
      var slider = initSlider();
      setTimeout(function(){document.getElementById("login").style.display = "block";}, 8000);
    </script>
  </body>
</html>