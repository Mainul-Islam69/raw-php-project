<?php

require '../db.php';

$name = $_POST['name'];
$title = $_POST['title'];
$comment = $_POST['comment'];
$after_escape = mysqli_escape_string($db_connection, $comment);

$uploaded_file = $_FILES['img'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);


$insert = "INSERT INTO reviews(name, title, comment)VALUES('$name', '$title', '$after_escape')";
mysqli_query($db_connection, $insert);

$id = mysqli_insert_id($db_connection);

$file_name = $id.'.'.$extension;
$new_location = '../uploads/review/'.$file_name;
move_uploaded_file($uploaded_file['tmp_name'], $new_location);

$update = "UPDATE reviews SET image='$file_name' WHERE id=$id";
mysqli_query($db_connection, $update);


header('location:review.php');

?>