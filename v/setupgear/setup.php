<?php
  session_start();
  require '../../connection.php';
  $conn = Connect();
  $owner = $conn->real_escape_string($_POST['owner']);
  $city = $conn->real_escape_string($_POST['city']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $category = $conn->real_escape_string($_POST['category']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE vendor SET owner = '" . $owner . "', city = '" . $city . "', phone = '" . $phone . "', category = '" . $category . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["sex"] = $sex;
    $_SESSION["phone"] = $phone;
    $_SESSION["city"] = $city;
    $_SESSION["owner"] = $owner;
    header('location: abstract');
  }
  $conn->close();
 ?>
