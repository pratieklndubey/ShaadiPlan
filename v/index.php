<?php
  session_start();
  if(array_key_exists('email',$_SESSION) && !empty($_SESSION['email']))
  {
    if(empty($_SESSION['city']))
    {
      if($_SESSION['type'] == 'client')
      {
        header ('location: ../c/setupgear');
      }
      if($_SESSION['type'] == 'vendor')
      {
        header ('location: setupgear');
      }
    }
    else {
      if($_SESSION['type'] == 'client')
      {
        header ('location: ../c/dashboard');
      }
      if($_SESSION['type'] == 'vendor')
      {
        header ('location: dashboard');
      }
    }
  }
  else {
    $_SESSION['type'] = NULL;
    $_SESSION['email'] = NULL;
    $_SESSION['city'] = NULL;
  }
 ?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Vendor | ShaadiPlan</title>
    <link rel="shortcut icon" href="../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="author" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain">
    <meta name="subject" content="Wedding Planning Website"/>
    <meta name="classification" content="Wedding"/>
    <meta name="Language" content="English"/>
    <meta name="Designer" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain"/>
    <style>
    ::placeholder
    {
      color: black;
    }
    </style>
  </head>
  <body>
    <nav id="home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">VENDOR</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 18px;" class="right"><a data-toggle="modal" class="modal-trigger" href="#login">Login</a></h1>
      </div>
    </nav>
    <div id = "login" class="modal grey lighten-2">
      <h5 class="header center light-blue-text text-darken-4" style="font-family:Handlee; margin-top: 10px;">Login to ShaadiPlan</h5>
      <a class="modal-close waves-effect waves-grey btn-flat right" style="top: -45px;"><i class="material-icons">close</i></a>
      <div class="row">
        <form action="logingear/login.php" method="POST">
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
          <a style="font-size:20px;" href="../">I am a client</a>
        </div>
      </div>
    </div>
    <div id = "signup" class="modal grey lighten-2">
      <h5 class="header center light-blue-text text-darken-4" style="font-family:Handlee; margin-top: 10px;">Signup with ShaadiPlan</h5>
      <a class="modal-close waves-effect waves-grey btn-flat right" style="top: -45px;"><i class="material-icons">close</i></a>
      <div class="row">
        <form action="signupgear/signup.php" method="POST">
          <div class="input-field col s6 offset-s3 center" style="width: 50%; ">
            <input name = "name" type="text" placeholder = "Name of the business" class="validate" required="" aria-required="true">
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
          <a style="font-size:20px;" href="../">I am a client</a>
        </div>
      </div>
    </div>
    <div style="width:100%; height: 480px; vertical-align: top;"class="parallax-container">
      <div class="section no-pad-bot">
        <div class="container">
          <br><br><br>
          <h2 class="header center white-text" style="font-family:Handlee;">Grow your business with us!</h2>
            <h4 class="header center white-text" style="font-family:Gloria Hallelujah;">Let's make the couples smile :)</h4>
            <h4 class="header center" style="margin-top: 200px;"><a data-toggle="modal" class="modal-trigger" href="#signup"><button class="button" style="color: #ffffff;font-size: 25px;"><span>Register as a vendor </span></button></a><a href="../c/vendors"><button class="button" style="color: #ffffff;font-size: 25px;"><span>Hire a vendor </span></button></a></h4>
        </div>
      </div>
      <div class="parallax"><img src="../image/vendor_bg.jpg"></div>
    </div>
    <div class = "section white">
      <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">Frequently asked questions</h2>
        <h4 class="red-text text-darken-2 center header col s12 white-text" style="font-family:Gloria Hallelujah;">We will not leave you in any doubt!</h4>
        <hr width="84%" style="margin-left: 60px;">
        <div class="container" style="width: 1200px;">
          <div class="row">
            <div class="col s11">
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>What is Shaadiplan? </div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Shaadiplan is India’s Most Loved Wedding Planning Platform where couples can hire wedding vendors, get ideas & inspiration for various events & services, and plan their wedding conveniently & cost-effectively. We connect couples with quality vendors to plan their big day & enable vendors in building and growing their business online.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>How does Shaadiplan work?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Couples who are looking for the services that you offer, can check relevant details, rating, reviews and past work from your profile. Couples will directly contact you & send you their specific requirements on email and mobile phone.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>How does the approval process work?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Couples come to Shaadiplan to choose vendors who they can trust on their biggest day of life. To ensure that, after you fill up your business details and ‘SEND FOR APPROVAL’, we check the veracity of the information provided by you. In case of discrepancy or non availability of information, we would ask you to provide more information. After that, your profile is approved.
                    After you have filled the information, you would be prompted to collect 3 reviews from your past customers on your Shaadiplan profile. We urge you to facilitate this step as reviews would go long way in building trust in your brand and services.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>What are the charges for my online profile?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Listing your business on Shaadiplan is Absolutely Free.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>How is it FREE? Is there a catch or bluff?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Let us assure you, there is no catch (pinky promise ☺). Our aim is to create an ecosystem for wedding planning which is trusted by all Stakeholders, Couples and Service providers.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>In which all categories can I create my Shaadiplan profile?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Currently, you can create profile in one or more categories out of the following:- Wedding Photographer/Videographer- Makeup Artist- Wedding Venue- Wedding Decorator/Florist- Mehndi Artist- Wedding Invitation- Choreographer- DJ- Bridal Designer- Wedding Planner</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>I don’t have a website. Can I create my Shaadiplan profile?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Yes, you can do it. You don’t necessarily need a website. Your Facebook/Instagram page should be enough in establishing credibility with potential customers.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>I already have enough business. Why should I go online on Shaadiplan?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>70% of the couples in major cities go online to decide about at least one of their wedding services. And the trend is upwards only. Building a strong brand online, starting with Shaadiplan would Future-Proof your brand.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>Can I get business from outside India on Shaadiplan?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>20-25% of our couples are from outside India, mainly USA. NRI’s who are planning their wedding in India as well as abroad can contact you directly.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>Why is Shaadiplan better than other options?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>Shaadiplan gives you control & freedom to build & maintain your brand online. With all customer details that we provide & ever-evolving features, we ensure that only the interested couples contact you. Our best-in-industry Tech ensures that you get high visibility in Google search results. We invest significantly in all available marketing channels to ensure you are able to reach the largest online customer base from the comfort of your own space.</span></div>
                </li>
                <li>
                  <div class="light-blue-text text-darken-4 collapsible-header active"><i class="material-icons">dashboard</i>Still in doubt?</div>
                  <div class="light-blue darken-4 white-text collapsible-body"><span>You can contact us on: letstalk@shaadiplan.com | +91-7267819282</span></div>
                </li>
              </ul>
            </div>
            <div class="col s1">
              <img src = "../image/side_decor.png">
            </div>
          </div>
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
              <li><a href="vendors"class="waves-effect waves-light btn light-blue darken-4">Hire a vendor</a>
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
              <a class="white-text right" href="../" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
              <a class="white-text right" href="invite" style="font-size: 15px;">Invite&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
