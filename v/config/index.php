<?php
if($_SESSION['email'] == '')
{
  session_destroy();
  header('location: ../');
}
elseif ($_SESSION['type'] == 'client') {
  header('location: ../../c/dashboard');
}
else {
  header('location: abstract');
}
?>
