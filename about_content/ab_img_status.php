<?php
require '../db.php';

$id = $_GET['id'];

$update_status1 = "UPDATE about_section_images SET status=0";
mysqli_query($db_connection, $update_status1);

$update_status1 = "UPDATE about_section_images SET status=1 WHERE id=$id";
mysqli_query($db_connection, $update_status1);

header('location:about_section_image.php');



?>