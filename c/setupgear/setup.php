<?php
    session_start();
    if(empty($_SESSION['email']) || $_SESSION['type'] == NULL)
    {
      session_destroy();
      header('location: ../../');
    }
    if($_SESSION['type'] == 'vendor')
    {
      header('location: ../../v/dashboard');
    }
  require '../../connection.php';
  $conn = Connect();
  $city = $conn->real_escape_string($_POST['city']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $sex = $conn->real_escape_string($_POST['sex']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE user SET city = '" . $city . "', phone = '" . $phone . "', sex = '" . $sex . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["sex"] = $sex;
    $_SESSION["phone"] = $phone;
    $_SESSION["city"] = $city;
    header('location: ../dashboard');
  }
  $conn->close();
 ?>
