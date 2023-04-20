<?php
  session_start();
  require '../../../connection.php';

$conn = connect();
function findexts ($filename)
 {
 $filename = strtolower($filename);
 $exts = explode(".", $filename);
 $n = count($exts)-1;
 $exts = $exts[$n];
 return $exts;
 }
$email = $_SESSION['email'];
    $tmpStore = $_FILES["image"]["tmp_name"];
    $image = $_FILES["image"]["name"];
    $extension = findexts($image);
    $image = rand();
    $image = $image.".".$extension;
    move_uploaded_file($tmpStore,"../couples/".$image);
    $id = $_SESSION['invid'];
    $register = $conn->query("UPDATE invite SET image = '".$image."' WHERE id = '$id'");
    if($register)
    {
      header('location: ../../invitation/'.$id);
    }
$conn->close();
?>
