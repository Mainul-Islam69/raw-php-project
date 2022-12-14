<?php
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM reviews WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

$delete_from = '../uploads/review/'.$after_assoc['image'];
unlink($delete_from);

$delete_logo = "DELETE FROM reviews WHERE id=$id";
mysqli_query($db_connection, $delete_logo);
header('location:review.php');

?>