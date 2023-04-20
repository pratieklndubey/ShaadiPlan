<?php
  session_start();
  if(empty($_SESSION['email']) || $_SESSION['type'] == NULL)
  {
    session_destroy();
    header('location: ../../');
  }
  elseif($_SESSION['type'] == 'vendor')
  {
    header('location: ../../v/dashboard');
  }
  elseif (empty($_SESSION['city'])) {
    header('location: ../setupgear');
  }
  require '../../connection.php';
  $conn = connect();
  if($_SESSION['sex'] == 'Boy')
  {
    $background = "../../image/client_bg_m.jpg";
    $color = "header center white-text";
  }
  else {
    $background = "../../image/client_bg_f.jpg";
    $color = "header center light-blue-text text-darken-4";
  }
?>
﻿<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>ShaadiPlan</title>
    <link rel="shortcut icon" href="../../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link rel="stylesheet" href="../../css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="author" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain">
    <meta name="subject" content="Wedding Planning Website"/>
    <meta name="classification" content="Wedding"/>
    <meta name="Language" content="English"/>
    <meta name="Designer" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain"/>
    <style>
    .card{
      margin-left: 30px;
      width: 300px;
    }
    div.wrapper{
	float:left; /* important */
	position:relative; /* important(so we can absolutely position the description div */
}
div.description{
	position:absolute; /* absolute position (so we can position it where we want)*/
	bottom:0px; /* position will be on bottom */
	left:0px;
	width:100%;
	/* styling bellow */
	background-color:black;
	color:white;
	opacity:0.6; /* transparency */
	filter:alpha(opacity=60); /* IE transparency */
}
p.description_content{
	padding:10px;
	margin:0px;
	font-size: 30px;
}
.fixed-action-btn{
right:10px;/*desired value*/
top: 575px;
}
::placeholder{
  color: black;
}
.inputfile {
    opacity: 0;
    }
  </style>

  </head>
  <body>
    <div class="fixed-action-btn horizontal">
    <a href="#home" class="btn-floating btn-large light-blue darken-4">
      <i class="material-icons">keyboard_arrow_up</i>
    </a>
  </div>
  <form id = "logout"action="logout.php" method="POST">
    </form>
    <script>
    function logoutgear() {
    document.getElementById("logout").submit();
}
    </script>
  <ul id = 'options' class='dropdown-content'>
    <li><a href="../config" class="light-blue-text text-darken-4" style="font-size: 20px;">Settings</a></li>
    <li class="divider"></li>
    <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
  </ul>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../2about">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 20px;"class="brand-logo center">Welcome</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['fname'];?></a></h1>
    </nav>
    <div style="width:100%; height: 480px; vertical-align: top;"class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br>
          <h2 <?php echo "class = '".$color."'";?> style="font-family:Handlee;">We plan your wedding like a loved one!</h2>
          <h4 <?php echo "class = '".$color."'";?> style="font-family:Gloria Hallelujah;">Let's find a vendor for your wedding</h4>
        </div>
      </div>
      <div class="parallax"><?php echo "<img src='".$background."'>"; ?></div>
    </div>
    <div class="section white">
      <?php
      $client = $_SESSION['email'];
      $bookings = $conn->query("SELECT * FROM orders WHERE client = '$client'");
      if($bookings->num_rows == 0)
      {
        echo "<h4 class='header center' style='color: #01579b; font-family: Handlee;'>You have not placed any order yet</h4>";
      }
      else {
        while ($list = mysqli_fetch_array($bookings))
        {
          $vendor = $list['vendor'];
          $vdetail = $conn->query("SELECT name,category,id FROM vendor WHERE email = '$vendor'");
          $ordet = $vdetail->fetch_assoc();
          echo "<h4 class='header center' style='color: #000000; font-family: Handlee;'>You have an order with <a href='../vendor/".$ordet['id']."'>".$ordet['name']."</a> for the ".$ordet['category']." of your wedding</h4>";
        }
      }
      ?>
      <h4 class="header center"><a href="../vendors"><button class="button" style="color: #01579b;font-size: 25px;"><span>Hire a vendor </span></button></a></h4>
    </div>
    <div class="section grey lighten-2">
      <h1  class="header" style="margin-left:30px;margin-top:50px;font-family:Handlee;">Create a wedding web invite</h1>
      <p style="font-size: 20px;margin-left:36px; margin-top: -20px;font-family:Gloria Hallelujah">Just pick a template and you're done in 3 simple steps!</p>
      <br>
      <div class="container center" style="height: 130px; width: 80%;">
        <div class="row">
          <div class="col s4">
            <h5 style="font-family: Indie Flower;"><i style="font-size: 30px;"class="material-icons">line_style</i>Choose a template</h5>
          </div>
          <div class="col s4">
            <h5 style="font-family: Indie Flower;"><i style="font-size: 30px;"class="material-icons">create</i>Personalize the template</h5>
          </div>
          <div class="col s4">
            <h5 style="font-family: Indie Flower;"><i style="font-size: 30px;"class="material-icons">share</i>Share and spread the word</h5>
          </div>
        </div>
      </div>
      <a href="../invite"><button class="button" style="color: black; margin-left: 50px;"><span>Create a web invite&nbsp;</span></button></a>
    </div>
    <div id="vendor" class="parallax-container" style="height:570px;">
      <h2  class="header center white-text " style="font-family:Handlee;">Vendors for you!</h2>
      <div class="container">
        <div class="row">
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/photo.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Photographer</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/makeup.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Makeup</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/venue.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Venue</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/dance.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Choreographer</p>
              </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/invite.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Invitation</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/mehendi.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Mehendi</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/decor.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Decorators</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "../../image/food.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Catering</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
    <div class="col s3 " style="margin-top: -12px;">
      <a href="../vendors"><button class="button" style="color: white;"><span>See all categories&nbsp;</span></button></a>
    </div>
    </div>
    </div>
    <div class="parallax"><img src="../../image/client_bg2.jpg"></div>
  </div>
  <footer class="page-footer grey lighten-2">
    <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">ShaadiPlan</h2>
      <h4 class="red-text text-darken-2 center header col s12 white-text" style="font-family:Gloria Hallelujah;">We plan your wedding like a loved one!</h4>
      <hr width="70%">
      <div class="container">
        <div class="row">
          <div class="col s9">
            <ul><li>
            <p class="grey-text text-darken-2"style="font-family: Gloria Hallelujah; font-size: 20px;">shaadiPlan is India’s most loved Wedding Planning website! Check prices, verified reviews and book best wedding photographers, bridal makeup artists, wedding venues, decorators, and all other wedding vendors at guaranteed best prices. Get loads of latest wedding ideas & inspiration - bridal fashion, makeup and skincare tips, bachelorette & honeymoon ideas from India's largest wedding community & real weddings. shaadiPlan is proud to have been the official wedding planner of celebrities like Yuvraj Singh & Bhuvneshwar Kumar. We love what we do, and that's how we help plan your wedding like a loved one!</p></li>
            <li><a href="../vendors"class="waves-effect waves-light btn light-blue darken-4">Hire a vendor</a>
            </li>
              <li><h4 class="black-text"style="font-family: Handlee; font-size: 20px; margin-left: 20px;">Contact Us!</h4></li>
              <li><h4 class="grey-text text-darken-2"style="font-family: Handlee; font-size: 20px; margin-left: 20px;">letstalk@shaadiplan.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91 7267819282</h4></li>
            </ul>
          </div>
          <div class="col s3">
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
            <a class="white-text right" href="../../about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
            </div>
          </div>
  </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/evil-icons@1.9.0/assets/evil-icons.min.js"></script>
    <script>
    $(document).ready(function() {
      $('.parallax').parallax();
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
    $("nav,div").find("a").click(function(e) {
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top
    });
});
  </script>
  </body>
  </html>
