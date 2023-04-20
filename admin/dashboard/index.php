<?php
  session_start();
  if($_SESSION['type'] == 'vendor')
  {
    header('location: ../v/dashboard');
  }
  elseif($_SESSION['type'] == 'client')
  {
    header('location: ../c/dashboard');
  }

  require '../../connection.php';
  $conn = connect();
  $vendor = $conn->query("SELECT * FROM vendor WHERE approve = '0'");
?>
﻿<!DOCTYPE html>
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
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['id'];?></a></h1>
    </nav>
    <div class="section white">
      <div class = 'container'>
        <div class = 'row'>
      <?php
      if($vendor->num_rows > 0)
      {
        echo "<div class = 'col s8 offset-s2'>";
        echo "<ul class='collapsible' data-collapsible='accordion'>";
        while ($list = mysqli_fetch_array($vendor)) {
          echo "<li>";
          echo " <div class='collapsible-header'><h5 style='font-family: Handlee;'>".$list['name']."</h5></div>";
          echo "<div class='collapsible-body'><span><p>Phone: ".$list['phone']."</p>";
          echo "<p>Email: ".$list['email']."</p>";
          echo "<p>Category: ".$list['category']."</p>";
          echo "<p>Owner: ".$list['owner']."</p>";
          echo "<p>City: ".$list['city']."</p>";
          echo "<p>Projects: ".$list['projects']."</p>";
          echo "<p>Working Since: ".$list['experience']."</p>";
          echo "<form action='dashboard.php' method='POST'>";
          echo "<input type='hidden' value='".$list['email']."' name='user'>";
          echo "<input class='center waves-effect waves-light btn light-blue darken-4 white-text' value='Approve' type='submit'>";
          echo "</form>";
          echo "</span></div>";
          echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
      }
      else {
        echo "<h3 class='center' style='font-family:Handlee;'>No new vendor has registered with us in a while</h3>";
      }
       ?>


        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/evil-icons@1.9.0/assets/evil-icons.min.js"></script>
    <script>
    $(document).ready(function() {
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
    $("nav,div").find("a").click(function(e) {
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top
    });
});
  </script>
  </body>
  </html>
