<?php
require '../db.php';

$id = $_GET['id'];

$update_status1 = "UPDATE banner_images SET status=0";
mysqli_query($db_connection, $update_status1);

$update_status1 = "UPDATE banner_images SET status=1 WHERE id=$id";
mysqli_query($db_connection, $update_status1);

header('location:banner_image.php');



?>