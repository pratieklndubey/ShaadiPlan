<?php
  session_start();
  require '../../connection.php';
  $conn = Connect();
  $name = $conn->real_escape_string($_POST['name']);
  $name = ucwords(strtolower($name));
  $email= $conn->real_escape_string($_POST['email']);
  $pin = $conn->real_escape_string($_POST['pin']);
  $name = stripslashes($name);
  $name = addslashes($name);
  $email = stripslashes($email);
  $email = addslashes($email);
  $pin = stripslashes($pin);
  $pin = addslashes($pin);
  $pin = md5($pin);
  $user = explode("@",$email);
  $id = $user[0];
  if($email == '')
  {
    $email = 'admin@shaadiplan.com';
  }
  $userRedundant = $conn->query("SELECT * FROM vendor WHERE email='$email'");
  if ( $userRedundant->num_rows > 0 ) {
    session_destroy();
    header('location: ../logingear');
  }
  $register = $conn->query("INSERT into vendor (name,id,email,pin) VALUES('" . $name . "','" . $id . "','" . $email . "','" . $pin . "')");
  if ($register)
  {
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["type"] = 'vendor';
    header('location: ../setupgear');
  }
  $conn->close();
?>
