<?php 
session_start();
require '../db.php';

$icon = $_POST['icon'];
$sub_title = $_POST['sub_title'];
$title = $_POST['title'];

$insert = "INSERT INTO services(icon, sub_title, title)VALUES('$icon', '$sub_title', '$title')";
mysqli_query($db_connection, $insert);

header('location:service.php');

?>