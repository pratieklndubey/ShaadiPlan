<?php
  session_start();
  require '../connection.php';
  $conn = Connect();
  $id= $conn->real_escape_string($_POST['id']);
  $pin = $conn->real_escape_string($_POST['pin']);
  $id = addslashes($id);
  $id = addslashes($id);
  $pin = stripslashes($pin);
  $pin = addslashes($pin);
  $pin = md5($pin);
  $login = $conn->query("SELECT * FROM admin WHERE id='$id' AND pin='$pin'");
  if($login->num_rows > 0)
  {
    $_SESSION['id'] = $id;
    header('location: dashboard');
  }
  else {
    session_destroy();
    header('location: ../admin');
  }
  $conn->close();
?>
