<?php
session_start();
require '../../../connection.php';
$conn = connect();
$currentUser = $_SESSION['email'];
if($currentUser == '')
{
  session_destroy();
  header('location: ../../../');
}
$pass = $conn->query("SELECT * FROM user WHERE email='$currentUser'");
$code = $pass->fetch_assoc();
$passcode = $code['pin'];
$cpin = $conn->real_escape_string($_POST['cpin']);
$pin = $conn->real_escape_string($_POST['pin']);
$pin = stripslashes($pin);
$pin = addslashes($pin);
$cpin = stripslashes($cpin);
$cpin = addslashes($cpin);
$cpin = md5($cpin);
$pin = md5($pin);
if($cpin != $passcode)
{
  header('location: ../passset');
}
else {
  $register = $conn->query("UPDATE user SET pin = '" . $pin . "' WHERE email = '".$currentUser."'");
  if($register)
  {
    header('location: ../../dashboard');
  }
}
$conn->close();
 ?>
