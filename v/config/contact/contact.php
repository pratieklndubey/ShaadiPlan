<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $address = $conn->real_escape_string($_POST['address']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $pincode= $conn->real_escape_string($_POST['pincode']);
  $url = $conn->real_escape_string($_POST['url']);
  $facebook = $conn->real_escape_string($_POST['facebook']);
  $currentUser = $_SESSION['email'];
  if(!empty($address))
  {
    $address = $_SESSION['address'];
  }
  $register = $conn->query("UPDATE vendor SET address = '" . $address . "', facebook = '" . $facebook . "', url = '" . $url . "', phone = '" . $phone . "', pincode = '" . $pincode . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["address"] = $address;
    $_SESSION["phone"] = $phone;
    $_SESSION["pincode"] = $pincode;
    $_SESSION["url"] = $url;
    $_SESSION["facebook"] = $facebook;
    header('location: ../');
  }
  $conn->close();
 ?>
