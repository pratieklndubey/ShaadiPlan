<?php
require "../connection.php";
$conn = connect();
session_start();
$couple = $_GET['couple'];
$invite = $conn->query("SELECT * FROM invite WHERE id = '$couple'");
if($invite->num_rows > 0)
{
  $card = $invite->fetch_assoc();
}
else {
  header('location: ../');
}
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>ShaadiPlan</title>
    <link rel="shortcut icon" href="../../image/icon.png" />
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Handlee|Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/evil-icons/1.9.0/evil-icons.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="author" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain">
    <meta name="subject" content="Wedding Planning Website"/>
    <meta name="classification" content="Wedding"/>
    <meta name="Language" content="English"/>
    <meta name="Designer" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain"/>
  </head>
  <body>
    <nav id = "home" style="height: 100px;"class="red darken-2">
      <div class = "nav-wrapper">
        <h1 style="font-size: 70px;font-family: Handlee; margin-top: 15px;"class="brand-logo center"><?php
        echo $card['bride']." & ".$card['groom'];
        ?></h1>
      </div>
    </nav>
    <div style="width:100%; height: 480px; vertical-align: top;"class="parallax-container">
      <?php
      $image = $card['image'];
      ?>
      <div class="parallax"><?php
      echo "<img src='../invite/couples/".$card['image']."'>";
      ?></div>
    </div>
    <div class="section white">
      <h3  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">We request the honour of your presence at our wedding</h3>
      <h4  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">on <?php echo $card['occasion'];?></h4>
      <h4  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">at the <?php echo $card['venue'];?></h4>
      <h4  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">from the pleasant evening till the flickering night.</h4>
    </div>
    <footer class="page-footer white">
        <div class="footer-copyright red darken-2">
              <div class="container">
              &copy; 2018 ShaadiPlan
              <a class="white-text right" href="about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
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
