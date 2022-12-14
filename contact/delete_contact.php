<?php
require '../db.php';

$id = $_GET['id'];

$delete_logo = "DELETE FROM contacts WHERE id=$id";
mysqli_query($db_connection, $delete_logo);
header('location:contact.php');

?>