<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete_mssg = "DELETE FROM services WHERE id=$id";
mysqli_query($db_connection, $delete_mssg);

$_SESSION['delete'] = 'Service Item Deleted';
header('location:service.php');


?>