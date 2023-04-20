<?php
require '../connection.php';
$conn = connect();
session_start();
$vendor = $_GET['user'];
$look = $conn->query("SELECT * FROM vendor where id='$vendor'");
if($look->num_rows > 0)
{
  $profile = $look->fetch_assoc();
  $email = $profile['email'];
  $work = $conn->query("SELECT * FROM vimage where email= '$email'");
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
     <nav id = "home" style="height: 72px;"class="light-blue darken-4">
       <div class = "nav-wrapper">
         <a style="font-family: 'Indie Flower', cursive; font-size: 45px; margin-left: 40px;"href="../../about">ShaadiPlan<img style=" margin-top:2px;margin-left:5px; width: 40px;" src="../../image/icon.png"></a>
         <h1 style="font-size: 30px;font-family: Handlee; margin-top: 15px;"class="brand-logo center"><?php echo $profile['name']?></h1>
         <h1 style="margin-right: 40px;font-size: 25px;font-family: Handlee; margin-top: 20px;" class="right"><?php
         if(!empty($_SESSION['email']))
         {
           echo "<a class='dropdown-button' data-activates='options'>";
           echo $_SESSION['fname'];
           echo "</a>";
         }
         else {
           echo "<a href = '../logingear'>Login</a>";
         }
         ?>
       </h1>
       </div>
     </nav>
     <div class="section white ">
       <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee;"><?php echo $profile['owner']?>, welcomes you!</h2>
       <h4  class="header center black-text" style="font-family:Gloria Hallelujah;"><?php echo $profile['intro']?></h4>
       <hr width='80%'>
       <div class="container">
         <div class="row">
           <div class="col s6">
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">Connect with us</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Send us an email on, <?php echo $profile['email']; ?></p>
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">Or</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Call us on, <?php echo $profile['phone']; ?></p>
           </div>
           <div class="col s6">
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">Locate us</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">We primarily work in, <?php echo $profile['city']; ?></p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Our office is loacted at, <?php echo $profile['address'].', '.$profile['pincode'].', '.$profile['city']; ?></p>
           </div>
         </div>
         <div class="row">
           <div class="col s6">
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">About us</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">We are here to look after the <?php echo $profile['category']; ?>, of your wedding</p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">We are working since, <?php echo $profile['experience']; ?></p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">and have successfully completed, <?php echo $profile['projects']; ?> projects</p>
             <p class="center"><?php
             $rating = 5;
             $star = 0;
             for($star;$star<$profile['rating'];$star++)
             {
               echo "<i class='material-icons rating'>star</i>";
             }
             for($star;$star<$rating;$star++)
             {
               echo "<i class='material-icons'>star</i>";
             }
              ?></p>
           </div>
           <div class="col s6">
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">Pricing</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Price of our services starts at, <?php echo $profile['price']; ?></p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Payment is divide into 3 parts of the total amount</p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">Booking: <?php echo $profile['booking'];?>%, Event: <?php echo $profile['event'];?>%, Delivery: <?php echo $profile['delivery'];?>%</p>
           </div>
         </div>
         <div class="row">
           <div class="col s12">
             <h5  class="header center black-text" style="font-family:Gloria Hallelujah;">Our terms and policies</h5>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;"><?php echo $profile['cancel']; ?></p>
             <p class="center black-text" style="font-family:Handlee;font-size:20px;">
             <?php
             if($profile['travel'] == 1)
             {
               echo "We can travel to places outside of ".$profile['city']." as well.";
             }
             else {
               echo "We can't travel to places outside of ".$profile['city'].".";
             }
             ?>
           </p>
           </div>
         </div>
         </div>
       </div>
       <div class="section grey lighten-3">
         <h2  class="header center light-blue-text text-darken-4" style="font-family:Handlee; ">Some of our work</h2>
         <hr width="70%">
         <div class="container">
           <div class="row">
               <?php
               if($work->num_rows > 0)
               {

                 while ($image = mysqli_fetch_array($work)) {
                   $images = "../../v/image/".$image['image'];
                   echo "<div class='col s6' style='margin-top:5px;'>";
                   echo "<img class='materialboxed' src = '".$images."' height='250' width='437'>";
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
             <a class="white-text right" href="about" style="font-size: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;About</a>
             <a class="white-text right" href="blog" style="font-size: 15px;">Blog&nbsp;&nbsp;&nbsp;&nbsp;|</a>
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
