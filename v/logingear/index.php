<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Login | ShaadiPlan</title>
    <link rel="shortcut icon" href="../../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower|Satisfy" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d6ea2" />
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
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Login</h1>
      </div>
    </nav>
    <h1 class="center" style="font-family: Satisfy; color: #01579b;">Login to your account</h1>
    <div class="container">
      <div class="row">
        <div class="col s8 offset-s2">
          <div class="card-panel grey lighten-4 z-depth-2" style="height: 320px;">
            <form  action="login.php" method="POST" enctype="multipart/form-data">
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="email" type="email" placeholder = "Email" class="validate" required="" aria-required="true">
              </div>
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="pin" type="password" placeholder = "Password" class="validate" required="" aria-required="true">
              </div>
              <div class="input-field col s6 offset-s3 left" style="width: 50%; margin-top: -5px;">
                <a href="forgot-password">Forgot Password?</a>
              </div>
              <div class="center" style="margin-top: 30px;">
                <input class="center waves-effect waves-light btn light-blue darken-4 white-text" value="SUBMIT" type="submit">
              </div>
            </form>
            <p class="center">Don't have an account? <a href="../signupgear"> REGISTER </a></p>
            <p class="center">OR <a href="../../v"><button class="button"><span>I am a vendor </span></button></a></p>
          </div>
        </div>
      </div>
    </div>
    <footer class="page-footer white" style="margin-top: 47px;">
        <div class="footer-copyright light-blue darken-4">
              <div class="container">
              &copy; 2018 ShaadiPlan
              <a class="white-text right" href="about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
              <a class="white-text right" href="invite" style="font-size: 15px;">Invite&nbsp;&nbsp;&nbsp;&nbsp;|</a>
              </div>
            </div>
    </footer>
  </body>
  </html>
