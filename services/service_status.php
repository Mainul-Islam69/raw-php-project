<?php 
session_start();
require '../db.php';

$id= $_GET['id'];

$select_fact = "SELECT * FROM services WHERE id=$id";
$select_serv_res = mysqli_query($db_connection, $select_fact);
$after_assoc = mysqli_fetch_assoc($select_serv_res);


if($after_assoc['status'] == 1){
    $select_status = "SELECT COUNT(*)as total_deactive FROM services WHERE status=1";
    $select_status_res = mysqli_query($db_connection, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_deactive'] == 3){
        $_SESSION['limit'] = 'Minimum 3 Icon Have to active';
        header('location:service.php');
    }
    else{
        $update_status2 = "UPDATE services SET status=0 WHERE id=$id";
        mysqli_query($db_connection, $update_status2);

        header('location:service.php');
    }


}
else{
    $select_status = "SELECT COUNT(*)as total_active FROM services WHERE status=1";
    $select_status_res = mysqli_query($db_connection, $select_status);
    $after_assoc = mysqli_fetch_assoc($select_status_res);

    if($after_assoc['total_active'] >= 6){
        $_SESSION['limit'] = 'Maxmimum 6 Icon can be active';
        header('location:service.php');
    }
    else{
        $update_status2 = "UPDATE services SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update_status2);

        header('location:service.php');
    }
}




?>