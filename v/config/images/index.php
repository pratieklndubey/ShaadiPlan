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
require '../../../connection.php';
$conn = connect();
$user = $_SESSION['email'];
$images = $conn->query("SELECT * from vimage WHERE email = '$user'");
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Settings | ShaadiPlan</title>
    <link rel="shortcut icon" href="../../../image/icon.png" />
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
::placeholder{
  color: black;
}
.inputfile {
    opacity: 0;
     position: absolute;
      z-index: -7;
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
      <li><a href="../../dashboard" class="light-blue-text text-darken-4" style="font-size: 20px;">Dashboard</a></li>
      <li class="divider"></li>
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Settings</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['name'];?></a></h1>
      </div>
    </nav>
    <div class="container" style="width: 90%;">
      <div class="row">
        <div class="col s3 ">
          <ul class="collection with-header">
            <li class="collection-header light-blue darken-4 white-text" style="font-family: Gloria Hallelujah;"><h4 >Settings Panel</h4></li>
            <a href="../abstract"class="collection-item black-text" style="font-family: Gloria Hallelujah;">About<div class="secondary-content"><i class="material-icons black-text">chrome_reader_mode</i></div></a>
            <a href="../contact"class="collection-item black-text" style="font-family: Gloria Hallelujah;">Contact<div class="secondary-content"><i class="material-icons black-text">contact_phone</i></div></a>
            <a href="../price"class="collection-item black-text" style="font-family: Gloria Hallelujah;">Price<div class="secondary-content"><i class="material-icons black-text">monetization_on</i></div></a>
            <a href="../policy"class="collection-item black-text" style="font-family: Gloria Hallelujah;">Policy<div class="secondary-content"><i class="material-icons black-text">assignment</i></div></a>
            <a href="../passset"class="collection-item black-text" style="font-family: Gloria Hallelujah;">Password<div class="secondary-content"><i class="material-icons black-text">lock</i></div></a>
            <a class="collection-item white-text light-blue darken-4" style="font-family: Gloria Hallelujah;">Images<div class="secondary-content"><i class="material-icons white-text">camera</i></div></a>
          </ul>
        </div>
        <div class="col s7 offset-s1" style="margin-top: 10px;">
          <div class="row">
                  <?php
                  if($images->num_rows > 0)
                  {

                    while ($list = mysqli_fetch_array($images)) {
                      $image = "../../image/".$list['image'];
                      echo "<div class='col s6' style='margin-top:5px;'>";
                      echo "<img class='materialboxed' src = '".$image."' height='200' width='350'>";
                      echo "</div>";
                    }

                  }
                  else {
                    echo "<h3 class='center' style='font-family:Handlee;'>You don't have any image to show your work.</h3>";
                  }
                   ?>
             </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="page-footer white" style="margin-top: 25px;">
        <div class="footer-copyright light-blue darken-4">
              <div class="container">
              &copy; 2018 ShaadiPlan
              <a class="white-text right" href="about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
              <a class="white-text right" href="invite" style="font-size: 15px;">Invite&nbsp;&nbsp;&nbsp;&nbsp;|</a>
              </div>
            </div>
    </footer>
  </body>
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
$(document).ready(function() {
  $('select').material_select();
  $("select[required]").css({
    display: "inline",
    height: 0,
    padding: 0,
    width: 0
  });
});
</script>
  </html>
