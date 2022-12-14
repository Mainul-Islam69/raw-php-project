<?php

require '../db.php';

$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$insert = "INSERT INTO contacts(address, phone, email)VALUES('$address', '$phone', '$email')";
mysqli_query($db_connection, $insert);



header('location:contact.php');

?>