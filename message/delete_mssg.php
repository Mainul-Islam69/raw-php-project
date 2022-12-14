<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete_mssg = "DELETE FROM messages WHERE id=$id";
mysqli_query($db_connection, $delete_mssg);

$_SESSION['delete'] = 'Message Deleted';
header('location:messages.php');


?>