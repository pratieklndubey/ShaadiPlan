<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $address = $conn->real_escape_string($_POST['address']);
  $pincode = $conn->real_escape_string($_POST['pincode']);
  $facebook = $conn->real_escape_string($_POST['facebook']);
  $url = $conn->real_escape_string($_POST['url']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE vendor SET address = '" . $address . "', pincode = '" . $pincode . "', url = '" . $url . "', facebook = '" . $facebook . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["address"] = $address;
    $_SESSION["pincode"] = $pincode;
    $_SESSION["facebook"] = $facebook;
    $_SESSION["url"] = $url;
    header('location: ../pricing');
  }
  $conn->close();
 ?>
