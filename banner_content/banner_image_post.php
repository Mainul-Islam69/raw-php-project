<?php
session_start();
require '../db.php';

$uploaded_file = $_FILES['banner-image'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$name = $uploaded_file['name'];

$allowed_extension = array('jpg', 'png', 'webp', 'jpeg');
if(in_array($extension, $allowed_extension)){
  if($uploaded_file['size'] <= 3000000){
    $insert = "INSERT INTO banner_images(banner_image)VALUES('$name')";
    mysqli_query($db_connection, $insert);
    $id = mysqli_insert_id($db_connection);

    $file_name = $id.'.'.$extension;
    $new_location = '../uploads/banner/'.$file_name;
    move_uploaded_file($uploaded_file['tmp_name'], $new_location);

    $update = "UPDATE banner_images SET banner_image='$file_name' WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:banner_image.php');



  }
  else{
   $_SESSION['error'] = 'Max File 3MB';
   header('location.banner_image.php');
  }
}
else{
   $_SESSION['error'] = 'Invaild extension';
   header('location.banner_image.php');
}
?>