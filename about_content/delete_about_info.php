<?php
require '../db.php';

$id = $_GET['id'];

$delete_about_info = "DELETE FROM about_contents WHERE id=$id";
mysqli_query($db_connection, $delete_about_info);
header('location:about.php');

?>