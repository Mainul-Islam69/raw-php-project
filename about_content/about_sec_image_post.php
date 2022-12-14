<?php
session_start();
require '../db.php';

$uploaded_file = $_FILES['ab_sec_image'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$name = $uploaded_file['name'];

$allowed_extension = array('jpg', 'png', 'webp', 'jpeg');
if(in_array($extension, $allowed_extension)){
  if($uploaded_file['size'] <= 2000000){
    $insert = "INSERT INTO about_section_images(about_section_image)VALUES('$name')";
    mysqli_query($db_connection, $insert);
    $id = mysqli_insert_id($db_connection);

    $file_name = $id.'.'.$extension;
    $new_location = '../uploads/about/'.$file_name;
    move_uploaded_file($uploaded_file['tmp_name'], $new_location);

    $update = "UPDATE about_section_images SET about_section_image='$file_name' WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:about_section_image.php');



  }
  else{
   $_SESSION['error'] = 'Max File 2MB';
   header('location.about_section_image.php');
  }
}
else{
   $_SESSION['error'] = 'Invaild extension';
   header('location.about_section_image.php');
}
?>