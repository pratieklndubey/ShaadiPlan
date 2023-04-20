 <?php
  session_start();
  require '../../connection.php';
  $conn = Connect();
  $currentUser = $_SESSION['email'];
  if($currentUser == '')
  {
    session_destroy();
    header('location: ../../');
  }
  $fname = $conn->real_escape_string($_POST['fname']);
  $fname = ucwords(strtolower($fname));
  $lname = $conn->real_escape_string($_POST['lname']);
  $lname = ucwords(strtolower($lname));
  $city = $conn->real_escape_string($_POST['city']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $fname = stripslashes($fname);
  $fname = addslashes($fname);
  $lname = stripslashes($lname);
  $lname = addslashes($lname);
  $register = $conn->query("UPDATE user SET fname = '". $fname ."', lname = '". $lname ."', city = '". $city ."', phone = '". $phone ."' WHERE email = '". $currentUser ."'");
  if ($register)
  {
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["city"] = $city;
    $_SESSION["phone"] = $phone;
    header('location: ../dashboard');
  }
  $conn->close();
?>
