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
  $login = $conn->query("SELECT * FROM vendor WHERE email='$email' AND pin='$pin'");
  if ($login->num_rows > 0) {
    $user = $login->fetch_assoc();
    $_SESSION['name'] =  $user['name'];
    $_SESSION['email'] =  $user['email'];
    $_SESSION['phone'] =  $user['phone'];
    $_SESSION['city'] =  $user['city'];
    $_SESSION['approve'] =  $user['approve'];
    $_SESSION['category'] =  $user['category'];
    $_SESSION['intro'] =  $user['intro'];
    $_SESSION['experience'] =  $user['experience'];
    $_SESSION['projects'] =  $user['projects'];
    $_SESSION['owner'] =  $user['owner'];
    $_SESSION['address'] =  $user['address'];
    $_SESSION['pincode'] =  $user['pincode'];
    $_SESSION['price'] =  $user['price'];
    $_SESSION['booking'] =  $user['booking'];
    $_SESSION['event'] =  $user['event'];
    $_SESSION['delivery'] =  $user['delivery'];
    $_SESSION['cancel'] =  $user['cancel'];
    $_SESSION['travel'] =  $user['travel'];
    $_SESSION['facebook'] =  $user['facebook'];
    $_SESSION['url'] =  $user['url'];
    $_SESSION['rating'] =  $user['rating'];
    $_SESSION['type'] = 'vendor';
      header('location: ../dashboard');
  }
  else {
    session_destroy();
    header('location: ../logingear');
  }
  $conn->close();
?>
