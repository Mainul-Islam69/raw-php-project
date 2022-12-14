<?php
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM about_section_images WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

$delete_from = '../uploads/about/'.$after_assoc['about_section_image'];
unlink($delete_from);

$delete_banner_image = "DELETE FROM about_section_images WHERE id=$id";
mysqli_query($db_connection, $delete_banner_image);
header('location:about_section_image.php');

?>