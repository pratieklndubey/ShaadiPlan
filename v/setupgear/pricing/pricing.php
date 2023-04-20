<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $price = $conn->real_escape_string($_POST['price']);
  $booking = $conn->real_escape_string($_POST['booking']);
  $event = $conn->real_escape_string($_POST['event']);
  $delivery = $conn->real_escape_string($_POST['delivery']);
  $travel = $conn->real_escape_string($_POST['travel']);
  $cancel = $conn->real_escape_string($_POST['cancel']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE vendor SET price = '" . $price . "', delivery = '" . $delivery . "', travel = '" . $travel . "', cancel = '" . $cancel . "', booking = '" . $booking . "', event = '" . $event . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["price"] = $price;
    $_SESSION["booking"] = $booking;
    $_SESSION["event"] = $event;
    $_SESSION["delivery"] = $delivery;
    $_SESSION["travel"] = $travel;
    $_SESSION["cancel"] = $cancel;
    header('location: ../imageselect');
  }
  $conn->close();
 ?>
