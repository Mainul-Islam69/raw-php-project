<?php 
session_start();
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO socials(icon, link)VALUES('$icon', '$link')";
mysqli_query($db_connection, $insert);

header('location:social.php');

?>