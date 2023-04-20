<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $intro = $conn->real_escape_string($_POST['intro']);
  $projects = $conn->real_escape_string($_POST['projects']);
  $experience = $conn->real_escape_string($_POST['experience']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE vendor SET intro = '" . $intro . "', projects = '" . $projects . "', experience = '" . $experience . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["intro"] = $intro;
    $_SESSION["projects"] = $projects;
    $_SESSION["experience"] = $experience;
    header('location: ../contact');
  }
  $conn->close();
 ?>
