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
  elseif(!empty($_SESSION['city']))
  {
    header('location: ../dashboard');
  }
 ?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Setup | ShaadiPlan</title>
    <link rel="shortcut icon" href="../../image/icon.png" />
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
::placeholder{
  color: black;
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
      <li><a onclick="logoutgear()" class="light-blue-text text-darken-4" style="font-size: 20px;">Logout</a></li>
    </ul>
    <nav id = "home" style="height: 72px;"class="light-blue darken-4">
      <div class = "nav-wrapper">
        <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../image/icon.png"></a>
        <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center">Account Setup</h1>
        <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><a class="dropdown-button" href="" data-activates="options"><?php echo $_SESSION['fname'];?></a></h1>
      </div>
    </nav>
    <h1 class="center" style="font-family: Satisfy; color: #01579b;">make us your acquaintance</h1>
    <div class="container">
      <div class="row">
        <div class="col s8 offset-s2">
          <div class="card-panel grey lighten-4 z-depth-2" style="height: 300px;">
            <form  action="setup.php" method="POST">
              <div class="input-field autocomplete" style="width:300px; margin-left: 150px;">
                <input id = "location" type="text" name="city" placeholder="City" class="validate" required="" aria-required="true">
              </div>
              <div class="input-field" style="width: 300px; margin-left: 150px;margin-top: -5px;">
                <input name="phone" type="tel" placeholder = "What is your Phone Number?" class="validate" required="" aria-required="true">
              </div>
              <div class="center">
                <input name="sex" type="radio" id="boy" value="Boy" class="validate" required="" aria-required="true">
                <label for="boy"  >Boy &nbsp;&nbsp;</label>
                <input name="sex" type="radio" id="girl" value="Girl" class="validate" required="" aria-required="true">
                <label for="girl">Girl</label>
              </div>
              <div class="center" style="margin-top: 30px;">
                <input class="center waves-effect waves-light btn light-blue darken-4 white-text" value="SUBMIT" type="submit">
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
              </div>
            </div>
    </footer>
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
