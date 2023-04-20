<?php
  session_start();
  if(array_key_exists('email',$_SESSION) && !empty($_SESSION['email']))
  {
    if(empty($_SESSION['city']))
    {
      if($_SESSION['type'] == 'client')
      {
        header ('location: c/setupgear');
      }
      if($_SESSION['type'] == 'vendor')
      {
        header ('location: v/setupgear');
      }
    }
    else {
      if($_SESSION['type'] == 'client')
      {
        header ('location: c/dashboard');
      }
      if($_SESSION['type'] == 'vendor')
      {
        header ('location: v/dashboard');
      }
    }
  }
  else {
    $_SESSION['type'] = NULL;
    $_SESSION['email'] = NULL;
    $_SESSION['city'] = NULL;
  }
 ?>
﻿<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>ShaadiPlan</title>
    <link rel="shortcut icon" href="image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link rel="stylesheet" href="css/main.css">
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

  </style>

  </head>
  <body>
    <div class="fixed-action-btn horizontal">
    <a href="#home" class="btn-floating btn-large light-blue darken-4">
      <i class="material-icons">keyboard_arrow_up</i>
    </a>
  </div>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="about">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="image/icon.png"></a>
        <h1 style="font-size: 20px;font-family: Handlee; margin-top: 15px;"class="brand-logo center"><img style="margin-top: 5px;margin-right: 4px; width: 10px;" src="image/arrow_down.png"><a href = "#vendor">VENDORS &nbsp;&nbsp;|&nbsp;&nbsp; <a href="c/invite">INVITE</a></h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 18px;" class="right"><a data-toggle="modal" class="modal-trigger" href="#login">Login</a></h1>
      </div>
    </nav>
    <div id = "login" class="modal grey lighten-2">
      <h5 class="header center light-blue-text text-darken-4" style="font-family:Handlee; margin-top: 10px;">Login to ShaadiPlan</h5>
      <a class="modal-close waves-effect waves-grey btn-flat right" style="top: -45px;"><i class="material-icons">close</i></a>
      <div class="row">
        <form action="c/logingear/login.php" method="POST">
          <div class="input-field col s6 offset-s3 center" style="width: 50%; ">
            <input name = "email" type="email" placeholder = "Email" class="validate" required="" aria-required="true">
          </div>
          <div class="input-field col s6 offset-s3 center" style="width: 50%; margin-top: -5px;">
            <input name = "pin" type="password" placeholder = "Password" class="validate" required="" aria-required="true">
          </div>
          <div class="input-field col s6 offset-s3 left" style="width: 50%; margin-top: -5px;">
            <a href="forgot-password">Forgot Password?</a>
          </div>
          <div class="input-field col s6 offset-s3 left center" style="width: 50%;">
            <input class="waves-effect waves-light btn light-blue darken-4 white-text" value="LOGIN" type="submit">
          </form>
          <p class="center">Don't have an account? <a class="modal-close modal-trigger"href="#signup"> REGISTER </a></p>
          <p class="center">OR</p>
          <a style="font-size:20px;" href="v">I am a vendor</a>
        </div>
      </div>
    </div>
    <div id = "signup" class="modal grey lighten-2">
      <h5 class="header center light-blue-text text-darken-4" style="font-family:Handlee; margin-top: 10px;">Signup with ShaadiPlan</h5>
      <a class="modal-close waves-effect waves-grey btn-flat right" style="top: -45px;"><i class="material-icons">close</i></a>
      <div class="row">
        <form action="c/signupgear/signup.php" method="POST">
          <div class="input-field col s6 offset-s3 center" style="width: 25%; ">
            <input name = "fname" type="text" placeholder = "First Name" class="validate" required="true" >
          </div>
          <div class="input-field col s6 center" style="width: 25%; ">
            <input name = "lname" type="text" placeholder = "Last Name" class="validate" required="true" >
          </div>
          <div class="input-field col s6 offset-s3 center" style="width: 50%; margin-top: -5px;">
            <input name = "email" type="email" placeholder = "Email" class="validate" required="" aria-required="true">
          </div>
          <div class="input-field col s6 offset-s3 center" style="width: 50%; margin-top: -5px;">
            <input name = "pin" type="password" placeholder = "Password" class="validate" required="" aria-required="true">
          </div>
          <div class="input-field col s6 offset-s3 left center" style="width: 50%;">
            <input class="waves-effect waves-light btn light-blue darken-4 white-text" value="SIGNUP" type="submit">
          </form>
          <p class="center">Already have an account? <a class="modal-close modal-trigger"href="#login"> LOGIN </a></p>
          <p class="center">OR</p>
          <a style="font-size:20px;" href="v">I am a vendor</a>
        </div>
      </div>
    </div>
    <div style="width:100%; height: 480px; vertical-align: top;"class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br>
          <h2 class="header center white-text" style="font-family:Handlee;">We plan your wedding like a loved one!</h2>
            <h4 class="header center white-text" style="font-family:Gloria Hallelujah;">Let's find a vendor for your wedding</h4>
            <h4 class="header center" style="margin-top: 100px;"><a href="c/vendors"><button class="button" style="color: #ffffff;font-size: 25px;"><span>Hire a vendor </span></button></a></h4>
        </div>
      </div>
      <div class="parallax"><img src="image/bg.jpg"></div>
    </div>
    <div class="section white ">
      <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee;">Couples love us!</h2>
      <div class="container">
        <div class="row">
          <div class="col s4">
            <div class="z-depth-4 card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="image/couple (1).jpg" height="250" width="200">
              </div>
              <div class="card-content">
                <span class="card-title activator light-blue-text text-darken-4">Hazel and Yuvraj<i class="material-icons right">more_vert</i></span>
                <p>Married Nov 30, 2016</p>
              </div>
              <div class="card-reveal">
                <span class="card-title light-blue-text text-darken-4">Hazel and Yuvraj<i class="material-icons right">close</i></span>
                <p>You know how it feels when you want everything to be the best but you have budget constraint. I am so happy with shaadiPlan's enthusiasm to help. Good work guys! </p>
              </div>
            </div>
          </div>
          <div class="col s4">
            <div class="z-depth-4 card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="image/couple (2).jpg" height="250" width="200">
              </div>
              <div class="card-content">
                <span class="card-title activator light-blue-text text-darken-4">Anushka and Virat<i class="material-icons right">more_vert</i></span>
                <p>Married Dec 11, 2017</p>
              </div>
              <div class="card-reveal">
                <span class="card-title light-blue-text text-darken-4">Anushka and Virat<i class="material-icons right">close</i></span>
                <p>The moment we decided on having a destination wedding, the first thing that came to my mind was - the location and the venue. There are a lot of websites providing details but not many actually help you in real when you're looking for the venue. And I'm so glad that we chose shaadiPlan for this. The location was just perfect for my wedding. The property was gorgeous. The staff was courteous. Fantastic job, guys! </p>
              </div>
            </div>
          </div>
          <div class="col s4">
            <div class="z-depth-4 card">
              <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="image/couple (3).jpg" height="250" width="200">
              </div>
              <div class="card-content">
                <span class="card-title activator light-blue-text text-darken-4">Meera and Shahid<i class="material-icons right">more_vert</i></span>
                <p>Married Jul 07, 2015</p>
              </div>
              <div class="card-reveal">
                <span class="card-title light-blue-text text-darken-4">Meera and Shahid<i class="material-icons right">close</i></span>
                <p>Thanks shaadiPlan.com for helping us plan the wedding. You guys set the perfect pitch for this partnership. Kudos to your team! </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="vendor" class="parallax-container" style="height:570px;">
      <h2  class="header center white-text " style="font-family:Handlee;">Vendors for you!</h2>
      <div class="container">
        <div class="row">
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/photo.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Photographer</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/makeup.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Makeup</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/venue.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Venue</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/dance.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Choreographer</p>
              </div>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/invite.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Invitation</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/mehendi.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Mehendi</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/decor.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Decorators</p>
              </div>
          </div>
          </div>
          <div class="col s3">
            <div class="z-depth-4 wrapper">
            <a href = "#" ><img  src = "image/food.jpg"  width="215" height="180"></a>
            <div class= "description">
              <p class="description_content">Catering</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s9 " style="margin-top: -12px;">
          <a href="v"class="waves-effect waves-light btn red darken-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am a vendor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </div>
    <div class="col s3 " style="margin-top: -12px;">
      <a href="c/vendors"><button class="button" style="color: white;"><span>See all categories&nbsp;</span></button></a>
    </div>
    </div>
    </div>
    <div class="parallax"><img src="image/bg2.jpg"></div>
  </div>
  <div class="section white ">
    <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee;">Couple Clickz!!</h2>
    <div class="slider container" style="width: 74%;">
    <ul class="z-depth-5 slides">
      <li>
        <img src="image/slide (1).jpg">
      </li>
      <li>
        <img src="image/slide (2).jpg">
      </li>
      <li>
        <img src="image/slide (3).jpg">
      </li>
      <li>
        <img src="image/slide (4).jpg">
      </li>
    </ul>
  </div>
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
            <li><a href="c\vendors"class="waves-effect waves-light btn light-blue darken-4">Hire a vendor</a>
            <a href="v"class="waves-effect waves-light btn light-blue darken-4">Register as a vendor</a></li>
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
            <a class="white-text right" href="about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
            <a class="white-text right" href="c/invite" style="font-size: 15px;">Invite&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
      $('.modal').modal({
        dismissible: false
      });
      $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
      });
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
