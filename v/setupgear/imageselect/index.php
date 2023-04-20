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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1d6ea2" />
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="author" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain">
    <meta name="subject" content="Wedding Planning Website"/>
    <meta name="classification" content="Wedding"/>
    <meta name="Language" content="English"/>
    <meta name="Designer" content="Prateek Dubey, Pawan Chaturvedi, and Prashant Jain"/>
    <style>
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
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Account Setup</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['name'];?></a></h1>
      </div>
    </nav>
    <h2 class="center" style="font-family: Satisfy; color: #01579b;">Show us some of your work</h2>
    <div class="containers center">
      <div class="row">
        <div class="col s6 offset-s3">
            <div class="center card-panel grey lighten-4 z-depth-2" style="height: 350px;">
              <div id="preview">
            </div>
            </div>
            <form id="imageselect" action="image.php" method="POST" enctype="multipart/form-data">
              <input type="file" name="image[]" id="fileupload" class="inputfile validate" required="" aria-required="true" multiple>
              <label for="fileupload" style="font-size: 20px;">SELECT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</label>
              <input type="submit" id="store" class="inputfile">
              <label for="store" style="font-size: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SAVE</label>
              </form>
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
    <script>
    $(document).ready(function() {
      $('select').material_select();
      $("select[required]").css({
        display: "inline",
        height: 0,
        padding: 0,
        width: 0
      });
    });
    $(function () {
    $("#fileupload").change(function () {
      if($("#fileupload")[0].files.length != 6) {
                   alert("You have to add 6 of your best works.");
                   document.getElementById("preview").reset();
                   document.getElementById("imageselect").reset();
         }
        if (typeof (FileReader) != "undefined") {
            var preview = $("#preview");
            preview.html("");
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png|)$/;
            $($(this)[0].files).each(function () {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "margin:7px;height:140px;width: 140px");
                        img.attr("src", e.target.result);
                        preview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                } else {
                    alert(file[0].name + " is not a valid image file.");
                    preview.html("");
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
    </script>
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
