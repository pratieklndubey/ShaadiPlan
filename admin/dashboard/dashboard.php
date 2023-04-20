<?php
require '../../connection.php';
$conn = connect();
$user = $conn->real_escape_string($_POST['user']);
$register = $conn->query("UPDATE vendor SET approve = '1' WHERE email = '$user'");
if($register)
{
  header('location: ../dashboard');
}
$conn->close();
?>
