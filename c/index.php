<?php
session_start();
if(!empty($_SESSION['email']) || $_SESSION['type'] == 'client')
{
  header('location: dashboard');
}
elseif(!empty($_SESSION['email']) || $_SESSION['type'] == 'vendor')
{
  header('location: ../v/dashboard');
}
else {
  header('location: ../');
}
 ?>
