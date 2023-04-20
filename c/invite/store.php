<?php
session_start();
require '../../connection.php';
$conn = connect();
$groom = $conn->real_escape_string($_POST['groom']);
$groom = strtolower($groom);
$bride = $conn->real_escape_string($_POST['bride']);
$bride = strtolower($bride);
$venue = $conn->real_escape_string($_POST['venue']);
$occasion = $conn->real_escape_string($_POST['occasion']);
$gid = str_split($groom);
$bid = str_split($bride);
$did = str_split($occasion);
$id = $gid[0].$gid[1].$gid[2].$bid[0].$bid[1].$bid[2].$did[8].$did[9].$did[5].$did[6];
$bride = ucwords($bride);
$groom = ucwords($groom);
$email = $_SESSION['email'];
$register = $conn->query("INSERT INTO invite (bride,groom,occasion,venue,id,email) VALUES ('".$bride."','".$groom."','".$occasion."','".$venue."','".$id."','".$email."')");
if($register)
{
  $_SESSION['invid'] = $id;
  header('location: image');
}
 ?>
