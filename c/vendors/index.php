<?php
    session_start();
    require '../../connection.php';
    $conn = Connect();
  if(isset($_POST['search']))
  {
    $category = $conn->real_escape_string($_POST['category']);
    $city = $conn->real_escape_string($_POST['city']);
    $search = $conn->query("SELECT * FROM vendor WHERE city='$city' and category='$category'");
  }

  $conn->close();
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Vendor | ShaadiPlan</title>
    <link rel="shortcut icon" href="../../image/icon.png" />
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
    .autocomplete {

      position: relative;
      display: inline-block;
    }
    input {
      border: 1px solid transparent;
      background-color: #f1f1f1;
      padding: 10px;
      font-size: 16px;
    }
    input[type=text] {
      background-color: #f1f1f1;
      width: 100%;
    }
    input[type=submit] {
      background-color: DodgerBlue;
      color: #fff;
      cursor: pointer;
    }
    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;

      top: 100%;
      left: 0;
      right: 0;
    }
    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }
    .autocomplete-items div:hover {

      background-color: #e9e9e9;
    }
    .autocomplete-active {

      background-color: DodgerBlue !important;
      color: #ffffff;
    }
    .rating{
      color: orange;
    }
    </style>
  </head>
  <body>
    <form id = "logout"action="../dashboard/logout.php" method="POST">
      </form>
      <script>
      function logoutgear() {
      document.getElementById("logout").submit();
  }
      </script>
    <ul id = 'options' class='dropdown-content'>
      <li><a href="../config" class="light-blue-text text-darken-4" style="font-size: 20px;">Settings</a></li>
      <li class="divider"></li>
      <li><a href="../dashboard" class="light-blue-text text-darken-4" style="font-size: 20px;">Dashboard</a></li>
      <li class="divider"></li>
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id="home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Vendors</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 18px;" class="right">
          <?php
          if (empty($_SESSION['email'])) {
            echo "<a href='../logingear'>Login</a>";
          }
          else {
            echo "<a class='dropdown-button' href='' data-activates='options'>".$_SESSION['fname']."</a>";
          }
          ?>
        </h1>
      </div>
    </nav>
    <div class="section white">
      <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">search a vendor</h2>
      <div class="container" style="width:100%;">
        <div class="row">
          <div class="col s8 offset-s2">
            <div class="row">
              <form action="" method="post">
                  <div class="input-field autocomplete col s4 offset-s1" style="width:25%;\">
                    <input id = "location" type="text" name="city" placeholder="City" class="validate" required="" aria-required="true">
                  </div>
                  <div class="input-field col s4" style="width: 25%;">
                    <select name="category" class="validate" required="" aria-required="true">
                      <option value="" disabled selected>Select Category</option>
                      <option value="Catering">Catering</option>
                      <option value="Choreography">Choreography</option>
                      <option value="Decorators">Decorators</option>
                      <option value="Invitation">Invitation</option>
                      <option value="Mehendi">Mehendi</option>
                      <option value="Photography">Photography</option>
                      <option value="Venue">Venue</option>
                      <option value="Videography">Videography</option>
                    </select>
                  </div>
                  <div class="col s4">
                    <input class="waves-effect waves-light btn light-blue darken-4 white-text" value="Search" type="submit" style="margin-top:25px;" name="search">
                  </div>
                </form>
            </div>
            <div class="divider"></div>
            <div class="row" style="margin-top: 20px;">
              <?php
              if(isset($_POST['search']))
              {
                if ($search->num_rows>0) {
                  if(isset($_POST['search']))
                  {
                    echo "<h4  class='header center light-blue-text text-darken-4' style='font-family:Handlee;'>".$category." in ".$city."</h4>";
                  }
                  while ($list = mysqli_fetch_array($search)) {
                    $rating = 5;
                    $star = 0;
                    echo "<div class='col s4'>";
                    echo "<div class='z-depth-4 card' style='height:250px;'>";
                    echo "<div class='card-content'>";
                    echo "<span class='card-title activator light-blue-text text-darken-4'>".$list['name']."<i class='material-icons right'>more_vert</i></span>";
                    echo "<p>Price starting from, ".$list['price']." &#8377;</p>";
                    echo "<p>Working since, ".$list['experience']."</p>";
                    echo "<p>Experience of, ".$list['projects']." projects</p>";
                    for($star;$star<$list['rating'];$star++)
                    {
                      echo "<i class='material-icons rating'>star</i>";
                    }
                    for($star;$star<$rating;$star++)
                    {
                      echo "<i class='material-icons'>star</i>";
                    }
                    echo "<p><a target='_blank' href='../vendor/".$list['id']."'>Learn More</a></p>";
                    if(!empty($_SESSION['email']))
                    {
                      echo "<form action='book.php'method='post'>";
                      echo "<input type='hidden' value='".$list['email']."' name='vendor'>";
                      echo "<input type='hidden' value='".$_SESSION['email']."' name='client'>";
                      echo "<br><input class='waves-effect waves-light btn light-blue darken-4 white-text' value='Order' type='submit'>";
                      echo "</form>";
                    }
                    else {
                      echo "<br><a href='../logingear' class='waves-effect waves-light btn light-blue darken-4 white-text'>ORDER</a>";
                    }
                    echo "</div>";
                    echo "<div class='card-reveal'>";
                    echo "<span class='card-title light-blue-text text-darken-4'>".$list['name']."</span>";
                    echo "<p>".$list['intro']."</p>";
                    echo "<p>phone: ".$list['phone']."</p>";
                    echo "<p>".$list['email']."</p>";

                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                  }
                }
              }
              ?>
            </div>
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
              <a class="white-text right" href="../blog" style="font-size: 15px;">Blog&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
      $('select').material_select();
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
  <script>
  function autocomplete(inp, arr) {

    var currentFocus;

    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;

        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;

        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");

        this.parentNode.appendChild(a);
        for (i = 0; i < arr.length; i++) {
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            b = document.createElement("DIV");
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            b.addEventListener("click", function(e) {
                inp.value = this.getElementsByTagName("input")[0].value;
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          currentFocus++;
          addActive(x);
        } else if (e.keyCode == 38) {
          currentFocus--;
          addActive(x);
        } else if (e.keyCode == 13) {
          e.preventDefault();
          if (currentFocus > -1) {
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      if (!x) return false;
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
        });
  }

  var cities = ["Sehore","Mumbai","Delhi","Chennai","Kolkata","Ahmedabad","Indore","Agra","Bhopal","Surat","Jaipur","Udaipur","Jaisalmer","Amritsar","Jalandhar","Lucknow","Thiruvananthpuram","Panaji","Pune","Nagpur","Kanpur","Patna","Jhansi","Muzzafarpur","Guwahati","Shimla","Dehradun","Srinagar","Leh","Jabalpur","Gwalior","Jodhpur","Varanasi","Panipat","Gurgaon","Faridabad","Mathura","Raipur","Bhilai","Rajnandgaon","Bhuvaneshwar","Rourkela","Vishakhapatnam","Madurai","Cochin","Bangalore","Coorg","Rishikesh","Imphal","Itanagar","Darjeeling","Shillong","Aizwal","Kohima","Agartala","Chandhigarh","Ambala","Hyderabad","Vadodra","Valsad","Vellore","Vidisha","Warangal","Washim","Wardha","Etah","Erode","Ernakulam","Eluru","Etawah","Fazilka","Firozabad","Fatehabad","Firozpur","Rajgarh","Rajkot","Ranchi","Tiruvalluvar","Tonk","Tikamgarh","Tirap","Thrissur","Yamunanagar","Yawatmal","Yadgir","Unnao","Ujjain","Uttarkashi","Udupi","Patan","Patiala","Pathankot","Howrah","Hissar","Hoshiyarpur","Haridwar","Ludhiana","Lalitpur","Mysore","Neemuch","Nellore","Nagapattinam","Nashik","Nizamabad","Ganganagar"];
  autocomplete(document.getElementById("location"), cities);
</script>
  </body>
  </html>
