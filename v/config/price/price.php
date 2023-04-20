<?php
  session_start();
  require '../../../connection.php';
  $conn = Connect();
  $price = $conn->real_escape_string($_POST['price']);
  $event = $conn->real_escape_string($_POST['event']);
  $booking= $conn->real_escape_string($_POST['booking']);
  $delivery = $conn->real_escape_string($_POST['delivery']);
  $currentUser = $_SESSION['email'];
  $register = $conn->query("UPDATE vendor SET price = '" . $price . "', delivery = '" . $delivery . "', event = '" . $event . "', booking = '" . $booking . "' WHERE email = '".$currentUser."'");
  if ($register)
  {
    $_SESSION["price"] = $price;
    $_SESSION["event"] = $event;
    $_SESSION["booking"] = $booking;
    $_SESSION["delivery"] = $delivery;
    header('location: ../');
  }
  $conn->close();
 ?>
