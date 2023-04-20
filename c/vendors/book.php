<?php
require '../../connection.php';
$conn = connect();
$vendor = $conn->real_escape_string($_POST['vendor']);
$client = $conn->real_escape_string($_POST['client']);
$register = $conn->query("INSERT INTO orders (client,vendor) VALUES ('".$client."', '".$vendor."')");
if($register)
{
  header('location: ../dashboard');
}

$conn->close();
?>
