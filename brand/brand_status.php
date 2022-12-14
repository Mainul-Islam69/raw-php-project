<?php
require '../db.php';

$id = $_GET['id'];



$update_status1 = "UPDATE brands SET status=1 WHERE id=$id";
mysqli_query($db_connection, $update_status1);

header('location:brand.php');



?>