<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $intro = $conn->real_escape_string($_POST['intro']);
  $projects = $conn->real_escape_string($_POST['projects']);
  $email= $conn->real_escape_string($_POST['email']);
  $owner = $conn->real_escape_string($_POST['owner']);
  $currentUser = $_SESSION['phone'];
  if(!empty($intro))
  {
    $address = $_SESSION['intro'];
  }
  $register = $conn->query("UPDATE vendor SET intro = '" . $intro . "', owner = '" . $owner . "', projects = '" . $projects . "', email = '" . $email . "' WHERE phone = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["intro"] = $intro;
    $_SESSION["projects"] = $projects;
    $_SESSION["email"] = $email;
    $_SESSION["owner"] = $owner;
    header('location: ../../dashboard');
  }
  $conn->close();
 ?>
