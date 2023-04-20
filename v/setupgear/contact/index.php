<?php
  session_start();
  if(empty($_SESSION['email']))
  {
    session_destroy();
    header('location: ../');
  }
  elseif ($_SESSION['type'] == 'client') {
    header('location: ../../../c/dashboard');
  }
  elseif ($_SESSION['city'] == '') {
    header('location: ../../setupgear');
  }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Setup | ShaadiPlan</title>
    <link rel="shortcut icon" href="../../../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower|Satisfy" rel="stylesheet">
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
    <style>
::placeholder{
  color: black;
}
</style>
  </head>
  <body>
    <form id = "logout"action="../../dashboard/logout.php" method="POST">
      </form>
      <script>
      function logoutgear() {
      document.getElementById("logout").submit();
  }
      </script>
    <ul id = 'options' class='dropdown-content'>
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Account Setup</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['name'];?></a></h1>
      </div>
    </nav>
    <h1 class="center" style="font-family: Satisfy; color: #01579b;">How can we contact you?</h1>
    <div class="container">
      <div class="row">
        <div class="col s8 offset-s2">
          <div class="card-panel grey lighten-4 z-depth-2" style="height: 380px;">
            <form  action="contact.php" method="POST">
              <div class="input-field" style="width: 500px; margin-left: 50px;margin-top: -5px;">
                <textarea data-length="100" maxlength="100" style="resize: none;" class="materialize-textarea validate" name="address" required="" aria-required="true" placeholder="Office Address"></textarea>
              </div>
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="pincode" type="text" placeholder = "Area Pincode" class="validate" required="" aria-required="true">
              </div>
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="facebook" type="text" placeholder = "Facebook Page">
              </div>
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="url" type="url" placeholder = "Web Address">
              </div>
              <div class="center" style="margin-top: 30px;">
                <input class="center waves-effect waves-light btn light-blue darken-4 white-text" value="SUBMIT" type="submit" style="margin-top: -15px;">
              </div>
            </form>
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/evil-icons@1.9.0/assets/evil-icons.min.js"></script>
<script>

$(document).ready(function() {
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
