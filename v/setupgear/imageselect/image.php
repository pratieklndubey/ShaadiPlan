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
foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name){
    $tmpStore = $_FILES["image"]["tmp_name"][$key];
    $image = $_FILES["image"]["name"][$key];
    $extension = findexts($image);
    $image = rand();
    $image = $image.".".$extension;
    if(empty($tmpStore))
    {
        break;
    }
    move_uploaded_file($tmpStore,"../../image/".$image);
    $register = $conn->query("INSERT into vimage (image,email) VALUES('" . $image . "','" . $email . "')");
}
header('location: ../../dashboard');
$conn->close();
?>
