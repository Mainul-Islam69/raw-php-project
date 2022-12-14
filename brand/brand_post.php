<?php 
session_start();
require '../db.php';

$uploaded_file = $_FILES['logo'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);

$insert = "INSERT INTO brands(logo)VALUES('$name')";
mysqli_query($db_connection, $insert);
$id = mysqli_insert_id($db_connection);

$file_name = $id.'.'.$extension;
$new_location = '../uploads/brand/'.$file_name;
move_uploaded_file($uploaded_file['tmp_name'], $new_location);

$update = "UPDATE brands SET logo='$file_name' WHERE id=$id";
mysqli_query($db_connection, $update);
header('location:brand.php');




?>