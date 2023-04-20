<?php
session_start();
if($_SESSION['type'] == 'vendor')
{
  header("location: ../v/dashboard");
}
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>About | ShaadiPlan</title>
    <link rel="shortcut icon" href="../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d6ea2" />
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="author" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain">
    <meta name="subject" content="Wedding Planning Website"/>
    <meta name="classification" content="Wedding"/>
    <meta name="Language" content="English"/>
    <meta name="Designer" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain"/>
  </head>
  <body>
    <form id = "logout"action="../c/dashboard/logout.php" method="POST">
      </form>
      <script>
      function logoutgear() {
      document.getElementById("logout").submit();
  }
      </script>
    <ul id = 'options' class='dropdown-content'>
      <li><a href="../c/config" class="light-blue-text text-darken-4" style="font-size: 20px;">Settings</a></li>
      <li class="divider"></li>
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id="home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../image/icon.png"></a>
        <h1 style="font-size: 35px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">ABOUT</a></h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 18px;" class="right">
          <?php
          if (empty($_SESSION['email'])) {
            echo "<a href='../c/logingear'>Login</a>";
          }
          else {
            echo "<a class='dropdown-button' href='' data-activates='options'>".$_SESSION['fname']."</a>";
          }
          ?>
        </h1>
      </div>
    </nav>
    <div style="width:100%; height: 480px; vertical-align: top;"class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br><br><br>
          <h2 class="header center white-text" style="font-family:Handlee;">We plan your wedding like a loved one!</h2>
            <h4 class="header center white-text" style="font-family:Indie Flower;">India's leading service for wedding planning</h4>
        </div>
      </div>
      <div class="parallax"><img src="../image/about_bg.jpg"></div>
    </div>
    <div class="section white">
      <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee;">What is ShaadiPlan?</h2>
      <hr width="70%">
      <div class="center container">
        <div class="row">
          <div class="col s12">
            <ul><li>
            <p class="grey-text text-darken-2"style="font-family: Gloria Hallelujah; font-size: 20px;">shaadiPlan is India's most loved Wedding Planning website! Check prices, verified reviews and book best wedding photographers, bridal makeup artists, wedding venues, decorators, and all other wedding vendors at guaranteed best prices. Get loads of latest wedding ideas & inspiration - bridal fashion, makeup and skincare tips, bachelorette & honeymoon ideas from India's largest wedding community & real weddings. shaadiPlan is proud to have been the official wedding planner of celebrities like Yuvraj Singh & Bhuvneshwar Kumar. We love what we do, and that's how we help plan your wedding like a loved one!</p></li>
            <hr width="70%">
            <li><a class="waves-effect waves-light btn light-blue darken-4">Hire a vendor</a>
            <a href = "../vendor"class="waves-effect waves-light btn light-blue darken-4">Register as a vendor</a></li>
              <li><h4 class="black-text"style="font-family: Handlee; font-size: 20px; margin-left: 20px;">Contact Us!</h4></li>
              <li><h4 class="grey-text text-darken-2"style="font-family: Handlee; font-size: 20px; margin-left: 20px;">letstalk@shaadiplan.com | +91-7267819282</h4></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <footer class="page-footer grey lighten-2">
      <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">ShaadiPlan Family</h2>
        <h4 class="red-text text-darken-2 center header col s12 white-text" style="font-family:Gloria Hallelujah;">We plan your wedding like a loved one!</h4>
        <hr width="70%">
        <div class="container">
          <div class="row">
            <div class="col s9">
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">code</i>Prateek Dubey </div>
                  <div class="light-blue darken-4 collapsible-body"><span>Prateek Dubey is the one who developed the entire back-end, plus the logic running the front-end of this website.
You can know more about this amazing personality &#64; his personal<a target="_blank" href="https://sh0onya.github.io/PrAtEek/"> website</a> .</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header"><i class="material-icons">dashboard</i>Pawan Chaturvedi</div>
                  <div class="light-blue darken-4 collapsible-body"><span>Pawan Chaturvedi is the one who designed the entire front-end of this website.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header"><i class="material-icons">store</i>Prashant Jain</div>
                  <div class="light-blue darken-4 collapsible-body"><span>Prashant Jain is the one developed the entire database for this website.</span></div>
                </li>
              </ul>
            </div>
            <div class="col s3" >
              <h4 class="black-text"style="font-family: Handlee; font-size: 30px; margin-left: 20px;">Follow us on</h4>
                  <a target="_blank" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Facebook" href="https://www.facebook.com/shaadiplan"><div data-icon="ei-sc-facebook" data-size="m"></div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a target="_blank" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Twitter" href="https://www.twitter.com/shaadiplan"><div data-icon="ei-sc-twitter" data-size="m"></div></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a target="_blank" class="tooltipped" data-position="bottom" data-delay="25" data-tooltip="Instagram" href="https://www.instagram.com/shaadiplan"><div data-icon="ei-sc-instagram" data-size="m"></div></a>
            </div>
          </div>
        </div>
        <div class="footer-copyright light-blue darken-4">
              <div class="container">
              &copy; 2018 ShaadiPlan
              <a class="white-text right" href="../" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
              </div>
            </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/evil-icons@1.9.0/assets/evil-icons.min.js"></script>
    <script>
    $(document).ready(function() {
      $('.parallax').parallax();
      $('.slider').slider();
      $('.collapsible').collapsible();
      $('.dropdown-button').dropdown({
    inDuration: 300,
    outDuration: 225,
    constrainWidth: false,
    hover: true,
    gutter: 0,
    belowOrigin: true,
    alignment: 'left',
    stopPropagation: false
  }
);
    });
  </script>
  </body>
  </html>
