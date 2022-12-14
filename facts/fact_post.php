<?php 
session_start();
require '../db.php';

$icon = $_POST['icon'];
$number = $_POST['number'];
$title = $_POST['title'];

$insert = "INSERT INTO facts(icon, number, title)VALUES('$icon', '$number', '$title')";
mysqli_query($db_connection, $insert);

header('location:fact.php');

?>