<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM facts WHERE id=$id";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);


$delete_fact = "DELETE FROM facts WHERE id=$id";
mysqli_query($db_connection, $delete_fact);
$_SESSION['delete'] = 'Delete Successfully';
header('location:fact.php');

?>