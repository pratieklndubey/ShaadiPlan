<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $cancel = $conn->real_escape_string($_POST['cancel']);
  $travel = $conn->real_escape_string($_POST['travel']);
  $currentUser = $_SESSION['email'];
  if(!empty($cancel))
  {
    $cancel = $_SESSION['cancel'];
  }
  $register = $conn->query("UPDATE vendor SET cancel = '" . $cancel . "', travel = '" . $travel . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["cancel"] = $cancel;
    $_SESSION["travel"] = $travel;
    header('location: ../');
  }
  $conn->close();
 ?>
