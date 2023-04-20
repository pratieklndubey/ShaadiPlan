<?php
  session_start();
  require '../../connection.php';
  $conn = Connect();
  $fname = $conn->real_escape_string($_POST['fname']);
  $fname = ucwords(strtolower($fname));
  $lname = $conn->real_escape_string($_POST['lname']);
  $lname = ucwords(strtolower($lname));
  $email= $conn->real_escape_string($_POST['email']);
  $pin = $conn->real_escape_string($_POST['pin']);
  $fname = stripslashes($fname);
  $fname = addslashes($fname);
  $lname = stripslashes($lname);
  $lname = addslashes($lname);
  $email = stripslashes($email);
  $email = addslashes($email);
  $pin = stripslashes($pin);
  $pin = addslashes($pin);
  $pin = md5($pin);
  if($email == '')
  {
    $email = 'admin@shaadiplan.com';
  }
  $userRedundant = $conn->query("SELECT * FROM user WHERE email='$email'");
  if ( $userRedundant->num_rows > 0 ) {
    session_destroy();
    header('location: ../logingear');
  }
  $register = $conn->query("INSERT into user (fname,lname,email,pin) VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $pin . "')");
  if ($register)
  {
    $_SESSION["fname"] = $fname;
    $_SESSION["lname"] = $lname;
    $_SESSION["email"] = $email;
    $_SESSION["type"] = 'client';
    header('location: ../setupgear');
  }
  $conn->close();
?>
