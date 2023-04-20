<?php
  session_start();
  require '../../connection.php';
  $conn = Connect();
  $email= $conn->real_escape_string($_POST['email']);
  $pin = $conn->real_escape_string($_POST['pin']);
  $email = addslashes($email);
  $email = addslashes($email);
  $pin = stripslashes($pin);
  $pin = addslashes($pin);
  $pin = md5($pin);
  $login = $conn->query("SELECT * FROM user WHERE email='$email' AND pin='$pin'");
  if ($login->num_rows > 0) {
    $user = $login->fetch_assoc();
    $_SESSION['fname'] =  $user['fname'];
    $_SESSION['lname'] =  $user['lname'];
    $_SESSION['email'] =  $user['email'];
    $_SESSION['phone'] =  $user['phone'];
    $_SESSION['city'] =  $user['city'];
    $_SESSION['sex'] =  $user['sex'];
    $_SESSION['type'] = 'client';
    if(empty($_SESSION['city']))
    {
      header('location: ../setupgear');
    }
    else {
      header('location: ../dashboard');
    }
  }
  elseif ($login->num_rows == 0) {
    session_destroy();
    header('location: ../signupgear');
  }
  else {
    session_destroy();
    header('location: ../logingear');
  }
  $conn->close();
?>
